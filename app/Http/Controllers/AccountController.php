<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Account;
use DB; 
use App\User;
use Mail;
use App\Mail\UserRequest;

class AccountController extends Controller
{
    
   public function index()
    {
        $user = array();
        $fleet = DB::table('fleet_mast')->get();       
        return view('account_admin.show',compact('user','fleet'));
    }

    public function create()
    {
        $user  = User::all();
        return view('account_admin.create',compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                       'acc_code' =>'required|min:5',
                                       'acc_owner'=> 'required|not_in:0',
                                       'contact'  => 'required|numeric',
                                       'remarks'  =>'nullable'
                                       ]);
      
       $ckh_acc = Account::where('acc_code', '=', $validatedData['acc_code'])->first();
       if(!empty($ckh_acc)){
          return redirect()->back()->with('acc_code_error','Account Code already exists');
       }
       else{        
     
           $user     = User::find($request->acc_owner);
           $u_name   = strtolower($user->name);
           $password = substr($u_name,0,4).'1234';
           $name['username'] = $user->email;
           $name['name']     = $u_name;
           $name['password'] = $password;

            Account::create($validatedData);

            Mail::to($user->email)->send(new SendMailable($name));
            return redirect('account');
      }
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data = Account::find($id);
        $user = User::all();
        return view('account_admin.edit',compact('data','user'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
                                       'fleet_owner' =>'required',
                                       'fleet_name'  => 'required',
                                       'fleet_code'  => 'required',
                                       'fleet_desc'  =>'nullable'
                                       ]);

        DB::table('fleet_mast')->where('fleet_owner',$id)->update($validatedData);
        return redirect('fleet');
    }

   
    public function destroy($id)
    {
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('fleet');
    }

    public function mail()
    {
       $name = 'Krunal';
       
       
       return 'Email was sent';
    }
}

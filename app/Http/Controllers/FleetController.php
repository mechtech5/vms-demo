<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Fleet;
use App\FleetUser;

class FleetController extends Controller
{
    
    public function index()
    {
        $user  = User::where('account_id',Auth::user()->id)->get();
        $fleet = Fleet::where('fleet_owner',Auth::user()->id)->get();
       
        return view('fleet.index',compact('user','fleet'));
    }

    public function create()
    {
         $user  = User::where('account_id',Auth::user()->id)->get();
        return view('fleet.create',compact('user'));    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                       'fleet_name'  => 'required',
                                       'fleet_code'  => 'required',
                                       'fleet_desc'  =>'nullable'
                                       ]);
      
       $ckh_fleet = DB::table('fleet_mast')->where('fleet_code', '=', $validatedData['fleet_code'])->first();
       if(!empty($ckh_fleet)){
          return redirect()->back()->with('fleet_code_error','Fleet Code already exists');
       }
       else{                                  

          $validatedData['fleet_owner'] = Auth::user()->id;
          $last_id = Fleet::create($validatedData)->id;           
          //Mail::to($user->email)->send(new SendMailable($name));
          return redirect('fleet');
      }
    }

    public function show($id)
    {
        $user = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('fleet_id',$id)->get();
        $fleet_id = $id;
        $model_user = User::where('account_id',Auth::user()->id)->get();
        $fleet_users=FleetUser::where('fleet_id',$fleet_id)->get();
        $fleet_users_id = array();
        foreach ($fleet_users as $value) {
          $fleet_users_id[] = $value->user_id;
        } 
        return view('fleet.show',compact('user','model_user','fleet_id','fleet_users_id','count1','count2'));   
    }
   
    public function edit($id)
    {
        $fleet = DB::table('fleet_mast')->where('fleet_owner',$id)->get();
        $user = User::all();
        return view('fleet.edit',compact('fleet','user'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
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

    public function add_on_fleet(Request $request){
      $ids      = $request->id;
      $fleet_id = $request->fleet_id;    
      $data = array();
      foreach ($ids as $id) {
        $data = ['user_id'=>$id,'fleet_id'=>$fleet_id];
        DB::table('fleet_user')->insert($data);
      }
      $user = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('fleet_id',$fleet_id)->get();
      return view('fleet.table_refresh',compact('user'));  
    }
    public function user_delete($id)
    {
       DB::table('fleet_user')->where('id',$id)->delete();
       return redirect()->back();
    }
}

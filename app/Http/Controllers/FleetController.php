<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Crypt;

class FleetController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        $fleet = DB::table('fleet_mast')->get();
       
        return view('fleet.show',compact('user','fleet'));
    }

    public function create()
    {
        $user  = User::all();
        return view('fleet.create',compact('user'));
    }

    
    public function store(Request $request)
    {

        $validatedData = $request->validate([
                                       'fleet_owner' =>'required',
                                       'fleet_name'=> 'required',
                                       'fleet_code' => 'required|min:8|'
                                       ]);
      
       $ckh_fleet = DB::table('fleet_mast')->where('fleet_code', '=', $validatedData['fleet_code'])->first();
       if(!empty($ckh_fleet)){
          return redirect()->back()->with('fleet_code','Fleet Code already exists');
       }
       else{
        
     
       $user     = User::find($request->fleet_owner);
       $u_name     = strtolower($user->name);
       $password = substr($u_name,0,4).'1234';
       $name['username'] = $user->email;
       $name['name']     = $u_name;
       $name['password'] = $password;
             
        $validatedData['fleet_desc'] = $request->fleet_desc;

        $last_id =  DB::table('fleet_mast')->insert($validatedData);
       
        Mail::to($user->email)->send(new SendMailable($name));
        return redirect('fleet');
      }
    }

    
    public function show($id)
    {
        //
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
                                       'fleet_owner' =>'required',
                                       'fleet_name'=> 'required',
                                       'fleet_code' => 'required'
                                       ]);
       
        $validatedData['fleet_desc'] = $request->fleet_desc;

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

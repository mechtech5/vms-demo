<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
          
    }

    public function index()
    {
        $id = Auth::user()->id;
        $fleet = DB::table('fleet_mast')->where('fleet_owner',$id)->get();

        if(count($fleet) !=0){
            $fleer_code = $fleet[0]->fleet_code;
            
            Session::put('fleet_code', $fleer_code);
            
            $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');
                           
            if(! File::exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }   
         
         }

            
        $data = array();
        $data['fitnes']        = array();//DB::table('fitness')->get();
        $data['puc']           = array();//DB::table('puc')->get();
        $data['roadtax']       = array();//DB::table('roadtax')->get();
        $data['state_permitaA'] = array();//DB::table('state_permita')->get();

        return view('dashboard',compact('data'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('change_password',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['old_password' =>'required',
                                     'new_password'=>'required'   
                                    ]);
       $current_password = Auth::User()->password;    
           
     if (!(Hash::check($request->old_password, Auth::user()->password))) 
      { 
         return redirect()->back()->with('error','Old password not matched');
        }
        else{
          
           $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($data['new_password']);
            $obj_user->save();
            return redirect()->back()->with("error","Password changed successfully !");
        }
    }

    public function destroy($id)
    {
        //
    }
}

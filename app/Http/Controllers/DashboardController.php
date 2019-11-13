<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use App\User;
use Auth;
use File;
use App\FleetUser;
use App\Fleet;
use App\vehicle_master;
use App\Models\FitnessDetails;
use App\Models\InsuranceDetails;

class DashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
          
    }

    public function index()
    {
       $id          = Auth::user()->id;
       $hasfleet    = FleetUser::where('user_id',$id)->get();
       $count_fleet = count($hasfleet);
       $fleet_code = session('fleet_code');
       // dd($fleet_code);
       $insurance  = InsuranceDetails::with('vehicle')->where('fleet_code',$fleet_code)->get();
       
        $data = array();
        $data['fitnes']        =array();
        $data['puc']           = array();
        $data['roadtax']       = array();
        $data['state_permitaA'] = array();
        
        if($count_fleet != 0){

            if($count_fleet <= 1){
                $fleet_id = Fleet::find($hasfleet[0]->fleet_id);
                $fleer_code = $fleet_id->fleet_code;
               
                Session::put('fleet_code', $fleer_code);
                
                $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');
                               
                if(! File::exists($path)){
                    File::makeDirectory($path, 0777, true, true);
                } 
                          
                $data['fleet']    = 'no';
                $data['fleet_id'] = array(); 

                return view('dashboard',compact('data','insurance'));
            }
            else{

                $data['fleet_id'] = FleetUser::where('user_id',$id)->get();
                $data['fleet']    = 'yes';
                return view('dashboard',compact('data','insurance'));
            }
        }
        else{
            echo  "You Have Not Any Fleet Yet. Please Contact Your Account Owner..";
        }
        
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

     public function fleet_ckeck(Request $request){        
        $fleer_code = $request->fleet_code;
        
        Session::put('fleet_code', $fleer_code);        
        $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');                    
        if(! File::exists($path)){
            File::makeDirectory($path, 0777, true, true);
        }     
        return 'success';       
     }   
}


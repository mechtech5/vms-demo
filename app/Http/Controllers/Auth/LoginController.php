<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use Session;
use File;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function redirectPath()
    {
        $Id  = Auth::user()->id;
        $hasrole = DB::table('model_has_roles')->where('model_id',$Id)->first();
        $roleid = $hasrole->role_id;
    
        $fleet = DB::table('fleet_mast')->where('fleet_owner',$Id)->get();

       if(count($fleet) !=0){
            $fleer_code = $fleet[0]->fleet_code;
            
            Session::put('fleet_code', $fleer_code);
            $path = storage_path('app/public/'.$fleer_code.'/vehicle_number');
                           
            if(! File::exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }   
         
         }
        if(!empty($roleid)){
            if (method_exists($this, 'redirectTo')) {
                return $this->redirectTo();
            }
            switch ($roleid) {
                case '1' : $login = '/admin';
                    break;
                case '2':
                    return $login = '/dashboard';
                    break;
                default:
                    return $login='/';
            }
        }
        else{
            $login='/';
        }    
       
     return property_exists($this, 'redirectTo') ? $this->redirectTo : $login;
    }
}

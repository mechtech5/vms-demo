<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()    
    {//Auth::logout();
        $Id  = Auth::user()->id;
        $hasrole = DB::table('model_has_roles')->where('model_id',$Id)->first();       
        $roleid = 0;
        if(!empty($hasrole)){
           $roleid = $hasrole->role_id;
         }

        if($roleid == 1){
            Session::put('user_rol','admin');
            return redirect('admin');
        }
        else if($roleid == 2){
            Session::put('user_rol','fleet');
          return redirect('dashboard');   
        }
        else if($roleid == 3){
            Session::put('user_rol','account');
          return redirect('accountuser');   
        }
        elseif($roleid == 0) {
          Auth::logout();
          return redirect()->back()->with('error_msg',"please contact your admin");
        }
    }
}

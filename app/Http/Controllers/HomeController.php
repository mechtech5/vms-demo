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
        $acc_type  = Auth::user()->acc_type;
        
        // $hasrole = DB::table('model_has_roles')->where('model_id',$Id)->first();       
        // $roleid = 0;
        // if(!empty($hasrole)){
        //    $roleid = $hasrole->role_id;
        //  }

        if($acc_type == 'A'){
            Session::put('user_rol','admin');
            return redirect('admin');
        }
        else if($acc_type == 'C'){
            Session::put('user_rol','fleet');
          return redirect('dashboard');   
        }
        else if($acc_type == 'B'){
            Session::put('user_rol','account');
          return redirect('accountuser');   
        }
        elseif($acc_type == '') {
          Auth::logout();
          return redirect()->back()->with('error_msg',"please contact your admin");
        }
    }
}

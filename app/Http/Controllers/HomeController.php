<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Id  = Auth::user()->id;
        $hasrole = DB::table('model_has_roles')->where('model_id',$Id)->first();
        $roleid = $hasrole->role_id;
        if($roleid == 1){
            return redirect('admin');
        }
        else if($roleid == 2){
          return redirect('dashboard');   
        }
    }
}

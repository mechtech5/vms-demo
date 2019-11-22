<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendCode;
use App\User;
use Auth;
use Session;

class OtpController extends Controller
{
    public function verifiction(Request $request){
        $mobile_no = $request->id;
        $verify =SendCode::sendCode($mobile_no);
        $verifiction =User::where('mobile_no',$mobile_no)->update([ 'otp' => $verify]);
        $verifiction =User::where('mobile_no',$mobile_no)->get();
        return ($verify);
    }

    public function verify_otp(Request $request){
    	
        $mobile_no = $request->mobile_no;
        $verifiction =User::where('mobile_no',$mobile_no)->first();
       
        if($verifiction->otp == $request->otp_no){
        	
        	if(Auth::loginUsingId($verifiction->id)){

        		$acc_type  = Auth::user()->acc_type;

        		if(!empty($acc_type)){
		            if (method_exists($this, 'redirectTo')) {
		                return $this->redirectTo();
		            }
		            switch ($acc_type) {                
		                case 'A' : 
		                    Session::put('user_rol','admin');
		                    return redirect('admin');
		                    break;
		                case 'C':
		                    Session::put('user_rol','fleet');
		                    return redirect('dashboard');
		                    break;
		                case 'B':
		                    Session::put('user_rol','account');
		                    return redirect('accountuser');
		                    break;    
		                default:
		                    return redirect('login');
		            }
		        }
		        else{
		            $login='/';
		        }    
        	}
       }
    }
}

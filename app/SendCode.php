<?php

namespace App;

class SendCode
{
	public static function sendCode($mobile_no){
		$code = rand(1111,9999);
		$nexmo = app('Nexmo\Client');

	$nexmo->message()->send([
    'to'   => '+91'.$mobile_no,
    'from' => '+918839393861',
    'text' => 'Your Verification OTP is:'.$code,
]);
	return $code;
	}
}
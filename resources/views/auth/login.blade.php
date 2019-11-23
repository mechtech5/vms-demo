@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <?php
                        if(session('error_msg')){ ?>
                        <div class="text-center mb-4"><span  style="color: #FF0000;font-size:15px;">{{ session('error_msg') }}</span></div>
                    <?php }
                     ?>
                     <div class="form_login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-3 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-md-7 " >
                                    <a class="btn btn-primary text-white" id="login_mobile">
                                        {{ __('Login With Mobile No') }}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="form_otp" style="display: none;">
                        <form id="otp_form" action="{{url('/verify_otp')}}" method="POST">
                            @csrf
                            <div class="form-group row" id="phone">
                                <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile_no"  class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" >

                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="verify_otp" style="display: none;"> 
                                <label for="otp_no" class="col-md-4 col-form-label text-md-right">{{ __('Verify OTP') }}</label>

                                <div class="col-md-6">
                                    <input id="otp_no"  class="form-control @error('mobile_no') is-invalid @enderror" name="otp_no" value="{{ old('otp_no') }}" >

                                    @error('otp_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0" id="otp_send">
                                <div class="col-md-2 offset-md-4">
                                    <button id="send_otp" class="btn btn-primary">
                                        {{ __('Send Opt') }}
                                    </button>
                                </div>
                                <div class="col-md-6" >
                                    <a class="btn btn-primary text-white" id="login_email">
                                        {{ __('Login With Email') }}
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row mb-0" id="otp_verify" style="display: none;">
                                <div class="col-md-2 offset-md-4">
                                    <button id="send_otp" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>
                                </div>
                                <div class="col-md-6" >
                                    <a class="btn btn-primary text-white" id="login_email1">
                                        {{ __('Login With Email') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        // event.preventDefault();// headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},('/verification'
        $('#login_mobile').on('click',function(){

            console.log(this);
            $('.form_otp').show();
            $('.form_login').hide();
        });
        $('#login_email').on('click',function(){
            console.log(this);
            $('.form_otp').hide();
            $('.form_login').show();
        });
        $('#login_email1').on('click',function(){
            console.log(this);
            $('.form_otp').hide();
            $('.form_login').show();
        });
        
        $('#send_otp').on('click',function(event){
            event.preventDefault();
            var id = $('#mobile_no').val();
        $.ajax({
            type:'POST',
            url:'/verification',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{id:id},
            success:function(data){
               $('#verify_otp').show(); 
               $('#otp_verify').show();
               $('#otp_send').hide(); 
               $('#phone').hide();
            }
        })
    })
    })
</script>
@endsection

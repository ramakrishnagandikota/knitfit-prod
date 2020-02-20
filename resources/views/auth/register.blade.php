@extends('layouts.app')
@section('title','Sign-Up')
@section('content')
        @if(Session::has('error'))
        <p class="text-center alert alert-success">{{Session::get('error')}}</p>
        @endif

 <!-- Authentication card start -->
<form class="md-float-material form-material" method="POST" action="{{url('register')}}" autocomplete="no">
    @csrf
    <div class="text-center">
        <img src="{{ asset('resources/assets/files/assets/images/logoNew.png') }}" class="theme-logo" alt="logo.png">
    </div>
    <div class="auth-box card">
        <div class="card-block custom-padding">
            <div class="row m-b-5">
                <div class="col-md-12">
                    <h5 class="text-center txt-primary m-b-10">Create Account</h5>
                </div>
            </div>
           
            <!-- <p class="text-muted text-center p-b-5">Sign up with your account details</p> -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-primary">
                        <input type="text" name="first_name" class="form-control {{old('first_name') ? 'fill' : ''}}" value="{{old('first_name')}}" >
                        <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Name should contain only letters and have a maximum length of 15 characters."></i>
                        <span class="form-bar"></span>
                        <label class="float-label">First Name</label>
                         <span class="red">@if($errors->first('first_name')) {{$errors->first('first_name')}} @endif</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group form-primary">
                        <input type="text" name="last_name" class="form-control {{old('last_name') ? 'fill' : ''}}" value="{{old('last_name')}}" >
                        <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Name should contain only letters and have a maximum length of 15 characters."></i>
                        <span class="form-bar"></span>
                        <label class="float-label">Last Name</label>
                         <span class="red">@if($errors->first('last_name')) {{$errors->first('last_name')}} @endif</span>
                    </div>
                </div>
            </div>
            
                
                    <div class="form-group form-primary">
                        <input type="text" name="username" class="form-control {{old('username') ? 'fill' : ''}}" value="{{old('username')}}" >
                        <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Your Username is how others will find you and may contain up to 15 characters, including letters and numbers."></i>
                        <span class="form-bar"></span>
                        <label class="float-label">Choose Username</label>
                         <span class="red">@if($errors->first('username')) {{$errors->first('username')}} @endif</span>
                    </div>
           
            <div class="form-group form-primary">
                <input type="text" name="email" class="form-control {{old('email') ? 'fill' : ''}}" value="{{old('email')}}" >
                <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Email should be a vaild email."></i>
                <span class="form-bar"></span>
                <label class="float-label">Your Email Address</label>
                <span class="red">@if($errors->first('email')) {{$errors->first('email')}} @endif</span>
            </div>
            <div class="row m-b-5">
                <div class="col-sm-6">
                    <div class="form-group form-primary">
                        <input type="password" name="password" class="form-control" >
                        <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Your password must be more than 8 characters long, should contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."></i>
                        <span class="form-bar"></span>
                        <label class="float-label text-muted">Password</label>
                        <span class="red">@if($errors->first('password')) {{$errors->first('password')}} @endif</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-primary">
                        <input type="password" name="confirm_password" class="form-control" >
                       <!--  <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Password and Confirm Passwors should match."></i> -->
                        <span class="form-bar"></span>
                        <label class="float-label text-muted">Confirm Password</label>
                        <span class="red">@if($errors->first('confirm_password')) {{$errors->first('confirm_password')}} @endif</span>
                    </div>
                </div>
            </div>
            
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted text-center p-b-5 m-t-5">Or, sign up with</p>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('auth/google')}}" class="btn waves-effect btn-sm custom-social-google waves-light btn-google-plus"><i class="icofont icofont-social-google-plus"></i>Google</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('auth/facebook')}}" class="btn btn-facebook custom-social-facebook m-b-20 btn-sm waves-effect waves-light"><i class="icofont icofont-social-facebook"></i>facebook</a>
                    </div>
                </div>
         
            <div class="row text-left">
                <div class="col-md-12">
                    <div class="checkbox-fade fade-in-primary">
                        <label class="micro-label">
                            <input type="checkbox" name="terms_and_conditions" class="form-control-danger" value="1">
                            <span class="cr custom-chkbox"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            <span class="text-inverse">I have read and accept the <a href="#" class="micro-label" style="color:#0d665c"><u>Terms &amp; Conditions</u>.</a></span>
                            <br>
                            <span class="red">@if($errors->first('terms_and_conditions')) {{$errors->first('terms_and_conditions')}} @endif</span>
                        </label>
                        <label class="micro-label">
                            <input type="checkbox" name="news_letters" value="1">
                            <span class="cr custom-chkbox"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            <span class="text-inverse">Sign up for KnitFit Newsletter </span>
                        </label>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="checkbox-fade fade-in-primary">
                        <label>
                            <input type="checkbox" value="">
                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                            <span class="text-inverse">Send me the <a href="">Newsletter</a> weekly.</span>
                        </label>
                    </div>
                </div> -->
            </div>
            <div class="row m-t-15">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-10 theme-outline-btn">Sign up now</button>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-10">
                    <p class="text-inverse text-left m-b-0">Back to <a href="{{url('login')}}" style="color: #0d665c"><b>KnitFit</b></a></p>
                </div>
                <!-- <div class="col-md-2">
                    <img src="files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                </div> -->
            </div>
        </div>
    </div>
</form>
<!-- Authentication card end -->               

                    
@endsection

@section('footersection')

<style type="text/css">
    .red{
		color: #bc7c8f;
		font-weight:bold;
		font-size: 12px;
	}
    .pophover{
            position: absolute;
    top: 15px;
    right: 0px;
    font-size: 11px;
    }
</style>

<script type="text/javascript">
    $(function () {
  $('[data-toggle="popover"]').popover();


})
</script>
@endsection
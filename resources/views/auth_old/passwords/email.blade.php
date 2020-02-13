@extends('layouts.app')
@section('title','Reset Password')
@section('content')

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail') }}
                        </div>
                    @endif

                    <form class="md-float-material form-material" action="{{url('password-reset')}}" method="POST">
                        @csrf
                    <div class="text-center">
                            <img src="{{ asset('resources/assets/files/assets/images/logoNew.png') }}" class="theme-logo" alt="logo.png">
                        </div>


                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left">Recover your password</h3>
                                    </div>
                                </div>
                                
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                    <span class="red">@if($errors->first('email')) {{$errors->first('email')}} @endif</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 theme-outline-btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                    </div>
                                </div>
                                <p class="f-w-600 text-right">Back to <a href="{{url('login')}}" style="color: #0d665c;">Login.</a></p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        

                        
                    </form>



                    <style type="text/css">
                        .red{
                            color: red;
                            font-size: 12px;
                        }
                    </style>

@endsection

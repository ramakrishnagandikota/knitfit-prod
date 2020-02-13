
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Activated</div>

                <div class="card-body">
                   You have successfully Activated your account . 
                   <a href="{{url('login')}}"> Click here to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

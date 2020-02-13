@extends('layouts.app')

@section('content')
<div class="container" style="display: none;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<?php 
					if(Auth::user()->hasRole('Admin')){
						echo 'admin';
					}
					
					if(Auth::user()->hasRole('Knitter')){
						echo 'knitter';
					}

                    if(Auth::user()->hasRole('Designer')){
                        echo 'designer';
                    }
					?>
					
					{{Auth::user()->id}}

                    You are logged in! <a href="{{url('logout')}}"> LOGOUT</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footersection')

<script type="text/javascript">
    $(function(){

        $('.loading').show();
        window.location.assign('{{url("/")}}');
    });
</script>

@endsection
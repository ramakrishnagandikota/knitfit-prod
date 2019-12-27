@extends('layouts.app')
@section('title','Set New Password')
@section('content')

 <!-- Authentication card start -->

<p class="alert alert-danger hide" id="fail">
 Problem in updating new password , please try again after some time.
</p>


<div id="validation-errors">
    
</div>
    
<form class="md-float-material form-material" id="validate-newpassword"  >
    @csrf

    <input type="hidden" name="tok" value="{{$email}}">
    <input type="hidden" name="token" id="token" value="{{$token}}">
    <div class="text-center">
        <img src="{{ asset('resources/assets/files/assets/images/logoNew.png') }}" class="theme-logo" alt="logo.png">
    </div>
    <div class="auth-box card">
        <div class="card-block custom-padding">
            <div class="row m-b-20">
                <div class="col-md-12">
                    <h4 class="text-center">Set New Password</h4>
                </div>
            </div>
            
            <div class="form-group form-primary">
                <input type="password" name="password" id="password" class="form-control" >
                <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Your password must be more than 8 characters long, should contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character."></i>
                <span class="form-bar"></span>
                <label class="float-label">Enter New Password</label>
                <span class="red hide" id="pass">Password is required.</span>
                <span class="red hide" id="pass1"></span>
            </div>
            <div class="form-group form-primary">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" >
                <i class="fa fa-info pophover" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Password and Confirm Passwors should match."></i>
                <span class="form-bar"></span>
                <label class="float-label">Re-Enter New Password</label>
                <span class="red hide" id="cnpass">Confirm Password is required.</span>
                <span class="red hide" id="cnpass1">Password & Confirm Password should match.</span>
            </div>
            <div class="row">
                <div class="col-md-12 m-t-20">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 theme-outline-btn">Set Password</button>
                </div>
            </div>
            <!-- <p class="f-w-600 text-right">Back to <a href="sign-in.html" style="color: #0d665c;">Login.</a></p>
            <div class="row">
                <div class="col-md-10">
                    <p class="text-inverse text-left m-b-0">Thank you.</p>
                    <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                </div>
                
            </div> -->

            <!-- Modal for popup. This will opped up when password set successfully-->
            <div class="modal fade" id="popup-Modal" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                          <!-- <h5 class="modal-title">Done</h5> -->
                    </div>
                    <div class="modal-body">
                        <p></p>
                           <p class="text-center"><i class="fa fa-check done"></i></p>
                           <h6 class="text-center">Your password has been changed successfully! Thank you ...</h6>
                           <p></p>
                           <p class="text-center"><a class="f-20" href="{{url('login')}}">Go to Login</a></p>
                    </div>
                    <div class="modal-footer">
                            
                    </div>
                  </div>
                </div>
              </div>

<a id="popup" data-toggle="modal" data-dismiss="modal" data-target="#popup-Modal"></a>

            <!--Set passwors Pop up Ends here-->
@endsection

@section('footersection')

<style type="text/css">
    .hide{
        display: none;
    }
    .red{
        color: red;
    }
    .pophover{
            position: absolute;
    top: 15px;
    right: 0px;
    font-size: 11px;
    }
</style>
    

<script type="text/javascript">
    $(function(){
        $('[data-toggle="popover"]').popover();
       setTimeout(function(){ check(); },1000); 
        $(document).on('submit','#validate-newpassword',function(e){
            e.preventDefault();
            var Data = $("#validate-newpassword").serializeArray();
            var password = $("#password").val();
            var cnfpassword = $("#confirm_password").val();
            var er = [];
            var cnt = 0;

            if(!password){
                $("#pass").removeClass('hide');
                er+=cnt+1;
            }else{
                $("#pass").addClass('hide');
            }

            if(!cnfpassword){
                $("#cnpass").removeClass('hide');
                er+=cnt+1;
            }else{
                $("#cnpass").addClass('hide');
            }

            if(password != cnfpassword){
                $("#cnpass1").removeClass('hide');
                er+=cnt+1;
            }else{
                $("#cnpass1").addClass('hide');
            }

            if(er != ""){
                return false;
            }

            $(".loading").show();
            
            $.ajax({
                url: '{{url("validate/newpassword")}}',
                type: 'POST',
                data: Data,
            })
            .done(function(res) {
                //console.log(e);
               // alert(JSON.stringify(e));
                if(res == 0){
                   setTimeout(function(){ 
                    $("#popup").trigger('click'); 
                    $(".loading").hide(); 
                   },1000);
                }else{
                    setTimeout(function(){ 
                        $("#fail").removeClass('hide');
                    },1000);
                }
            })
            .fail(function(res) {
               var response = JSON.parse(res.responseText);
        var errorString = '';
        $.each( response.errors, function( key, value) {
            errorString += value;
        });

        $("#pass1").removeClass('hide').html(errorString);
        setTimeout(function(){ 
                    $(".loading").hide(); 
                   },1000);
            })
            .always(function(res) {
                if(res == 0){
                    setTimeout(function(){ window.location.assign('{{url("login")}}'); },3000);
                }else{
                    setTimeout(function(){ 
                        $("#fail").addClass('hide');  
                        $("#pass1").addClass('hide').html('');  
                    },4000);
                }
            });


            
            
        })
    });

    function check(){
        var token = $("#token").val();
        $.get('{{url("check-validpage")}}/'+token,function(res){
            if(res == 'expired'){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Your reset link was expired.',
                  showCancelButton: false,
                  showConfirmButton: false,
                  footer: '<a href="{{url("login")}}">Click here to login</a>',
                  allowOutsideClick: false
                })
            }
        });
    }
</script>
@endsection
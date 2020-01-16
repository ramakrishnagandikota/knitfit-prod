@extends('layouts.knitterapp')
@section('title','Knitter Dashboard')
@section('content')
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <div class="main-body">
            <div
               class="page-wrapper">
               <!-- Page-body start --> 
               <div class="page-body">
                  <div class="row">
                     <div class=" card col-lg-12">
                        <p> 
                        <h5
                           class="card-header-text theme-heading"></h5>
                        </p> <!-- personal card
                           start --> <!--First Accordion Starts here--> 
                        <div class="row
                           outline-row m-b-10">
                           <div  class="card-header accordion col-lg-11"
                              data-toggle="collapse" data-target="#section1">
                              <h5
                                 class="card-header-text">Measurement Profile</h5>
                           </div>
                           <div
                              class="col-lg-1 m-t-15"> <i class="fa fa-caret-down pull-right
                              micro-icons"></i> </button> </div>
                        </div>
                        <div class="card-block
                           collapse show" id="section1">
                           <div class="row">
                              <div class="col-lg-4 radio-text m-b-10">Name</div>
                              <div class="col-lg-4 radio-text">Measurements were taken on..</div>
                              <div class="col-lg-4 radio-text">Unit of measurement</div>
                           </div>
                           <form id="measurements">
                            @csrf
                           <div class="row">
                              <div class="col-lg-3">
                                <input placeholder="Name" type="text" class="form-control" id="m_title" name="m_title" value="{{$me->m_title}}">
                                <span class="red m_title"></span>
                              </div>
                              <div class="col-lg-1"></div>
                              <div class="col-lg-2"> 
                                <input id="dropper-default" class="form-control" type="text" placeholder="Select your date" name="m_date" value="{{date('m/d/Y',strtotime($me->m_date))}}" />
                                <span class="red m_date"></span>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-radio row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2">
                                       
                                          <div class="radio radio-inline">
                                             <label>
                                             <input type="radio" id="radio1" class="radio" @if($me->measurement_preference == 'inches') checked @endif name="measurement_preference" value="inches">
                                             <i class="helper"></i><span class="radio-text">Inches</span>
                                             </label>
                                          </div>
                                    </div>
                                    <div class="col-lg-2">
                                    <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" id="radio2" class="radio" @if($me->measurement_preference == 'centimeters') checked @endif  name="measurement_preference" value="centimeters">
                                    <i class="helper"></i><span class="radio-text">Centimeters</span>
                                    </label>
                                    </div>
                                    
                                    </div> 

                                    <span class="red measurement_preference"></span> 
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" id="imageurl" name="user_meas_image" value="{{$me->user_meas_image}}">
                         </form>
                           <!-- <div class="row">
                              <label class="col-sm-12 col-form-label">For Whom</label>
                              </div> -->
                           <div class="form-group row">
                              <div class="col-lg-12">
                               
                                 <!-- Upload  -->
                                 <label class="col-sm-12 col-form-label">Upload an image. Browse files by clicking the Browse Files button.</label>
                                 <br>    <br>
                              </div>
                              
                              <div class="col-lg-12 hide">
                                 <div class="row">
                                    <div class="col-lg-6 m-l-15">

                                      <form id="file-upload-form" enctype="multipart/form-data" method="POST">
                                        @csrf
                                     
                                       
                               <div id="dd">
                                  <label for="upload-photo" class="custom-file-upload">
                                   <p class="text-center"> <i class="fa fa-cloud-upload fa-2x"></i> </p>
                                      <span>Browse files </span>
                                  </label>
                                  <input type="file" name="file" id="upload-photo" />
                                </div>
                                 </form>
                                 <span class="red imageurl"></span>
                                    </div>
                                 </div>

                                    

                              </div>


                              <div class="col-md-12">
                                <div class="row" id="imageplace">
                                  
                                <div class="box"><img src="{{url($me->user_meas_image)}}" style="width: 138px;height: 113px;"><span style="margin-top: 8px;"><a href="javascript:;" class="icon1"></a><a href="#" class="fa fa-trash-o pull-right icon2"></a></span></div>
                              
                                </div>
                              </div>

                              
                           </div>
                           <!--First Accordion Ends here -->
                           <!-- <div class="sub-title">Example 1</div> -->
                        </div>
                     </div>
                  </div>
                  <div class="row hide" id="allmeasurements">
                     
                  </div>

                  
               </div>
               <!-- Page-body end -->
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('footerscript')

<link href="{{ asset('resources/assets/select2/select2.min.css') }}" rel="stylesheet" />
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
 <!-- Date-time picker css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
   <!-- Date-Dropper css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/datedropper/css/datedropper.min.css') }}" />
 <!-- jquery file upload Frame work -->
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/pages.css') }}">

<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
<script src="{{ asset('resources/assets/files/assets/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
<!-- Select 2 js -->


<script src="{{ asset('resources/assets/select2/select2.min.js') }}"></script>


    <!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/datedropper/js/datedropper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/advance-elements/custom-picker.js') }}"></script>

<style type="text/css">
  .custom-file-upload {
   cursor: pointer;
  border: 2px dashed #C8CBCE;
    display: inline-block;
    padding:50px 220px;
    line-height: 1.5;
    color: #0d665c;
}

.custom-file-upload span{
  border: 1px solid #0d665c;
  padding: 10px;
}
.custom-file-upload span:hover{
  background-color: #0d665c;
  color: #fff;
  border:1px solid #0d665c;
}

#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}


.box{
  height: 152px;
  width: 152px;
  margin:3px;
    padding: 10px;
    border: 1px solid #e1e1e1;
    border-radius: 3px;
    background: #fff;
    -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
    -moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
    box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
}
.icon2{
  margin-top: 5px;
}
.green{
  color: green;
}
.hide{
  display: none;
}
.red{
  color: red;
}
</style>

<script type="text/javascript">
   $(function(){

    get_variables();
   

   $('[data-toggle="tooltip"]').tooltip();
   $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
            return $('#primary-popover-content').html();
        }
    });


   $(document).on("mouseout" , ".hover-placeholder" , function () {
    
        $(this).removeAttr('placeholder');

    });

    $(document).on("mouseover" , ".hover-placeholder" , function () {

        if($(this).val() == ''){
            $(this).attr('placeholder' , "_ . _");
        }
    });
   
   $(document).on('change','#file-upload-form',function(e){
   e.preventDefault();

   $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   }); 
   
   $.ajax({
   url: "{{url('knitter/upload-measurement-picture')}}",
   type: "POST",
   data:  new FormData(this),
   beforeSend: function(){ 
   $(".loading").show();
   },
   contentType: false,
   processData:false,
   success: function(data)
   {
   if(data.path != 0){


var ip = '<div class="box"><img src="'+data.path+'" style="width: 138px;height: 113px;"><span style="margin-top: 8px;"><a href="javascript:;" class="green icon1">Success</a><a href="#" class="fa fa-trash-o pull-right icon2"></a></span></div>';

$("#imageplace").html(ip);

   //alert(data.path)
   //$("#file-image").attr('src',data.path);
   //$("#file-image1").attr('src',data.path);
   $("#imageurl").val(data.path);
   //$("#imageurl1").val(data.path);
   //setTimeout(function(){ location.reload(); },1000);
   //swal('Success','Profile picture changed sucessfully','success');
   }else{
   //swal('Fail','Unable to upload file , Try again after some time.','error');
   }
   },
   complete : function(){
   $(".loading").hide();
   },
   error: function() 
   {
   }           
   });
   
   });

  $("input[type='radio']").click(function(){
        var radioValue = $("input[name='measurement_preference']:checked").val();
        if(radioValue != '{{$me->measurement_preference}}'){

          if(confirm('If you change the measurement preference , the data may get lost ?')){
              get_variables('centimeters');
      setTimeout(function(){ 
        $(".js-example-basic-single").val(0); 
        $(".js-example-basic-single").select2().trigger('change'); 
      },2000);
          }else{
            get_variables('inches');
    $("#radio1").prop("checked", true);
          }
        }else{

           if(confirm('If you change the measurement preference , the data may get lost ?')){
              get_variables('inches');
              $("#radio1").prop("checked", true);
           }else{

               get_variables('centimeters');
     setTimeout(function(){ 
        $(".js-example-basic-single").val(0); 
        $(".js-example-basic-single").select2().trigger('change'); 
      },2000);
     
           }

        }
    });
   
   
   });

   function get_variables(val){
    if(val){
      if(val == 'inches'){
      var mp = 'inches';
    }else{
      var mp = 'centimeters';
    }
    }else{
      var mp = '{{$me->measurement_preference}}';
    }

    if(!mp){
      alert('Please select measurement preference.');
      return false;
    }
    
    var id = '{{base64_encode($id)}}';
    $.get('{{url("knitter/get-measurement-variables/")}}/'+id+'/'+mp,function(res){
      $("#allmeasurements").removeClass('hide').html(res);

    });

   }

   function Notifi(icon,m,msg,info){

     $.notify({
            icon: 'fa '+icon,
            title: m+' !',
            message: msg
        },{
            element: 'body',
            position: null,
            type: info,
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 10000,
            style: 'bootstrap',
            delay : 5000,
            animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

 }
</script>
@endsection
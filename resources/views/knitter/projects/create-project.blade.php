@extends('layouts.knitterapp')
@section('title','Knitter Project Library')
@section('content')

<div class="pcoded-wrapper">

<div class="pcoded-content">

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label class="theme-heading f-w-600 m-b-20">Create Project 
                           </label> 
                           <span class="mytooltip tooltip-effect-2" >
                            <span class="tooltip-item">?</span>
                            <span class="tooltip-content clearfix" id="Customtooltip">
                            <span class="tooltip-text" style="width: 100%;">Select the type of pattern you will use for this project.</span>
                        </span>
                        </span>     
                        <!-- To Do Card List card start -->

<form id="create-project">
    <div class="card">
        <div class="outline-row m-b-10 p-10 m-t-10" style="margin-right: 10px;margin-left: 10px;">
            <h5 class="card-header-text">Select pattern type</h5>
           </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12 m-b-10 m-l-10 m-t-10">
                <div class="form-radio">
                   
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" class="patterns" id="purchased-pattern" name="pattern_type" data-toggle="modal" data-target="#myModal" value="custom">
                                <i class="helper"></i>Custom pattern
                            </label>
                        </div>
                         <div class="radio radio-inline">
                            <label>
                                <input type="radio" class="patterns" name="pattern_type" id="non-custom-pattern" data-toggle="modal" data-target="#nonCustomModal" value="non-custom">
                                <i class="helper"></i>Non-custom pattern
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" class="patterns" name="pattern_type" id="external-pattern" value="external">
                                <i class="helper"></i>External pattern
                            </label>
                        </div>

                       
                </div>
            </div>
        </div>


<div id="loadPatterns"></div>


    </div>
</form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Select Pattern</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-8 col-lg-8 m-t-10">
                            <select name="select"
                                class="form-control form-control-default" id="pattern-list">
                                <option value="0" selected>--Select Pattern--</option>
                                <option value="opt2">Off-the-Shoulder Ruffle Top</option>
                                <option value="opt3">Peekaboo Cabled
                                    Sweater</option>
                                <option value="opt4">The Boyfriend
                                    Sweater</option>
                                <option value="opt5">Marsha's Lacy Tee
                                </option>
                                <option value="opt6">Emily's Sweater
                                </option>
                                <option value="opt7">Trevor's V-neck
                                </option>
                                <option value="opt8">Off-the-Shoulder
                                    Ruffle Top</option>
                            </select>
                        </div>
                       
                    </div>
                    <!-- <div class="row">
                            <label class="col-sm-12 col-form-label">For Whom</label>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-lg-12">
                               
<!-- Upload  -->

       
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-danger cancel-btn" data-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success submit-btn" data-toggle="modal">Continue</button>
            </div>
          </div>
        </div>
      </div>

</div>
    <!-- Non custom Modal -->
    <div class="modal fade" id="nonCustomModal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Select Pattern</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-8 col-lg-8 m-t-10">
                            <select name="select"
                                class="form-control form-control-default" id="pattern-list-non-custom">
                                <option value="0" selected>--Select Pattern--</option>
                                <option value="opt2">Off-the-Shoulder Ruffle Top</option>
                                <option value="opt3">Peekaboo Cabled
                                    Sweater</option>
                                <option value="opt4">The Boyfriend
                                    Sweater</option>
                                <option value="opt5">Marsha's Lacy Tee
                                </option>
                                <option value="opt6">Emily's Sweater
                                </option>
                                <option value="opt7">Trevor's V-neck
                                </option>
                                <option value="opt8">Off-the-Shoulder
                                    Ruffle Top</option>
                            </select>
                        </div>
                       
                    </div>
                    <!-- <div class="row">
                            <label class="col-sm-12 col-form-label">For Whom</label>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-lg-12">
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                  <button type="button" class="btn btn-danger cancel-btn" data-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success theme-btn submit-btn-non-custom" data-toggle="modal">Continue</button>
            </div>
          </div>
        </div>
      </div>
      <!--Onload Modal -->
        <!-- Modal -->
    </div>

    @if($measurements == 0)
    <div class="modal fade" id="OnLoadModal" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content p-t-20 p-b-20">
            <div class="modal-body text-center p-30">
                <h3>It looks like you haven’t added any 
                    measurement profiles yet.
                    </h3>
                    <h6 class="m-t-30 m-b-40 f-w-400">You must have a measurement profile to generate custom patterns.<br> Or, if you are creating an external or non-custom pattern, click continue.</h6>
                    <button type="submit" class="btn btn-success theme-btn" data-toggle="modal"><a class="custom-link" href="EditMeasurement.html">Add measurement profile</a></button>
                    <button type="button" class="btn btn-danger theme-outline-btn" data-dismiss="modal">&nbsp;&nbsp;Continue anyway&nbsp;&nbsp;</button>
            </div>
          
          </div>
        </div>
      </div>
    @endif

@endsection
@section('footerscript')
<link rel="stylesheet" href="{{ asset('resources/assets/files/bower_components/select2/css/select2.min.css') }}" />
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('resources/assets/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/multiselect/css/multi-select.css') }}" />
     <!-- jquery file upload Frame work -->
     <link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
     <link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
<style type="text/css">
    .hide{
        display: none;
    }
    .profile-upload{position: absolute;z-index: 999999; top: 4px;left: 18px;}
    #upload-file {
    display: block;
    font-size: 14px;
}

    /* The container */
.container {
  display: block;
  position: relative;
  padding-left: 26px;
  margin-bottom: 10px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 16px;
  width: 16px;
  border: 1.6px solid #0d665c;
  border-radius: 2px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #0d665c;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 3px;
    top: 0px;
    width: 6px;
    height: 11px;
    border: solid white;
    border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<script type="text/javascript">
    var URL = '{{url('knitter/project-image')}}';
    var URL1 = '{{url('knitter/remove-project-image')}}';
</script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js')}}"></script>

    <!-- Select 2 js -->
    <script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/select2/js/select2.full.min.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/advance-elements/select2-custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/multi-select-dropdownlist.js') }}"></script>
       <!-- jquery file upload js -->
       <script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
       <script src="{{ asset('resources/assets/files/assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
       
       <!-- notification js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/bootstrap-growl.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/notification/notification.js') }}"></script>

<script type="text/javascript">
    $(function(){
        $('#OnLoadModal').modal({backdrop: 'static', keyboard: false});


        $(document).on('click','.patterns',function(){
            var data = $(this).val();
            $(".loading").show();
            if(data == 'external'){
                $.get('{{url("knitter/project/external")}}',function(res){
                    $("#loadPatterns").html(res);
                    $(".loading").hide();
                    $("#cm-stitch-non-custom,#cm-row-non-custom,#stitch-cm-external,#row-cm-external,#sts-ease-prefer-ext").hide();
                    $("#external-pattern").prop('checked',true);
                }); 
            }
        });

$(document).on('click',"#inches-external:radio",function() {
    $("#stitch-sts-external,#row-sts-external,#inches-ease-prefer-ext").show();
    $('#stitch-cm-external,#row-cm-external,#sts-ease-prefer-ext').hide();
});

$(document).on('click',"#cm-external:radio",function() {
    $("#stitch-cm-external,#row-cm-external,#sts-ease-prefer-ext").show();
    $('#stitch-sts-external,#row-sts-external,#inches-ease-prefer-ext').hide();
});


var i=2;
$(document).on("click",".add-yarn-external",function(){
$("#yarn-row-external").append('<div id="yarn_tools'+i+'" class="row" style="margin-right: 0px;"><div class="col-lg-12" ><hr></div><div class="col-md-4">\
<div class="form-group">\
<label class="col-form-label">Yarn used\
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Enter the yarn you used for this pattern.</span>\
</span>\
</span></label>\
<div class="row">\
<div class="col-md-12">\
<input type="text" class="form-control" id="yarn_used'+i+'" name="yarn_used[]" value="Lion Brand Yarn 135-189 Hometown Yarn">\
</div>\
</div>\
</div>\
</div>\
<div class="col-md-4">\
<div class="form-group">\
<label class="col-form-label">Fiber type used\
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Enter the fiber content of the yarns use.</span>\
</span>\
</span>\
</label>\
<div class="row">\
<div class="col-md-12">\
<input type="text" class="form-control" id="fiber_type'+i+'" name="fiber_type[]" value="Combed cotton woollen"></div>\
</div>\
</div>\
</div> \
<div class="col-lg-4">\
<div class="form-group">\
<label class="col-form-label">Yarn weight used\
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Select the yarn weight from the dropdown.</span>\
</span>\
</span>\
</label>\
<div class="row">\
<div class="col-md-12">\
<select class="form-control" id="yarn_weight'+i+'" name="yarn_weight[]" >\
<option>Lace</option>\
<option>Super Fine</option>\
<option>Fine</option>\
<option>Light</option>\
<option>Meduim</option>\
<option>Bulky</option>\
<option>Super Bulky</option>\
<option>Jumbo</option>\
</select>\
</div></div>\
</div><a href="javascript:;" class="deleteYarn" data-id="'+i+'"><i class="fa fa-trash delete-row"></i></a>\
</div>\
<div class="col-md-4">\
<div class="form-group">\
<label class="col-form-label">Colorway \
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Please enter colorway</span>\
</span>\
</span>  </label>\
<div class="row">\
<div class="col-md-12">\
<input type="text" class="form-control" id="colourway1" name="colourway[]"> \
</div>\
</div>\
</div>\
</div>\
<div class="col-md-4">\
<div class="form-group">\
<label class="col-form-label">Dye lot  \
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Please enter dye lot</span>\
</span>\
</span></label>\
<div class="row">\
<div class="col-md-12">\
<input type="text" class="form-control" id="dye_lot'+i+'" name="dye_lot[]"> \
</div>\
</div>\
</div>\
</div>\
<div class="col-md-4">\
<div class="form-group">\
<label class="col-form-label">Skeins  \
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
<span class="tooltip-text" style="width: 100%;">Please enter skeins</span>\
</span>\
</span> </label>\
<div class="row">\
<div class="col-md-12">\
<input type="text" class="form-control" id="skeins'+i+'" name="skeins[]"> \
</div>\
</div>\
</div>\
</div></div>\
')
i++;
});

//Action button to add NEEDLE field in the External PATTERN
var j=2;
$(document).on("click",".add-needle-external",function(){
$("#needle-row-external").append(' <div class="col-md-4" id="needle'+j+'">\
<div class="form-group">\
<label class="col-form-label">Needle size used\
<span class="mytooltip tooltip-effect-2">\
<span class="tooltip-item">?</span>\
<span class="tooltip-content clearfix">\
  <span class="tooltip-text" style="width: 100%;">Select the needle size from the dropdown.</span>\
</span></span></label>\
<div class="row">\
<div class="col-md-12">\
    <select class="form-control" name="needle_size[]" id="needle_size'+i+'">\
        <option selected>Select needle size</option>\
        @foreach($needlesizes as $ns)\
            <option value="{{$ns->id}}">US {{$ns->us_size}}  {{ $ns->mm_size ? '- '.$ns->mm_size.' mm' : '' }}</option>\
        @endforeach\
    </select>\
</div>\
</div></div>\
<a href="javascript:;" class="deleteNeedle" data-id="'+j+'"><i class="fa fa-trash delete-row"></i></a>\
</div>')
});
//=======================================================


// delete needle row

$(document).on('click','.deleteYarn',function(){
    var id = $(this).attr('data-id');
    if(confirm('Are you sure want to delete this row ?')){
        $("#yarn_tools"+id).remove();
    }
});

$(document).on('click','.deleteNeedle',function(){
    var id = $(this).attr('data-id');
    if(confirm('Are you sure want to delete this row ?')){
        $("#needle"+id).remove();
    }
});


$(document).on('click','#checkme',function () {
//check if checkbox is checked
    if ($(this).is(':checked')) {
        $('#save').removeAttr('disabled'); //enable input
    } else {
        $('#save').attr('disabled', true); //disable input
    }
});

$(document).on('click','#save',function(e){
    e.preventDefault();
    var project_name = $("#project_name").val();
    var description = $("#description").val();
    var images = $(".jFiler-item").length;
    var checkme = $("#checkme").prop('checked');
    var er = [];
    var cnt = 0;

    if(project_name == ''){
        $(".project_name").removeClass('hide');
        er+=cnt+1;
    }else{
        $(".project_name").addClass('hide');
    }

    if(description == ''){
        $(".description").removeClass('hide');
        er+=cnt+1;
    }else{
        $(".description").addClass('hide');
    }

    if(images == 0){
        $(".image").removeClass('hide');
        er+=cnt+1;
    }else{
        $(".image").addClass('hide');
    }

    if(checkme == false){
        $(".checkme").removeClass('hide');
        er+=cnt+1;
    }else{
        $(".checkme").addClass('hide');
    }

    if(er != ""){
        return false;
    }

    var Data = $("#create-project").serializeArray();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
        url : '{{url("knitter/create-project")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            $(".loading").show();
        },
        success : function(res){
            if(res.status == 'success'){
                notify('fa fa-check','success',' ','Project created successfully');
                setTimeout(function(){ window.location.assign('{{url("knitter/project-library")}}'); },2000);
            }else{
                notify('fa fa-times','error',' ','Unable to create project, Try again after sometime.');
            }
        },
        complete : function(){
           setTimeout(function(){ $(".loading").hide(); },1000);
        }
    });
});
    });

    function readprofileURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-external-pattern')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    function notify(icon, type,title, msg){
        $.growl({
            icon: icon,
            title: title,
            message: msg,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };
</script>
@endsection
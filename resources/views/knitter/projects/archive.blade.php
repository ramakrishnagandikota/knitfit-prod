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
     <div class="col-xl-4">
        <h5 class="theme-heading"><a href="Create-Project.html"><i class="fa fa-home theme-heading m-r-10"></i></a> My archive </h5>
     </div>
     <div class="col-xl-8 text-right tabber">
        <a href="{{url('knitter/create-project')}}" class="btn btn-theme tablike-bt-fill waves-effect">Create Project</a>
        <a href="{{url('knitter/project-library')}}" class="btn btn-default tablike-bt-outlined waves-effect">Project library</a>
        <!--a href="#!" class="btn btn-default tablike-bt-outlined waves-effect">Notes</!--a>
           <a href="#!" class="btn btn-default tablike-bt-fill waves-effect">Progress</a> -->
     </div>
  </div>
  <div class="row m-t-30">
     <!--Not Started Starts here-->
     <div class="col-lg-3 col-xl-3">
        <!-- Draggable Without Images card start -->
        <h5 class="card-header-text m-b-20 text-muted">Available Patterns</h5>
        <div class="card-block">
           <div class="row">
            @if($orders->count() > 0)
              <ul >
@foreach($orders as $ord)
<li>
  <div class="col-md-12 m-b-20">
      <div class="card-sub-custom">
          <div class="card-block">
              <div class="row">
             <div class="col-lg-4"><img class="img-fluid" src="{{ $ord->image_medium }}" style="height: 100px;" alt="round-img"></div>
             <div class="col-lg-8"><h6 class="card-title">{{ucfirst($ord->product_name)}}</h6>     
      </div>
          </div>
              </div>
              <div class="card-footer-custom">
                  <div class="dropdown-secondary dropdown text-right">
                      <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">{{date('d M,Y',strtotime($ord->created_at))}}</span></span>
                   <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                   <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                       <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                       <a class="dropdown-item waves-light waves-effect note" href="#!" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight" >Add To archive</a>
                       
                   </div>
                   <!-- end of dropdown menu -->
               </div>
           </div>
      </div>
  </div>
</li>
@endforeach
              </ul>
              @else
          <p>No available orders</p>
              @endif
           </div>
        </div>
        <!-- Draggable Without Images card end -->
     </div>
     <!--Not Started Ends here-->
     <!--In Progress Starts Here-->
     <div class="col-lg-3 col-xl-3">
        <!-- Draggable Without Images card start -->
        <h5 class="card-header-text m-b-20 text-muted">Generated Patterns</h5>
        <div class="card-block">
           <div class="row">
            @if($generatedpatterns->count() > 0)
              <ul  id="sortable2" class='droptrue'>
                @foreach($generatedpatterns as $gp)
                 <li class="" id="generatedpatterns">
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ $gp->image_medium }}" style="height: 100px;" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">{{ucfirst($gp->product_name)}}</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">{{date('d M, Y',strtotime($gp->updated_at))}}</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight" href="#!">Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 @endforeach
              </ul>
              @else
              <p>No Generated patterns</p>
              @endif
           </div>
        </div>
        <!-- Draggable Without Images card end -->
     </div>
     <!--In Progress Ends here-->
     <!--Completed Starts here-->
     <div class="col-lg-3 col-xl-3">
        <!-- Draggable Without Images card start -->
        <h5 class="card-header-text m-b-20 text-muted">Work in Progress</h5>
        <div class="card-block">
           <div class="row">
              @if($workinprogress->count() > 0)
              <ul  id="sortable3" class='droptrue'>
                @foreach($workinprogress as $wp)
                 <li class="" id="workinprogress">
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ $wp->image_medium }}" style="height: 100px;" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">{{ucfirst($wp->product_name)}}</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">{{date('d M, Y',strtotime($wp->updated_at))}}</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight" href="#!">Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 @endforeach
              </ul>
              @else
              <p>No work in progress projects</p>
              @endif
           </div>
        </div>
        <!-- Draggable Without Images card end -->
     </div>
     <!--Completed Ends here-->
     <!--Completed Starts here-->
     <div class="col-lg-3 col-xl-3">
        <!-- Draggable Without Images card start -->
        <h5 class="card-header-text m-b-20 text-muted">Completed</h5>
        <div class="card-block">
           <div class="row">
              @if($completed->count() > 0)
              <ul  id="sortable4" class='droptrue'>
                @foreach($completed as $com)
                 <li class="" id="completed">
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ $com->image_medium }}" style="height: 100px;" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">{{ucfirst($com->product_name)}}</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">{{date('d M, Y',strtotime($com->updated_at))}}</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight" href="#!">Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 @endforeach
              </ul>
              @else
              <p>No completed projects</p>
              @endif
           </div>
        </div>
        <!-- Draggable Without Images card end -->
     </div>
     <!--Completed Ends here-->
  </div>
</div>
<!-- Page-body end -->
        </div>
     </div>
  </div>
</div>
<!-- Main-body end -->
</div>
@endsection
@section('footerscript')
<style type="text/css">
  .hide{
    display: none;
  }

</style>
<script type="text/javascript">
  var URL = '{{url("/")}}';
</script>
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/pages/notification/notification.css') }}">
   <!-- Animate.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/animate.css/css/animate.css') }}">
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js')}}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/sortable-custom.js') }}"></script>
<!-- notification js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/bootstrap-growl.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/pages/notification/notification.js') }}"></script>

<script type="text/javascript">
	$(function(){

	});
</script>
@endsection
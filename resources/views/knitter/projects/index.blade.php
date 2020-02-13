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
        <h5 class="theme-heading"><a href="Create-Project.html"><i class="fa fa-home theme-heading m-r-10"></i></a>Project Library </h5>
     </div>
     <div class="col-xl-8 text-right tabber">
        <a href="Create-Project.html" class="btn btn-theme tablike-bt-fill waves-effect">Create Project</a>
        <a href="My-Archive.html" class="btn btn-default tablike-bt-outlined waves-effect">My Archive</a>
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
              <ul >
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/The Boyfriend Sweater.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Child’s Mock Cable Sweater</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" href="#!" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight" >Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Off the Shoulder Ruffle Top</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" href="#!" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight">Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 
                
              </ul>
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
              <ul  id="sortable2" class='droptrue'>
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Marsha's Lacy Tee</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
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
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Off the Shoulder Ruffle Top</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
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
              </ul>
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
              <ul  id="sortable3" class='droptrue'>
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Off the Shoulder Ruffle Top</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
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
              </ul>
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
              <ul  id="sortable4" class='droptrue'>
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Marsha's Lacy Tee</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
                                <button class="btn-vert-toggle text-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></button>
                                <div class="dropdown-menu notifications" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   <a class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#myModal"> Post on the wall</a>
                                   <a class="dropdown-item waves-light waves-effect" href="#!" data-type="success" data-from="top" data-animation-in="animated fadeInRight" data-animation-out="animated fadeOutRight">Add To Archive</a>
                                   <!-- <a class="dropdown-item waves-light waves-effect" href="#!"> Delete</a> -->
                                </div>
                                <!-- end of dropdown menu -->
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li>
                    <div class="col-md-12 m-b-20">
                       <div class="card-sub-custom">
                          <div class="card-block">
                             <div class="row">
                                <div class="col-lg-4"><img class="img-fluid" src="{{ asset('resources/assets/files/assets/images/user-card/2.jpg') }}" alt="round-img"></div>
                                <div class="col-lg-8">
                                   <h6 class="card-title">Peekaboo</h6>
                                </div>
                             </div>
                          </div>
                          <div class="card-footer-custom">
                             <div class="dropdown-secondary dropdown text-right">
                                <span class="m-r-60"><i class="fa fa-calendar-check-o text-muted m-r-10 f-12"></i><span class="text-muted f-12">09 June, 19</span></span>
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
              </ul>
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
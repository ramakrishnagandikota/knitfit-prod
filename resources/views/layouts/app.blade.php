<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>KnitFit | @yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="Phoenixcoded" />
      <!-- Favicon icon -->
  <script src="{{ asset('public/js/app.js') }}" defer></script>
      <link rel="icon" href="{{ asset('resources/assets/files/assets/images/favicon.ico') }}" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/bootstrap/css/bootstrap.min.css') }}">
      <!-- waves.css -->
      <link rel="stylesheet" href="{{ asset('resources/assets/files/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all"><!-- feather icon --> 
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/feather/css/feather.css') }}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/themify-icons/themify-icons.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/icofont/css/icofont.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/pages.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
</head>
<body themebg-pattern="theme1" id="app">

<div class="loading">
  <div class="loader"></div>
</div>
  
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <section class="login-block">
	
	        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
             @yield('content')
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
    </section>
	



 <style type="text/css">
   .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #bc7c8f;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: fixed;
    margin: auto;
    top: 150px;
left: 0px !important;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loading{
    display: none;
      background: #00000085;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    padding: 0px;
  
}

/* sweet alert customizes css */
  .swal2-icon.swal2-success [class^=swal2-success-line]{
	  background-color: #0d665c !important;
  }
  .swal2-icon.swal2-success .swal2-success-ring{
	  border:.25em solid rgb(13, 102, 92)
  }
  .swal2-styled.swal2-confirm {
    
    background-color: #0d665c !important;
    color: #fff !important;
    border: 1px solid #0d665c !important;
  }
  .swal2-icon.swal2-error [class^=swal2-x-mark-line]{
	  background-color: #bc7c8f !important;
  }
  .swal2-icon.swal2-error {
    border-color: #bc7c8f !important;
    color: #bc7c8f !important;
}
.swal2-styled.swal2-cancel {
    background-color: #bc7c8f !important;
}
.swal2-icon.swal2-warning {
    border-color: #bc7c8f !important;
    color: #bc7c8f !important;
}
.alert-success {
    background-color: #fff;
    border-color: #0d665c;
    color: #0d665c;
}
.alert-danger {
    background-color: #fff;
    border-color: #bc7c8f;
    color: #bc7c8f;
}
.theme-logo {
    width: 150px !important;
}
 </style> 

	<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- waves js -->
<script src="{{ asset('resources/assets/files/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/common-pages.js') }}"></script>
<script type="text/javascript" src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>

@yield('footersection')

</body>
</html>

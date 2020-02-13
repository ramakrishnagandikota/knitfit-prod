<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('resources/assets/assets/images/favicon/1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('resources/assets/assets/images/favicon/1.png')}}" type="image/x-icon">
    <title>Knitfit - @yield('title')</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/fontawesome.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/themify-icons.css') }}">

    <!-- font-awsome icons -->
    <script src="https://kit.fontawesome.com/c32d1c5686.js" crossorigin="anonymous"></script>

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/color17.css') }}" media="screen" id="color">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/assets/css/left-menu.css') }}">
</head>

<body onload="getCart()">

    <div class="loading">
  <div class="loader"></div>
</div>

<!-- header start -->
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li><span style="font-size:26px;cursor:pointer" onclick="openNav()">&#9776;</span></li>
                            <li>Welcome to Our store Knitfit</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us:  123 - 456 - 7890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                            <li  class="onhover-div mobile-cart">
                                    <div><a href="cart.html">
                                        <i class="ti-shopping-cart"></i></a></div>
                                    <ul class="show-div shopping-cart" id="cart-div">
                                       
                                    </ul>
                                </li>
                        <li class="mobile-wishlist"><a href="my-whislist.html"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                        @auth
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->first_name}}
                            <ul class="onhover-show-div">
                                <!-- <li>
                                    <a href="#" data-lng="en">
                                        Login
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{url('logout')}}" data-lng="es">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                            <li><a href="{{url('login')}}" style="color: #999;">Login</a></li>
                            <li><a href="{{url('register')}}" style="color: #999;">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>

<div class="row main-leftbox">
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div id="sidebar">
    <div class="row right-menubar">
    <div class="col-lg-6 col-6">
        <figure class="no-bg"><a href="Timeline.html"> 
            <img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/Projects.png') }}" /></a>
            <figcaption class="text-muted text-center">Project Library</figcaption>
        </figure>
    </div>
    <div class="col-lg-6 col-6">
        <figure class="no-bg"> <a href="../../KnitfitEcommerce/front-end/shop-patterns.html">
            <img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/Shop-Design.png') }}" /></a>
            <figcaption class="text-muted text-center">Shop</figcaption>
        </figure>
    </div>
    </div>
    <div class="row right-menubar">
            <div class="col-lg-6 col-6"> 
                <figure class="no-bg"><a href="KnitFit-wall.html">
                    <img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/Timeline.png') }}" /></a>
                    <figcaption class="text-muted text-center">Connect</figcaption>
                </figure>
            </div>
            <div class="col-lg-6 col-6"><figure  class="no-bg"> <a href="Measurement.html"><img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/Measurement.png') }}" /></a><figcaption class="text-muted text-center ">Measurement</figcaption></figure></div>
    </div>
    <div class="row right-menubar">
            <div class="col-lg-6 col-6"> <a href="FriendsSearchResult.html"> <figure class="no-bg"><img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/Friends.png') }}" /></a><figcaption class="text-muted text-center">Friends</figcaption></figure></div>
            <!-- <li><a href="#"><img class="icon-img" src="../../files/assets/icon/custom-icon/Library.png" /></a><div class="text-muted text-center">Library</div></li> -->
            <div class="col-lg-6 col-6"> <a href="user-profile.html"><figure class="no-bg"><img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/My-Profile.png') }}" /></a><figcaption class="text-muted text-center ">My Profile</figcaption></figure></div>
    </div>
    <div class="row right-menubar">
            <div class="col-lg-6 col-6"> <a href="todo.html"> <figure class="no-bg"><img class="icon-img" src="{{asset('resources/assets/files/assets/icon/custom-icon/To-do.png') }}" /></a><figcaption class="text-muted text-center ">To-Do</figcaption></figure></div>
            <!-- <li><a href="#"> <img class="icon-img" src="../../files/assets/icon/custom-icon/My-Order.png" /></a><div class="text-muted text-center ">My Order</div></li> -->
            <!-- <li><a href="#"> <img class="icon-img" src="../../files/assets/icon/custom-icon/Shop-Design.png" /></a><div class="text-muted text-center ">Sample</div></li> -->
     </div>
</div>
</div>
</div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                      
                        <div class="brand-logo">
                            <a href="#"> <img src="{{ asset('resources/assets/assets/images/icon/logo.png') }}" class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                </div>
                                <!-- Horizontal menu -->
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li>
                                        <a href="{{url('/')}}">Home</a>
                                        
                                    </li>
                                    
                                    <li class="active"><a href="{{url('shop-patterns')}}">Shop Patterns</a></li>
                                    <li><a href="{{url('shop-yarns')}}">Shop Yarns</a></li>
                                    
                                    <li>
                                        <a href="{{url('blog')}}">blog</a>
                                        
                                    </li>
                                    @if(Auth::check())
                                    <li><a href="#">Account</a>
                                        <ul>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">wishlist</a></li>
                                            <li><a href="#">cart</a></li>
                                            <li><a href="#">forget password</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

@yield('section1')

<!-- footer start -->
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="form-inline subscribe-form auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                            </div>
                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4></div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ asset('resources/assets/assets/images/icon/logo.png') }}" alt=""></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <!-- <div class="footer-title">
                            <h4>my account</h4></div> -->
                        <div class="footer-contant">
                            <ul>
                                <li><a href="shop-patterns.html">Shop Patterns</a></li>
                                <li><a href="#">Shop Yarns</a></li>
                                <li><a href="blog-list.html">User Guide</a></li>
                                <!-- <li><a href="#">accessories</a></li>
                                <li><a href="#">featured</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <!-- <div class="footer-title">
                            <h4>why we choose</h4></div> -->
                        <div class="footer-contant">
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="privacy.html">Privacy & Terms</a></li>
                                <li><a href="my-whislist.html">Wishlist</a></li>
                                <!-- <li><a href="#">affiliates</a></li>
                                <li><a href="#">contacts</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <!-- <div class="footer-title">
                            <h4>store information</h4></div> -->
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i> Demo Store, Demo store India 345-659</li>
                                <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                <li><i class="fa fa-envelope-o"></i>Email Us: Support@Fiot.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2018-19 Plural Technology</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="../assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->






<!-- tap to top start -->
<div class="tap-top">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>
<!-- tap to top end -->

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
    z-index: 10000;
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
 </style> 

<!-- latest jquery-->
<script src="{{ asset('resources/assets/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('resources/assets/assets/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('resources/assets/assets/js/lazysizes.min.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('resources/assets/assets/js/popper.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('resources/assets/assets/js/slick.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('resources/assets/assets/js/bootstrap.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('resources/assets/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('resources/assets/assets/js/script.js') }}"></script>

<script>

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }

    function openNav() {
          document.getElementById("mySidenav").style.width = "320px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }

    function getCart(){
        $("#cart-div").load('{{ url("load-cart") }}');
    }

    $(document).on('click','.remove-item',function(){
        if(confirm('Are you sure want to remove item from cart ?')){
            var id = $(this).attr('data-id');
        $.get('{{url("remove-item")}}/'+id,function(res){
    getCart();
    if(document.title == 'Knitfit - Checkout'){
        window.location.assign('{{url("shop-patterns")}}')
    }
    addProductCartOrWishlist('fa-check','Success','Product Successfully removed from cart');
        });
        }
    });
</script>
@yield('footerscript')
</body>

</html>
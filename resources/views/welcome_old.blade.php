<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="author" content="">
  <title>Knitfit</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/bootstrap/css/bootstrap.min.css') }}">

  <link href="{{ asset('resources/assets/newdesign/css/all.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('resources/assets/newdesign/css/simple-line-icons.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
  <!-- <link rel="stylesheet" href="device-mockups/device-mockups.min.css"> -->
  <link href="https://knitfitco.com/resources/assets/newdesign/css/new-age.css" rel="stylesheet">
  <!-- Favicons -->
 
    <link rel="icon" href="{{ asset('resources/assets/files/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('resources/assets/newdesign/css/all.css') }}" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <script src="https://use.fontawesome.com/99ba050946.js"></script>
    
    <style>
    .button-3{
               color: #fff;
    width: 100%;
    border: none;
    font-size: 16px;
    font-weight: bold;
    padding: 3px 3px;
    background: #073b3a;
    border-radius: 3px;
    }
    
    .button-3:hover:hover {
    background-color: #cc8b86 ;
    border: 1px solid #cc8b86 ;
     padding: 3px 3px;
    color: #fff !important;
}
    </style>
    </head>
    <body >      
         <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <img src="{{ asset('resources/assets/newdesign/img/KF-logo-h-wht.png')}}" alt="homepage" style="width:110px" class="light-logo" /></a>
      <!-- <img src="https://knitfitco.com/resources/assets/connect/assets/images/logo_new.png" href="#page-top" class="js-scroll-trigger" width="110px"> -->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         <!-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="javascript:;">Download Free</a>
          </li> -->
         <!-- <li class="nav-item"></li>-->
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#" id="contactus">Shop Designs</a>
          </li>
         <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Subscribe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">User Guide</a>
          </li>
          @if(Auth::check())
          @if(Auth::user()->hasRole('Knitter'))
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('knitter/dashboard')}}">Dashboard</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('designer/dashboard')}}">Dashboard</a>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('logout')}}">Logout</a>
          </li>

          @else
			    <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('login')}}">LogIn</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('register')}}">Sign Up</a>
          </li>
          @endif
           <li class="nav-item"></li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5 text-center">Connect with knitters <span><br></span> everywhere and generate patterns that fit you perfectly</h1>
            <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-outline btn-xl js-scroll-trigger">Sign up for More Information</a>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="device-container">
            <div class="device-mockup iphone6_plus portrait white">
              <div class="">
                <div class="screen">
                  <img src="{{ asset('resources/assets/newdesign/img/Mobile.png') }}" class="img-fluid" alt="">
                </div>
                <div class="button">
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="features" id="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 my-auto">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="feature-item align_left">
                  <img src="{{ asset('resources/assets/newdesign/img/img_connected.png') }}" class="img-fluid">
                  <h3>Stay connected</h3>
                  <p class="f-s" >Share project updates or check patterns from your phone</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="feature-item align_left">
                  <img src="{{ asset('resources/assets/newdesign/img/img_sizing.png') }}" class="img-fluid">
                  <h3>Inclusive sizing</h3>
                  <p class="f-s">Generate pattern in ANY size, and get personalized instruction for modification</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="feature-item align_left">
                  <img src="{{ asset('resources/assets/newdesign/img/img_steam.png') }}" class="img-fluid">
                  <h3>Stream-lined</h3>
                  <p class="f-s">Intuitive, with smart, easy-to-use features to help you master your craft
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="cta-content">
      <div class="container">
       <img src="{{ asset('resources/assets/newdesign/img/img_lady.png') }}" class="img-fluid">
       <h1 class="headlines" style="color: #03655b;">Each one of us is unique. Our handknits should be too. </h1>
      </div>
    </div>
  </section>

  <section class="knitfit-features" id="knitfit-features">
    <div class="container">
      <div class="section-heading text-center">
        <h1 class="headlines">FEATURES</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 my-auto">
          <div class="container">
            <div class="row m-t-50">
              <div class="col-lg-6">
                <div class="">
                  <h3 class="sub-heading">Connect with knitters and designers everywhere</h3>
                  <p class="sub-text">Who invented sitting in a circle, munching on snacks, and chatting for hours? Knitters did! Share photos and progress, join knit alongs,
                     chat with friends near and far, or just post endless close-ups of your cat! </p>
                </div>
                <div class="feature-item">
                  <h3 class="sub-heading">Check your patterns on-the-go from your mobile device</h3>
                  <p class="sub-text">You can take your knitting everywhere, and KnitFit App makes patterns 
                    fully mobile optimized so you can navigate them easily on small screens.</p>
                </div>
                <div class="feature-item" style="padding-top: 41px;">
                    <h3 class="sub-heading">Personalized sizing for every single pattern</h3>
                    <p class="sub-text">KnitFit takes the measurements you put into it and uses equations developed by an actual
                       knitting-math magician to generate a custom pattern for your unique shape. Let's do the math on this: technology + body positivity = loving ourselves better.
                      </p>
                  </div>
                  <div class="feature-item">
                      <h3 class="sub-heading">Skip the modifications math and get knitting</h3>
                      <p class="sub-text" style="padding-bottom: 8px;">No one loves knitting math more than we do, but sometimes knitters just want to knit. Store your measurements and those of others, save your favorite modifications and add them to any pattern, and cast on with confidence!</p>
                  </div>
                  <div class="feature-item">
                      <h3 class="sub-heading">Curated, high-quality pattern library</h3>
                      <p class="sub-text">Knitting a garment can take months, so trusting that you have a top quality, well written, and easily accessible pattern by your side makes all the difference during the journey. 
                       </p>
                  </div>
              </div>
              <div class="col-lg-6">
                <div class="">
                  <h3 class="sub-heading">Time-saving features for designers at every level</h3>
                  <p class="sub-text">Free up more time to spend on the creative aspects of designing, eliminating the math
                     gymnastics and endless spreadsheet gazing so you can get to the next step! <a href="{{url('register')}}" style="font-weight: bold;text-decoration: underline;"> Sign up here.</a></p>
                </div>
                <div class="feature-item">
                    <h3 class="sub-heading">Yarn substitution options empower knitting for different climates
                     </h3>
                    <p class="sub-text">KnitFit empowers yarn substitution for climate or body temperature—it makes the necessary
                       calculations based on your gauge swatch and fiber choice, integrating it into your pattern.
                    </p>
                  </div>
                  <div class="feature-item">
                      <h3 class="sub-heading">New features coming soon: </h3>
                      <p class="sub-text">We’re building KnitFit like a sweater—loop by loop...by loop...by loop. Here are some of our upcoming loops:
                      </p>
                        <li>-Tools to help users easily list and sell items from their stash </li>
                        <li>-Tutorials for complicated or little known techniques </li>
                        <li>-Infrastructure for advanced knitters to offer paid classes through KnitFit</li>
                        <li>-Support for LYS, yarn companies, indie dyers, and knitting tool suppliers to offer yarn directly through the app </li>
                        <li>-Private groups </li>
                        <li>-Direct messaging </li>
                        <li>-Advanced search functionality</li><br>
                      <p class="sub-text">Do you have ideas of features you would love to see? <a href="javascript:;" data-toggle="modal" data-target="#large-Modal" style="font-weight: bold;text-decoration: underline;">Let us know here. </a></p>
                    </div>
                    <div class="feature-item">
                        <h3 class="sub-heading">Are you a yarn company, indie dyer, or LYS?
                         </h3>
                        <p class="sub-text">We’ll soon be adding unique opportunities for yarn companies, indie dyers, LYS, and other fiber 
                          brands to connect with customers through KnitFit, so join our <a href="#contact" style="font-weight: bold;text-decoration: underline;"> mailing list </a> to stay in the loop! 
                        </p>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
    <section>
      <div class="container">
        <div class="section-heading text-center">
           <h1 class="headlines_h1">Ready to knit for a perfect fit?</h1>
           <h1 class="headlines-getapp">Get the app (it's free)</h1>
           <button id="download_app" data-toggle="modal" data-target="#myModal">Sign up for More Information</button>
        </div>
      </div>
    </section>

    <section class="cta">
        <div class="cta-content">
          <div class="container">
           <img src="{{ asset('resources/assets/newdesign/img/img_handed.png') }}" class="img-fluid">
          </div>
        </div>
    </section>

    <section class="knitfit-use">
        <div class="container">
          <div class="section-heading text-center">
            <h1 class="headlines">KnitFit is easy to use:</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 my-auto">
              <div class="container">
                <div class="row m-t-50">
                  <div class="col-lg-6 center_div">
                    <p class="title_use headings">First, <span style="color:#cc8b86">get the app.</span> Next, <br> shop for a pattern</p>
                  </div>
                  <div class="col-lg-6 text-center">
                    <img src="{{ asset('resources/assets/newdesign/img/img_m.png') }}" class="img-fluid" style="width:250px">
                  </div>
                  <div class="col-lg-6 m-t-60 center_div">
                    <p class="title_use headings">Add your body <br> measurements</p>
                  </div>
                  <div class="col-lg-6 text-center m-t-60">
                    <img src="{{ asset('resources/assets/newdesign/img/screen_one.png') }}" class="img-fluid" style="width:250px;">
                  </div>
                  <div class="col-lg-6 m-t-60 center_div">
                      <p class="title_use headings">Knit a gauge <br> swatch</p>
                  </div>
                  <div class="col-lg-6 text-center m-t-60">
                      <img src="{{ asset('resources/assets/newdesign/img/img_hand.png') }}" class="img-fluid" style="height: 315px;width: 300px;">
                  </div>
                  <div class="col-lg-6 m-t-60 center_div">
                      <p class="title_use headings">Generate your <br> personalized pattern</p>
                  </div>
                  <div class="col-lg-6 text-center m-t-60">
                      <img src="{{ asset('resources/assets/newdesign/img/img_m1.png') }}" class="img-fluid" style="width: 250px;">
                  </div>
                  <div class="col-lg-6 m-t-60">
                      <p class="title_use text-center headings">Knit it up, and share every step <br> with the KnitFit community!</p>
                      <h3 class="sub-heading text-center" style="padding-top:30px">Ready to join the community?</h3>
                      <div class="text-center"> <button id="download_app_c" data-toggle="modal" data-target="#myModal">Sign up for More Information</button></div>
                      <p style="color:#000;text-align: center;margin-top: -40px;">CLICK TO GET STARTED</p>
                    </div>
                  <div class="col-lg-6 text-center m-t-60">
                      <img src="{{ asset('resources/assets/newdesign/img/img_girl.png') }}" class="img-fluid" style="height: 415px; width: 450px;" >
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
    </section>
  <br>
  <section class="contact bg-primary" id="contact">
    <div class="container">
      <h2>Join our newsletter and<br> get a free pattern!</h2>
       <form autocomplete="off" id="notify-us">
        @csrf
            <input type="email" name="email" id="email"  />
            <p>Enter Your Email Address</p>
            <p class="email_errors1"></p>
      <button type="submit" id="sign_up" class="notify">Sign Up</button>
      </form>
    </div>
  </section>

  <section class="cta">
      <div class="cta-content">
        <div class="container">
         <img src="{{ asset('resources/assets/newdesign/img/img_watch.png') }}" class="img-fluid">
         <h1 class="headlines_c">Knitted garments should be beautiful AND entertaining to knit!</h1>
        </div>
      </div>
  </section>

  <section class="pattern">
      <div class="container">
        <div class="section-heading text-center">
          <h1>Patterns</h1>
        </div>
        <div class="row">
          <div class="col-lg-12 my-auto">
            <div class="container">
              <div class="row m-t-50">
                <div class="col-lg-3 text-center">
                      <img src="{{ asset('resources/assets/newdesign/img/lady_one.png') }}" class="img-fluid" >
                </div>
                <div class="col-lg-3 text-center">
                  <img src="{{ asset('resources/assets/newdesign/img/lady_two.png') }}" class="img-fluid" >
                </div>
                <div class="col-lg-3 text-center">
                    <img src="{{ asset('resources/assets/newdesign/img/lady_three.png') }}" class="img-fluid" >
                </div>
                <div class="col-lg-3 text-center">
                      <img src="{{ asset('resources/assets/newdesign/img/lady_four.png') }}" class="img-fluid" >
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="more_text">
      <div class="">
        <div class="container">
         <h1>Curated, high-quality pattern library</h1>
         <p>We offer a wide range of diverse, unique, and beautiful styles that we feel
            our knitting community will find interesting and entertaining to knit. Knitting a garment can
             take months, so trusting that you have a top quality, well written, and easily accessible
              pattern by your side makes all the difference during the journey. </p>
          <p>KnitFit only accepts patterns from designers if they have clear, concise,
                 unambiguous directions, and all patterns are professionally edited and reviewed. </p>
          <p>Are you a designer looking for another place to put your patterns in front of knitters?
            <a href="{{url('login') }}" class="span_c ">Join the app!</a>
          </p>
        </div>
      </div>
  </section>

  
  
  <section class="cta">
    <div class="cta-content">
      <div class="container">
       <img src="{{ asset('resources/assets/newdesign/img/pic.png') }}" class="img-fluid">
       <h1 class="headlines" style="color: #03655b;">Every pattern should come in all shapes and sizes: <br> just like we do.</h1>
      </div>
    </div>
  </section>
  
   <section class="pattern">
      <div class="container">
        <div class="section-heading text-center">
          <h1>The KnitFit Story</h1>
          <h3 class="sub-heading">The creator of KnitFit did not start out as a knitting-math magician...</h3>
         
        </div>
         <p class="m-t-30" style="margin-left: 17px;">Jane didn’t even swatch for her first sweater (“It was intended for my husband. However, it fit Uncle Peter, who is 6’6”).</p>
        <div class="row">
          <div class="col-lg-12 my-auto">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 ">
                       <p class="sub-heading headings" style="line-height:1">Her creative and technical sides have always been <br> separate, waiting to blend into a sole pursuit.</p>
                       <p >Jane spent 20 years in the Computer Aided Engineering industry, keeping crafting compartmentalized from the tech side of her brain. But after a cross-country move, knitting became a way to connect with older women in her husband’s family.</p>
                       <p >When a designer friend aided her deep dive into calculating modifications and mastering pattern-math, she began to see the power of blending creativity and technical thinking.</p>
                       <p class="sub-heading headings">In 2007, she opened an LYS: Needle in a Haystack.</p>
                        <p class="m-t-30">The many insights gained from running an LYS led to so many ideas. Customers spent weeks or months knitting sweaters in beloved yarns, often only to have them fit poorly.</p>
                      
                      <p class="sub-heading headings" style="line-height:1">She realized then that knitting-math could be <br> automated--in an app!</p>
                        <p >Between her own tech background and her husband Dana’s, the skills were there to make it a reality. She began work on the KnitFit app, and suddenly more and more possibilities began to open up.</p>
                      <p >She began adding features to allow it to be a place for all knitters to feel welcome. Jane’s dream is for KnitFit to allow knitters to get a perfect fit not just in the garments they knit.</p>
                      
                </div>
                <div class="col-lg-4 text-center">
                  <img src="{{ asset('resources/assets/newdesign/img/sJane.png') }}" class="img-fluid" >
                </div>
               
            </div>
          </div>
        </div>
      </div>
  </section>

  <section class="contact m-t-30 primaryc" >
    <div class="container">
      <h2>“For me, the biggest validation of the effort of creating KnitFit is when a <br>knitter finishes a custom pattern and sees the results. They are <br>universally excited about their sweater.”</h2>
      <p style="color:#03655b">-JANE NICKERSON, Creator of KnitFit</p>
    </div>
  </section>

    <section class="contact " >
    <div class="container">
      <h2 class="cblack">Join our newsletter and<br> get a free pattern!</h2>
      <p class="cblack">You’ll be the first to know about our new features</p>
       <form autocomplete="off" id="notify-us1">
        @csrf
            <input type="email" name="email" id="email1"  />
            <p>Enter Your Email Address</p>
                    <p class="email_errors1"></p>
      <!--<p>Enter Your Email Address</p>-->
        
      <!--<button id="sign_up">Sign Up</button>-->
      <button type="submit" id="sign_up1" class="notify">Sign Up</button>
      </form>
    </div>
  </section>
  
  <section class="footer" >
      <div class="container text-center">
       <h2>
           <a href="{{url('shop-patterns')}}" class="span_o cta_text">Sign in <br> to shop patterns!</a>
               </h2>
      </div>
  </section>
  
  <section class="footer_two m-t-30" style="background:#f7ece1"  >
    <div class="container-fluid">
       <img src="{{ asset('resources/assets/newdesign/img/logo_new.png')}}" alt="homepage" style="width:140px" class="light-logo" />
       <h3 class=" m-t-30">Join our inclusive knitting community on social media:</h3>
       
       <ul style="list-style-type:none;margin-left: -38px;margin-top: 10px; display:inline-flex;    ">
        <li class="icoli">  <a href="https://www.facebook.com/knitfitco" target="_blank"><i class="fab fa-facebook-f ico"></i> </a> </li>
       <!--  <li class="icoli">  <a href="#" ><i class="fab fa-facebook-f ico"></i> </a> </li>
         <li class="icoli">  <a href="#" ><i class="fab fa-facebook-f ico"></i> </a> </li> -->
        
        
       </ul>  <br>
       
       <!--<button class="btn newbtn">Download the app</button>-->
       
       <ul style="list-style-type:none;margin-left: -38px;margin-top: 10px;">
        @auth
          <li><a href="{{url('logout')}}">Log Out</a></li>
        @else
          <li><a href="{{url('login')}}">Login</a></li>
        @endauth
                <li><a href="#contact">Subscribe to the newsletter</a></li>
        <li><a href="https://mailchi.mp/47dbb648b99d/about-knitfit" target="_blank">About</a></li>
        <li><a href="#">User Guide</a></li>
        <li><a href="javascript:;" data-toggle="modal" data-target="#large-Modal">Contact</a></li>
        <li><a href="#">FAQs</a></li>
       </ul>  
       
       <h4>Designers</h4>
       <p><a href="https://mailchi.mp/cbd5373a14f7/designers-signup" target="_blank">How to submit patterns</a></p>
       
       <p> <a href="#">STATEMENT OF PRIVACY AND TERMS </a></p>
  </section>
  
  <!----- contact ----->
  
  <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                     <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                             <div class="modal-header" style="text-align:center">
                                 <h4 class="modal-title">Contact Us</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p id="success"></p>
                                            <form  class="form-js" id="contact-us" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                   <div class="col-md-12">
                                                        <div class="form-group">
                                                        <input class="form-control" type="text" name="name"  placeholder="Please enter your Name *" id="name">
                                                        <span class="name_errors"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Please enter your email *" 
                                                            id="emailcont">
                                                            <span class="email_errors"></span>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input  type="text" name="subject" class="form-control" placeholder="Subject *" id="subject">
                                                             <span class="subject_errors"></span>
                                                        </div>
                                                    </div>  
                                                </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                            <textarea class="form-control" placeholder="Message *" rows="5" name="message" id="messages"></textarea>
                                            <span class="message_errors"></span>
                                            </div>
                                            </div>
                                           </div>
                                        
                                        <div class="row">
                                        <div class="col-md-12 text-right m-r-20">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light submit-button">Send Message</button>
                                        </div>
                                        </div>
                                        </form>
                             </div>
                            
                         </div>
                     </div>
                 </div>
               
            </div>
              </div>
              
  
  <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off" id="notify-us">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email id here" />
                    <span class="email_errors1"></span>
                    </div>
                </div>
                <input type="hidden" name="_token" value="eHMy1nbUF7cFogsmHhBUGEPnHZaDraOuhLFVLNJk">
            </div>
        </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="notify">Subscribe</button>
      </div>
    </div>
  </div>
</div>-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <img src="{{ asset('resources/assets/newdesign/img/logo_new.png')}}" width="110px">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
       <h4 style="text-align:center;font-size: 22px; line-height: 40px;color:#000; font-weight:bold">Sign up for More Information</h4>
       <p style="text-align:center;margin-bottom:20px;    color: #5c5c5c;">Enter your email to get announcements about the app and new features</p>
        <div class="comment-form">
           
                <form class="form-js" id="downloadform">
                    <div class="row">
                        <div class="col-md-8">
                            
                        @csrf
                            <div class="form-input">
                                <i class="fa fa-envelope" style="position: absolute;top: 20px;margin-top: -11px;left: 25px;font-size: 13px;"></i>
                                <input name="email" id="download-email" type="email" placeholder="Email" style="    width: 100%;  padding-left: 30px;   margin-bottom: 20px; color: #222;}">
                                <span class="erroremail"></span>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <button type="button" id="download" class="button-3">Submit</button>
                            <div id="notify-success"></div>
                        </div>
                    </div><!-- End row -->
                </form>
            </div><!-- End comment-form -->
      </div>
      
    </div>

  </div>
</div>



</div><!-- End post-content -->
<div class="clearfix"></div>
</div><!-- End blog-content -->
</div>
</div>

<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery/js/jquery.min.js') }}"></script>
  <script src="{{ asset('resources/assets/newdesign/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('resources/assets/newdesign/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('resources/assets/newdesign/js/new-age.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
  <style>
  .validate{
      color: red;
  }
  </style>
  <script>
$(function(){
    var subscribed = localStorage.getItem('status');
    
    if(subscribed != 'yes'){
         setTimeout(function(){
            $(".contactus1").trigger('click');
        },2000); 
    }
    
    $(document).on('click','#contactus,.getapp,.contactus',function(){
        
    //alert()
        var nn = $(this).attr('data-name');
        if(nn == 'Get the App'){
            $("#dn").html('Get the App');
            $("#subjects").val('Get the App');
        }else{
            $("#dn").html('Contact us');
            $("#subjects").val('');
        }
        $("#pop-model").fadeIn();
    });
    
    $(document).on('click','.contactus1',function(){
        $("#pop-model1").fadeIn();
    });
    
    $(document).on('click','#closepop',function(){
        $("#contact-us")[0].reset();
        $("#pop-model").fadeOut();
        $("#contact-success").html('');
    });
    
    /*$(document).on('click','#closepop1',function(){
        $("#notify-us")[0].reset();
        $("#pop-model1").fadeOut();
        $("#notify-success").html('');
    });*/
    
    
    $(document).on('submit','#contact-us',function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $("#emailcont").val();
        var subject = $("#subject").val();
        var message = $("#messages").val();
        ////alert(email)
        var er = [];
        var cnt = 0;
        
    var Data = $("#contact-us").serializeArray();
        
        if(name == ""){
            $(".name_errors").addClass('validate').html('Name field is required');
            er+=cnt+1;
        }else{
            $(".name_errors").html('');
        }
        
        if(email == ""){
            $(".email_errors").addClass('validate').html('Email field is required');
            er+=cnt+1;
        }else{
            $(".email_errors").html('');
        }
        
        if(subject == ""){
            $(".subject_errors").addClass('validate').html('Subject field is required');
            er+=cnt+1;
        }else{
            $(".subject_errors").html('');
        }
        
        if(message == ""){
            $(".message_errors").addClass('validate').html('Message field is required');
            er+=cnt+1;
        }else{
            $(".message_errors").html('');
        }
        
        if(er != 0){
            return false;
        }
        
        $.ajax({
           url : "{{url('contact-us') }}",
           type : 'POST',
           data : Data,
           beforeSend : function(){
            $("#contact-us input,textarea").prop('disabled',true);
               $(".submit-button").append('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 16px;"></i>');
               $(".submit-button").prop('disabled',true);
           },
            success : function(res){
                if(res == 0){
                    Swal.fire(
                  'Great!',
                  'Thankyou for contacting us , we will get in touch with you soon.',
                  'success'
                )
                }else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Unable to contact Admin , Please try again after some time!'
                  })
                }
            },
            complete : function(){
                $(".submit-button").html('Send Message');
                $("#contact-us input,textarea").prop('disabled',false);
                $("#contact-us")[0].reset();
                $('.close').trigger('click');
            }
        });
        
        
        
    });
    
    $(document).on('click','.notify',function(e){
        
        e.preventDefault();
        var id = $(this).attr('id');
        if(id == 'sign_up'){
            var Data = $("#notify-us").serializeArray();
            var email = $("#email").val();
        }else{
            var Data = $("#notify-us1").serializeArray();
            var email = $("#email1").val();
        }
        
        
        var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var er = [];
        var cnt = 0;
        
        if(email == ""){
            $(".email_errors1").addClass('validate').html('Email address is required');
            er+=cnt+1;
        }else if(!pattern.test(email)){
        $(".email_errors1").show().html('Please enter valid email address.');
            er+=cnt+1;
        }else{
            $(".email_errors1").html('');
        }
        
        if(er != 0){
            return false;
        }
        
        //console.log('https://knitfitco.com/notify-us');
        $.ajax({
            url : '{{url("notify-us")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){
              $("#email,#email1").prop('disabled',true);
                $(".notify").append('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 16px;"></i>');
            },
            success : function(res){
                if(res == 0){
                    localStorage.setItem('status','yes');
                Swal.fire(
                  'Great!',
                  'You have subscribed to knitfitco patterns.',
                  'success'
                )
                }else if(res == 2){
                  Swal.fire(
                  'Great!',
                  'You have already subscribed to knitfitco patterns.',
                  'success'
                )
                }else{

                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Unable to subscribe to newsletters , Please try again after some time!'
                  })

                }
            },
            complete : function(){
              $("#email,#email1").val('');
              $("#email,#email1").prop('disabled',false);
              $(".notify").html('Sign Up');
            }
        });
    });
    $(document).on('click','#download',function(e){
        
        e.preventDefault();
        var email = $("#download-email").val();
        var Data = $("#downloadform").serializeArray();
        var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var er = [];
        var cnt = 0;
        
        if(email == ""){
            $(".erroremail").addClass('validate').html('Email address is required');
            er+=cnt+1;
        }else if(!pattern.test(email)){
        $(".erroremail").show().html('Please enter valid email address.');
            er+=cnt+1;
        }else{
            $(".erroremail").html('');
        }
        
        if(er != 0){
            return false;
        }
        
        
        $.ajax({
            url : 'https://knitfitco.com/download-app',
            type : 'POST',
            data : Data,
            beforeSend : function(){
                $("#download").append('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 16px;"></i>');
            },
            success : function(res){
                if(res == 1){
                    localStorage.setItem('status','yes');
                //$("#exampleModal").fadeOut();
                alert('You have subscribed to knitfitco patterns.');
                setTimeout(function(){ location.assign('{{url('shop-patterns')}}'); },1000);
                }
            },
            complete : function(){
                $("#download").html('Subscribe');
            }
        });
    });
    
});

$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) { 
            $('.navbar .navbar-brand img').attr('src','{{ asset('resources/assets/newdesign/img/logo_new.png')}}');
        }
        if ($(this).scrollTop() < 100) { 
            $('.navbar .navbar-brand img').attr('src','{{ asset('resources/assets/newdesign/img/KF-logo-h-wht.png') }}');
        }
    })
});
</script>

    </body>
</html>

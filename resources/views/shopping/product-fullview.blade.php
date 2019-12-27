@extends('layouts.shopping')
@section('title',$pro->name)
@section('section1')
<input type="hidden" id="user_id" value="@if(Auth::check()) {{Auth::user()->id}} @endif">
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                        <h2><a href="{{url('shop-patterns')}}"><i class="fa fa-angle-left m_r f_s" aria-hidden="true"></i></a> </h2> <h2>{{$pro->name}}</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<?php 
$product_images = DB::table('product_images')->where('product_id',$pro->id)->get();

$rating = DB::select(DB::raw("select SUM(rating) as rate from product_comments where product_id = '".$pro->id."' "));
$totrate = DB::table('product_comments')->where('product_id',$pro->id)->count();
if(Auth::check()){
    $wishlist = DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$pro->id)->count();
}

?>

<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product-slick">
                        @foreach($product_images as $pi)
                        <div><img src="{{$pi->imagepath}}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0" style="width: 350px;height: 524px;"></div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                        @foreach($product_images as $pii)
                        <div><img src="{{$pii->image_small}}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                        @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-right product-description-box">
                        <h2>{{$pro->name}}</h2>
                        <div class="rating mb-2">
                            @if($totrate > 0)
                @foreach($rating as $rat) 
                <?php $starNumber = number_format($rat->rate / $totrate,1); ?>
                <?php
                        for($x=1;$x<=$starNumber;$x++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i> &nbsp;';
                        }
                        if (strpos($starNumber,'.0')) {
                           echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
                            $x++; 
                        }else{
                            echo '<i class="fa fa-star-half-o" aria-hidden="true"></i> &nbsp;';
                            $x++;

                        }
                        while ($x<=5) {
                            echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
                            $x++;
                        }
                    ?>
                    &nbsp; 
                @endforeach
                @else
            <?php for($x=1;$x<=5;$x++) {
                echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
                } ?>
                
                @endif
                        </div>
                        <div class="product-icon mb-3">
                            <ul class="product-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fas fa-rss"></i></a></li>
                            </ul>
                                @if(Auth::check())
                                <button class="wishlist-btn wishlist" data-id="{{$pro->id}}"><i class="fa @if($wishlist == 0)fa-heart-o @else fa-heart @endif"></i><span class="title-font">Add To WishList</span></button>
                                @else
                                <button class="wishlist-btn wishlist" data-id="{{$pro->id}}"><i class="fa fa-heart-o"></i><span class="title-font">Add To WishList</span></button>
                                @endif
                        </div>
                        <div class="row product-accordion">
                            <div class="col-sm-12">
                                <div class="accordion theme-accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">product description</button></h5></div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>{!!$pro->short_description!!}</p>
                                                <!-- <div class="single-product-tables detail-section">
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td>Febric:</td>
                                                            <td>Chiffon</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Color:</td>
                                                            <td>Red</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Material:</td>
                                                            <td>Crepe printed</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">details</button></h5></div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                    <ul class="ulli pl-18">
                                                        <li>
                                                        <p><b>Difficulty Level :</b> Easy</p>
                                                        </li>
                                                        <li>
                                                        <p><B>Tools Needed :</B> Needle, Yarn</p>
                                                        </li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">review</button></h5></div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p>no reviews yet</p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-right product-form-box">
                        <h4>@if($pro->special_price) <del>${{$pro->price}}</del><!-- <span>55% off</span> --> @endif</h4>
                        <h3>@if($pro->special_price) ${{$pro->special_price}} @else ${{$pro->price}} @endif</h3>
                        <!-- <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul> -->
                        <div class="product-description border-product">
                            <!-- <h6 class="product-title">Time Reminder</h6>
                            <div class="timer">
                                <p id="demo"><span>25 <span class="padding-l">:</span> <span class="timer-cal">Days</span> </span><span>22 <span class="padding-l">:</span> <span class="timer-cal">Hrs</span> </span><span>13 <span class="padding-l">:</span> <span class="timer-cal">Min</span> </span><span>57 <span class="timer-cal">Sec</span></span>
                                </p>
                            </div> -->
                            <!-- <h6 class="product-title">select size</h6>
                            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body"><img src="../assets/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="size-box">
                                <ul>
                                    <li class="active"><a href="#">s</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">l</a></li>
                                    <li><a href="#">xl</a></li>
                                </ul>
                            </div> -->
                            <!-- <h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div> -->
                        </div>
                        <div class="product-buttons">
                            <form action="{{url('buynow')}}" method="POST">
                            <a href="javascript:;" id="addToCart" data-id="{{$pro->id}}" class="addToCart btn btn-solid">add to cart</a> 
                            
                                @csrf
                                <input type="hidden" name="product_id" value="{{$pro->id}}">
                                <input type="submit" name="submit" value="Buy Now" class="btn btn-solid">
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- product-tab starts -->
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-Description" data-toggle="tab" href="#top-Description" role="tab" aria-selected="true">Description</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-Information" data-toggle="tab" href="#top-Information" role="tab" aria-selected="false">Additional Information</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-Write" data-toggle="tab" href="#top-Write" role="tab" aria-selected="false">Write Review</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Read Review</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-Description" role="tabpanel" aria-labelledby="top-home-Description">
                        {!! $pro->description !!}
                    </div>
                    <div class="tab-pane fade" id="top-Information" role="tabpanel" aria-labelledby="profile-top-Information">
                        {!! $pro->additional_information!!}               
                    </div>
                    <div class="tab-pane fade" id="top-Write" role="tabpanel" aria-labelledby="contact-top-Write">
                        <form class="theme-form" id="product-review">
                           
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <label>Rating</label>
                                       <!-- <div class="media-body ml-3">
                                            <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </div> -->

                                            <div class="smileybox"> 
        <label for="r1" class="check"><input type="checkbox" class="checkbox"  id="r1" onchange="ratingStar(event)"/><i class="em em-weary"></i></label>
        <label for="r2" class="check"><input type="checkbox" class="checkbox" id="r2" onchange="ratingStar(event)"/><i class="em em-worried"></i></label>
        <label for="r3" class="check"><input type="checkbox" class="checkbox" id="r3" onchange="ratingStar(event)"/><i class="em em-blush"></i></label>
        <label for="r4" class="check"><input type="checkbox" class="checkbox" id="r4" onchange="ratingStar(event)"/><i class="em em-smiley"></i></label>
        <label for="r5" class="check"><input type="checkbox" class="checkbox" id="r5" onchange="ratingStar(event)"/><i class="em em-sunglasses"></i></label>  
    </div>
                                    </div>
    <span class="rating hide">Please select ratings</span>
                                </div>
                                <input type="hidden" readonly name="product_id" value="{{$pro->id}}">
                                <input type="hidden" id="rating" name="rating" value="0">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your name" name="name" @if(Auth::check()) value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" readonly @else value="" @endif >
                                    <span class="name hide">Please fill a valid name</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" @if(Auth::check()) value="{{Auth::user()->email}}" readonly @else value="" @endif >
                                    <span class="email hide">Please fill a valid email</span>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="review">Review</label>
                                    <textarea class="form-control" id="comment" placeholder="Wrire Your Testimonial Here" name="comment" rows="6"></textarea>
                                    <span class="comment hide">Please fill a valid comment</span>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid" id="submitComment" type="submit">Submit YOur Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <section class="section-b-space blog-detail-page review-page">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12" id="full-comments">
                                    @include('shopping.product-comments')
                                </div>
                            </div>
                        </section>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->

@endsection
@section('footerscript')

<style type="text/css">
    input[type="checkbox"]{
    width:100%;
    height:100%;
    opacity:0;
    cursor:pointer; 
}
.smileybox label{
    position:relative;
    width: 16px;
    height: 16px;
    display: inline-block;  
}
.check::before, .rated::after{
    content:'\2605';
    font-size:25px;
    position:absolute;
    color:#777;
    left:0;
    bottom:0;
    line-height: 50px;  
}
.rated::after{
    color:orange;
}
.check:hover::before{
    color:orange;
}
.smileybox label i{
    position:absolute;

    font-size:35px;
}
.smileybox label i.em{
    display:none;   
}
.smileybox{
    position: relative;
    top: 19px;
    left: 10px;
}
.error{
    color: red;
}
.hide{
    display: none;
}
.fa-heart{
    color: #bb7c8f;
}
</style>

<script type="text/javascript">
    function ratingStar(event){
    var checkValue = document.querySelectorAll(".smileybox input");
    var checkStar = document.querySelectorAll(".smileybox label");
    var checkSmiley = document.querySelectorAll(".smileybox label i");
    var checkCount = 0;
    for(var i=0; i<checkValue.length; i++){
        if(checkValue[i]==event.target){
            checkCount = i+1;
        }
    }
    for(var j=0; j<checkCount; j++){
        checkValue[j].checked = true;
        checkStar[j].className = "rated";
        checkSmiley[j].style.display = "none";
    }
    
    for(var k=checkCount; k<checkValue.length; k++){
        checkValue[k].checked = false;
        checkStar[k].className = "check"
        checkSmiley[k].style.display = "none";  
    }
    if(checkCount == 1){
        document.querySelectorAll("i")[0].style.display = "block";
        $("#rating").val(1);
    }
    if(checkCount == 2){
        document.querySelectorAll("i")[1].style.display = "block";
        $("#rating").val(2);
    }
    if(checkCount == 3){
        document.querySelectorAll("i")[2].style.display = "block";
        $("#rating").val(3);
    }
    if(checkCount == 4){
        document.querySelectorAll("i")[3].style.display = "block";
        $("#rating").val(4);
    }
    if(checkCount == 5){
        document.querySelectorAll("i")[4].style.display = "block";
        $("#rating").val(5);
    }
}

$(function(){



    $(document).on('submit','#product-review',function(e){
        e.preventDefault();
        var Data = $("#product-review").serializeArray();

        var rating = $("#rating").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var comment = $("#comment").val();
        var er = [];
        var cnt = 0;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if(!name){
            $(".name").removeClass('hide').addClass('error');
            er+=cnt+1;
        }else{
            $(".name").removeClass('error').addClass('hide');
        }

        if(!email || (!emailReg.test(email))){
            $(".email").removeClass('hide').addClass('error');
            er+=cnt+1;
        }else{
            $(".email").removeClass('error').addClass('hide');
        }

        if(rating == 0){
            $(".rating").removeClass('hide').addClass('error');
            er+=cnt+1;
        }else{
            $(".rating").removeClass('error').addClass('hide');
        }

        if(!comment){
            $(".comment").removeClass('hide').addClass('error');
            er+=cnt+1;
        }else{
            $(".comment").removeClass('error').addClass('hide');
        }

        if(er != ""){
            //alert();
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : '{{url("product/add-comment")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){
                $("#product-review").prop('disabled',true).css('opacity','0.4');
            },
            success: function(res){ 
                if(res == 0){
                addProductCartOrWishlist('fa-check','Success','Review posted Successfully.Your Review will appear soon.');
                }else{
                addProductCartOrWishlist('fa-times','Error','Some problem in posting Review , Please try again after some time.');
                }
            },
            complete :  function(){
                $("#product-review")[0].reset();
                setTimeout(function(){
                    $("#product-review").prop('disabled',false).css('opacity','1');
                },2000);
            }
        });
    });



    $(document).on('click','.tup',function(){
        var user_id = $("#user_id").val();
        if(!user_id){
           addProductCartOrWishlist('fa-times','Error','Please Login to vote / Unvote'); 
           return false;
        }
        var cid = $(this).attr('data-id');
        var pid = $(this).attr('data-pid');
        var ccount = $("#up"+cid).html();
        var cadd = parseInt(ccount)+1;
        var cmin = parseInt(ccount)-1;


        if($('#tup'+cid+' i').first().hasClass('fa-thumbs-o-up')){
            $("#up"+cid).html(cadd);
            $('#tup'+cid+' i').first().removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up');
            var vote = 1;
        }else{
            $("#up"+cid).html(cmin);
            $('#tup'+cid+' i').first().removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
            var vote = 0;
        }

        var Data = 'cid='+cid+'&pid='+pid+'&vote='+vote;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : '{{url("product/vote-comment")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){
                $("#product-review").prop('disabled',true).css('opacity','0.4');
            },
            success: function(res){ 
                if(res == 0){
                    if(vote == 1){
            addProductCartOrWishlist('fa-check','Success','You have voted for a comment.');
                    }else{
            addProductCartOrWishlist('fa-check','Success','You have removed your vote for a comment.');
                    }
                
                }else{
                addProductCartOrWishlist('fa-times','Error','Some problem in vote / unvote , Please try again after some time.');
                }
            },
            complete :  function(){
                
            }
        });

    });



    $(document).on('click','.tdown',function(){
        var user_id = $("#user_id").val();
        if(!user_id){
           addProductCartOrWishlist('fa-times','Error','Please Login to vote / Unvote'); 
           return false;
        }
        var cid = $(this).attr('data-id');
        var pid = $(this).attr('data-pid');
        var ccount = $("#down"+cid).html();
        var cadd = parseInt(ccount)+1;
        var cmin = parseInt(ccount)-1;


        if($('#tdown'+cid+' i').first().hasClass('fa-thumbs-o-down')){
            $("#down"+cid).html(cadd);
        $('#tdown'+cid+' i').first().removeClass('fa-thumbs-o-down').addClass('fa-thumbs-down');
            var vote = 1;
        }else{
            $("#down"+cid).html(cmin);
            $('#tdown'+cid+' i').first().removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
            var vote = 0;
        }

        var Data = 'cid='+cid+'&pid='+pid+'&vote='+vote;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : '{{url("product/unvote-comment")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){
                $("#product-review").prop('disabled',true).css('opacity','0.4');
            },
            success: function(res){ 
                if(res == 0){
                    if(vote == 1){
            addProductCartOrWishlist('fa-check','Success','You have unvoted for a comment.');
                    }else{
            addProductCartOrWishlist('fa-check','Success','You have removed your unvote for a comment.');
                    }
                
                }else{
                addProductCartOrWishlist('fa-times','Error','Some problem in vote / unvote , Please try again after some time.');
                }
            },
            complete :  function(){
                
            }
        });

    });
   

       $(document).on('click','.wishlist',function(){
        var id = $(this).attr('data-id');
        var check = $('.wishlist i').first().hasClass('fa-heart-o');

        var is_login = $("#user_id").val();
        if(!is_login){
            addProductCartOrWishlist('fa-times','Error','Please login to add product to wishlist.')
            return false;
        }
        if(check == true){
            $('.wishlist i').first().removeClass('fa-heart-o').addClass('fa-heart');
            var wishlist = 'yes'
        }else{
            $('.wishlist i').first().removeClass('fa-heart').addClass('fa-heart-o');
            var wishlist = 'no'
        }

        var Data = 'id='+id+'&wishlist='+wishlist;
        //alert(Data);
        //return false;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : '{{url("product/add-wishlist")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){},
            success : function(res){
                if(res =='success'){
                    if(wishlist == 'yes'){
                        addProductCartOrWishlist('fa-check','Success','Product Successfully added in wishlist');
                    }else{
                        addProductCartOrWishlist('fa-check','Success','Product Successfully removed from wishlist');
                    }

                }else{
                    addProductCartOrWishlist('fa-times','Error','Unble to serve your request now ,Try again after some time.');
                }
            },
            complete : function(){},
            error: function () {
                addProductCartOrWishlist('fa-times','Error','Unble to serve your request now ,Try again after some time.');
            }
        }); 
    });



       $(document).on('click','#addToCart',function(){
       /* var is_login = $("#is_login").val();
        if(!is_login){
            addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.')
            return false;
        }*/

        
        var id = $(this).attr('data-id');
        var Data = 'product_id='+id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url : '{{url("add-to-cart")}}',
                type : 'POST',
                data : Data,
                beforeSend: function(){
                   // if($(this).html() != 'buy now'){
                        $("#addToCart").prepend('<i class="fas fa-spinner fa-spin" style="color:black;"></i> &nbsp; ');
                  // }
                },
                success : function(res){
                    if(res == 2){
                       addProductCartOrWishlist('fa-times','Error','This product is already in cart.'); 
                       $("#addToCart").html('Added').prop('disabled',true);
                    }else{
                    addProductCartOrWishlist('fa-check','Success','Product Successfully added to cart');
                    $("#addToCart").html('Added').prop('disabled',true);
                    }
                },
                complete : function(){
                    getCart();
                    if($(this).html() == 'buy now'){
                    window.location.assign("{{url('checkout')}}");
                    }
                },
                error : function(jQxhr,textStatus){
                    if(jQxhr.statusText == 'Unauthorized'){
                        addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.')
                    }
                }
            }); 
    });

});

    function addProductCartOrWishlist(icon,status,msg){
        $.notify({
            icon: 'fa '+icon,
            title: status+'!',
            message: msg
        },{
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 10000,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
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

<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    
    $(document).ready(function()
    {
        $(document).on('click', '.page-item a',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
  
            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#full-comments").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection
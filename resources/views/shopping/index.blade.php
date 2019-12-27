@extends('layouts.shopping')
@section('title','Shop Patterns')
@section('section1')

<input type="hidden" id="token" value="{{csrf_token()}}">
<input type="hidden" id="is_login" value="@if(Auth::check()){{Auth::user()->id}}@endif">

<!-- breadcrumb start -->
<div class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="page-title">
				<h2>Collection</h2></div>
				</div>
				<div class="col-sm-6">
				<nav aria-label="breadcrumb" class="theme-breadcrumb">
					<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/')}}">home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Shop Patterns</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb end -->


<!-- section start -->
<section class="section-b-space ratio_asos">
<div class="collection-wrapper">
<div class="container">
<div class="row">
<div class="col-sm-3 collection-filter">
<!-- side-bar colleps block stat -->
<div class="collection-filter-block">
<!-- brand filter start -->
<div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
<div class="collection-collapse-block open">
<h3 class="collapse-block-title">brand</h3>
	<div class="collection-collapse-block-content">
		<div class="collection-brand-filter">
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Accessories" value="Accessories">
			<label class="custom-control-label" for="Accessories">Accessories</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Blankets" value="Blankets" >
			<label class="custom-control-label" for="Blankets">Blankets</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Garments" value="Garments">
			<label class="custom-control-label" for="Garments">Garments</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Toys" value="Toys">
			<label class="custom-control-label" for="Toys">Toys</label>
			</div>
			
		</div>
	</div>
</div>

<div class="collection-collapse-block open">
<h3 class="collapse-block-title">Design Fit</h3>
	<div class="collection-collapse-block-content">
		<div class="collection-brand-filter">
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Custom" value="Custom">
			<label class="custom-control-label" for="Custom">Custom</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Standard-Sizing" value="Standard-Sizing">
			<label class="custom-control-label" for="Standard-Sizing">Standard Sizing</label>
			</div>
			
		</div>
	</div>
</div>


<div class="collection-collapse-block open">
<h3 class="collapse-block-title">Designer</h3>
	<div class="collection-collapse-block-content">
		<div class="collection-brand-filter">
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills"  id="Knit-Fit-Couture" value="Knit Fit Couture">
			<label class="custom-control-label" for="Knit-Fit-Couture">Knit Fit Couture</label>
			</div>
		</div>
	</div>
</div>

<div class="collection-collapse-block open">
<h3 class="collapse-block-title">Garment Construction</h3>
	<div class="collection-collapse-block-content">
		<div class="collection-brand-filter">
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Bottom-Up" value="Bottom-Up">
			<label class="custom-control-label" for="Bottom-Up">Bottom Up</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Top-Down" value="Top-Down">
			<label class="custom-control-label" for="Top-Down">Top-Down</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Raglan" value="Raglan">
			<label class="custom-control-label" for="Raglan">Raglan</label>
			</div>
		</div>
	</div>
</div>

<div class="collection-collapse-block open">
<h3 class="collapse-block-title">Garment Style</h3>
	<div class="collection-collapse-block-content">
		<div class="collection-brand-filter">
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Cardigan" value="Coat">
			<label class="custom-control-label" for="Cardigan">Cardigan</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Coat" value="Coat">
			<label class="custom-control-label" for="Coat">Coat</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Dress" value="Dress">
			<label class="custom-control-label" for="Dress">Dress</label>
			</div>
			<div class="custom-control custom-checkbox collection-filter-checkbox">
			<input type="checkbox" class="custom-control-input skills" id="Pullover" value="Pullover">
			<label class="custom-control-label" for="Pullover">Pullover</label>
			</div>
		</div>
	</div>
</div>

</div>
</div>

<div class="collection-content col">
<div class="page-main-content">
<div class="row">
<div class="col-sm-12">
<div class="top-banner-wrapper">

</div>
<div class="collection-product-wrapper">
<div class="product-top-filter">
<div class="row">
<div class="col-xl-12">
<div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="product-filter-content">
    <div class="search-count">
        <h5>Showing Products {{$products->currentPage()}} - {{$products->count()}} of {{$products->lastPage()}} Result</h5></div>
    <div class="collection-view">
        <ul>
            <li><i class="fa fa-th grid-layout-view"></i></li>
            <li><i class="fa fa-list-ul list-layout-view"></i></li>
        </ul>
    </div>
    <div class="collection-grid-view">
        <ul>
            <li><img src="{{ asset('resources/assets/assets/images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
            <li><img src="{{ asset('resources/assets/assets/images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
            <li><img src="{{ asset('resources/assets/assets/images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
            <li><img src="{{ asset('resources/assets/assets/images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
        </ul>
    </div>
    <div class="product-page-per-view">
        <div class="search-count">
        <h5>{{$products->count()}} Results Per Page</h5></div>
    </div>
    <div class="product-page-filter">
        <select>
        	<option value="">Sorting Items</option>
            <option value="1">Price</option>
            <option value="2">Rating</option>
        </select>
    </div>
</div>
</div>
</div>
</div>
<div class="product-wrapper-grid">
<div class="row">

@foreach($products as $pro)
<?php 
if(Auth::check()){
	$wishlist = App\Wishlist::where('user_id',Auth::user()->id)->where('product_id',$pro->id)->count();
}else{
	$wishlist = 0;
}

$rating = DB::select(DB::raw("select SUM(rating) as rate from product_comments where product_id = '".$pro->id."' "));
$totrate = DB::table('product_comments')->where('product_id',$pro->id)->count();
$images = DB::table("product_images")->where('product_id',$pro->id)->where('main_photo',1)->get();
$filimages = DB::table("product_images")->where('product_id',$pro->id)->get();
if(count($images) > 0){
        foreach($images as $im);
        
        if($im->image_small == ""){
            $image = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
        }else{
            $image = $im->image_small;
        }
        
        if($im->imagepath == ""){
            $image1 = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
        }else{
            $image1 = $im->imagepath;
        }
        
    }else{
        $image = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
        $image1 = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
    }
?>
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="javascript:;"><img src="{{$image}}" class="img-fluid blur-up lazyload" alt=""></a>

        </div>
        <div class="back">
            <a href="javascript:;"><img src="{{$image}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart" data-id="{{$pro->id}}"  title="Add to cart" class="addToCart"><i class="ti-shopping-cart" ></i></button> 
            <a href="javascript:void(0)" class="wishlist" data-id="{{$pro->id}}" title="Add to Wishlist"><i class="@if($wishlist != 0)fas @else far @endif fa-heart" id="wish{{$pro->id}}"></i></a> 
            <a href="#" class="pattern-popup" data-toggle="modal" data-target="#quick-view" data-id="{{$pro->id}}" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="product-detail">
        <div>
            <div class="rating">
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
            <a href="{{url('product/fullview/'.base64_encode($pro->id))}}"><h6>{{ ucwords($pro->name) }}</h6></a>
            <p>{{ strip_tags($pro->short_description) }}</p>

            @if(empty($pat->special_price))
            	@If($pro->price == 0)
            	<h4>FREE</h4>
            	@else
				<h4>$ {{$pro->price}}</h4>
				@endif
			@else
			@If($pro->special_price == 0)
            	<h4>FREE</h4>
            	@else
				<h4>$ {{$pro->special_price}}</h4>
				@endif
			@endif
            <!-- <ul class="color-variant">
                <li class="bg-light0"></li>
                <li class="bg-light1"></li>
                <li class="bg-light2"></li>
            </ul> -->
        </div>
    </div>
</div>
</div>
@endforeach
<!--
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="../assets/images/pro3/2.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="back">
            <a href="#"><img src="../assets/images/pro3/2-1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> </div>
    </div>
    <div class="product-detail">
        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="the-boyfriend-sweater.html"><h6>The Boyfriend Sweater</h6></a>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <h4>$500.00</h4>
        <!-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --
    </div>
</div>
</div> -->

<!--
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="../assets/images/pro3/3.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="back">
            <a href="#"><img src="../assets/images/pro3/33.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a></div>
    </div>
    <div class="product-detail">
        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Marsha's Lacy Tee</h6></a>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <h4>$500.00</h4>
        <!-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --
    </div>
</div>
</div> -->
<!--
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="../assets/images/pro3/4.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <!-- <div class="back">
            <a href="#"><img src="../assets/images/pro3/34.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div> --
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> </div>
    </div>
    <div class="product-detail">
        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Off-the-Shoulder Ruffle Top</h6></a>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <h4>$500.00</h4>
        <!-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --
    </div>
</div>
</div> -->

<!--
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="../assets/images/pro3/5.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <!-- <div class="back">
            <a href="#"><img src="../assets/images/pro3/28.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div> --
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a></div>
    </div>
    <div class="product-detail">
        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Emily's Sweater</h6></a>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <h4>$500.00</h4>
        <!-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --
    </div>
</div>
</div> -->
<!--
<div class="col-xl-3 col-md-6 col-grid-box">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="../assets/images/pro3/6.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <!-- <div class="back">
            <a href="#"><img src="../assets/images/pro3/36.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div> --
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a> </div>
    </div>
    <div class="product-detail">
        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="#"><h6>Trevor's V-neck</h6></a>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <h4>$500.00</h4>
        <!-- <ul class="color-variant">
            <li class="bg-light0"></li>
            <li class="bg-light1"></li>
            <li class="bg-light2"></li>
        </ul> --
    </div>
</div>
</div> -->
<!--
<div class="col-xl-3 col-md-6 col-grid-box">
    <div class="product-box">
        <div class="img-wrapper">
            <div class="front">
                <a href="#"><img src="../assets/images/pro3/1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
            </div>
            <div class="back">
                <a href="#"><img src="../assets/images/pro3/1-1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
            </div>
            <div class="cart-info cart-wrap">
                <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a></div>
        </div>
        <div class="product-detail">
            <div>
                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="peekaboo-cabled-sweater.html"><h6>Peekaboo Cabled Sweater</h6></a>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                <h4>$500.00</h4>
                <!-- <ul class="color-variant">
                    <li class="bg-light0"></li>
                    <li class="bg-light1"></li>
                    <li class="bg-light2"></li>
                </ul> --
            </div>
        </div>
    </div>
</div>
-->
<!--
<div class="col-xl-3 col-md-6 col-grid-box">
        <div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="#"><img src="../assets/images/pro3/2.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                </div>
                <div class="back">
                    <a href="#"><img src="../assets/images/pro3/2-1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                </div>
                <div class="cart-info cart-wrap">
                    <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="ti-shopping-cart" ></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a></div>
            </div>
            <div class="product-detail">
                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div><a href="the-boyfriend-sweater.html"><h6>The Boyfriend Sweater</h6></a>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                <h4>$500.00</h4>
                <!-- <ul class="color-variant">
                    <li class="bg-light0"></li>
                    <li class="bg-light1"></li>
                    <li class="bg-light2"></li>
                </ul> --
            </div>
        </div>
    </div> -->
</div>
</div>

<div class="product-pagination">
<div class="theme-paggination-block">
<div class="row">
<div class="col-xl-6 col-md-6 col-sm-12">
    <nav aria-label="Page navigation">
       <!-- <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
        </ul> -->
        {{$products->links()}}
    </nav>
</div>
<div class="col-xl-6 col-md-6 col-sm-12">
    <div class="product-search-count-bottom">
        <h5>Showing Products {{$products->currentPage()}} - {{$products->count()}} of {{$products->lastPage()}} Result</h5></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- section End -->


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row" id="show-pattern">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->
@endsection

@section('footerscript')
<style type="text/css">
	.page-link{
		padding:18px !important;
	}
	.fas .fa-heart{
		color: #bc7c8f;
	}
	.rating i{
		color: #ddd !important;
	}
	.rating i.fa-star{
		color: #ffa200 !important;
	}
</style>

<script type="text/javascript">
	$(function(){
		$(document).on('click','.pattern-popup',function(){
			var id = $(this).attr('data-id');
			$("#show-pattern").load('{{url("pattern-popup")}}/'+id)
		});

	$(document).on('click','.skills',function(){
        $(".checkSkills").addClass('hide');
        var array = []; 
        $("input:checkbox:checked").each(function() { 
                array.push($(this).val()); 
        }); 
    var classes = array.toString().replace(/,/g, ",.");
    //alert(classes);
    console.log(array);

    //$("#checkbox-data").find("div." + classes).show();
    if(classes.length != 0){
        $("#checkbox-data > div."+classes).removeClass('hide');
    }else{
        $(".checkSkills").removeClass('hide');
    }
    

    //alert($("div.checkSkills:visible").length);
    }); 

    $(document).on('click','.wishlist',function(){
    	var id = $(this).attr('data-id');
    	var check = $("#wish"+id).hasClass('far');
    	var token = $("#token").val();
    	var is_login = $("#is_login").val();
    	if(!is_login){
    		addProductCartOrWishlist('fa-times','Error','Please login to add product to wishlist.')
    		return false;
    	}
    	if(check == true){
    		$("#wish"+id).removeClass('far').addClass('fas');
    		var wishlist = 'yes'
    	}else{
    		$("#wish"+id).removeClass('fas').addClass('far');
    		var wishlist = 'no'
    	}

    	var Data = 'id='+id+'&wishlist='+wishlist;

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


    $(document).on('click','.addToCart',function(){
    	/* var is_login = $("#is_login").val();
    	if(!is_login){
    		addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.')
    		return false;
    	} */
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
				
				},
				success : function(res){
                    if(res == 2){
                       addProductCartOrWishlist('fa-times','Error','This product is already in cart.'); 
                    }else{
					addProductCartOrWishlist('fa-check','Success','Product Successfully added to cart');
                    }
				},
				complete : function(){
					getCart();
				},
				error : function(jQxhr,textStatus){
					if(jQxhr.statusText == 'Unauthorized'){
						addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.');
					}
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
                    $("#addToCart").prepend('<i class="fas fa-spinner fa-spin" style="color:black;"></i> &nbsp; ');
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
@endsection
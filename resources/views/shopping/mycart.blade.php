@extends('layouts.shopping')
@section('title','Cart')
@section('section1')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Cart</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
            	@if(Session::has('cart'))
            	<p class="pull-right"><a href="{{url('remove-all-items')}}" class="btn btn-solid">Remove all items</a></p>
            	<br>
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">image</th>
                        <th scope="col">product name</th>
                        <th scope="col">price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">total</th>
                        <th scope="col">action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    	@if(count($data) > 0)
                    	@foreach($data as $da)
                    	<?php

$images = DB::table("product_images")->where('product_id',$da['item']['id'])->where('main_photo',1)->get();
$filimages = DB::table("product_images")->where('product_id',$da['item']['id'])->get();
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
                    <tr>
                        <td>
                            <a href="#"><img src="{{$image}}" alt=""></a>
                        </td>
                        <td><a href="#">{{$da['item']['name']}}</a>
                            <div class="mobile-cart-content row">
                                <div class="col-xs-3">
                                    <div class="qty-box">
                                        <div class="input-group">
                                           <h2>{{$da['qty']}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="td-color">@if($da['item']['price'] == 0) FREE @else ${{number_format($da['item']['price'],2)}} @endif</h2></div>
                                <div class="col-xs-3">
                                    <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div>
                            </div>
                        </td>
                        <td>
                            <h2>@if($da['item']['price'] == 0) FREE @else ${{number_format($da['item']['price'],2)}} @endif</h2></td>
                        <td>
                            <div class="qty-box">
                                <div class="input-group">
                                    <h2 class="td-color">{{$da['qty']}}</h2>
                                </div>
                            </div>
                        </td>
                        <td><h2 class="td-color">${{number_format($totalPrice,2)}}</h2></td>
                        <td><a href="javascript:;" class="icon remove-item" data-id="{{$da['item']['id']}}"><i class="ti-close"></i></a></td>
                        
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                    <tr>
                        <td>total price :</td>
                        <td>
                            <h2>${{number_format($totalPrice,2)}} </h2></td>
                    </tr>
                    </tfoot>
                </table>
                @else
                <h2 class="text-center">Oops..! No items in your cart.</h2>
                <div class="row cart-buttons">
            <div class="col-12 text-center"><a  href="{{url('shop-patterns')}}" class=" btn btn-solid">continue shopping</a></div>
            
        </div>
                @endif
            </div>
        </div>
        @if(Session::has('cart'))
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{url('shop-patterns')}}" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{url('checkout')}}" class="btn btn-solid">check out</a></div>
        </div>
        @endif
    </div>
</section>
<!--section end-->

@endsection
@section('footerscript')

<script type="text/javascript">
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
       setTimeout(function(){ location.reload(); },2000); 
	}
</script>
@endsection
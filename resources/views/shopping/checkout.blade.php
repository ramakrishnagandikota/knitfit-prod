@extends('layouts.shopping')
@section('title','Checkout')
@section('section1')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Check Out</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check out</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">

    <div class="container">
    	@if(Auth::check())
            <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                        	<div class="row">
                            <h2>Billing Address</h2>
<a href="javascript:;" class="addaddress" style="position: absolute; right: 118px;color: #bb7c8f;">Add New Address</a>
</div>
                        </div>
                        <div class="box-account box-info">
                            <div class="row" id="user-address">
                                
                                
                               
                            </div><br>
                        </div>
                    </div>
                </div>
                @endif
                <br>
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{url('payment')}}" method="POST">
                	@csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12" >
                        	<div id="address" >
                           
                            </div>
                        </div> 
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                    	@if(Session::has('cart'))
                                 <?php 
                                 $subtotal = 0;
                                 ?>
                                    	@foreach($data as $da)
                                <?php 
                                	$subtotal+=$da['qty']*$da['price'];
                                ?>
<input type="hidden" name="product_id[]" value="{{$da['item']['id']}}">
<input type="hidden" name="product_name[]" value="{{$da['item']['name']}}">
<input type="hidden" name="price[]" value="{{$da['price']}}">
<input type="hidden" name="qty[]" value="{{$da['qty']}}">
<input type="hidden" name="product_category[]" value="{{$da['item']['category_name']}}">
									
                                        <li>{{$da['item']['name']}} × {{$da['qty']}} <span> ${{number_format($da['price'],2)}}</span></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <ul class="sub-total">
<input type="hidden" name="subtotal" value="{{$subtotal}}">
<input type="hidden" name="total" value="{{$totalPrice}}">
                                        <li>Subtotal <span class="count">${{number_format($totalPrice,2)}}</span></li>
                                       <!-- <li>Shipping
                                            <div class="shipping">
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="free-shipping" id="free-shipping">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="local-pickup" id="local-pickup">
                                                    <label for="local-pickup">Local Pickup</label>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                    <ul class="total">
                                        <li>Total <span class="count">${{number_format($totalPrice,2)}}</span></li>
                                    </ul>
                                </div>

                                <div class="payment-box">
                                	@if($totalPrice != 0)
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                              <!--  <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1" checked="checked">
                                                        <label for="payment-1">Check Payments<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li> -->
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="paypal" id="payment-3" checked="checked">
                                                        <label for="payment-3">PayPal<span class="image"><img src="{{ asset('resources/assets/assets/images/paypal.png') }}" alt=""></span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="text-right">
                                    <input type="submit" name="submit" class="btn-solid btn" value="Place Order">
                                    </div>
                                   <!-- <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

@endsection
@section('footerscript')

<script type="text/javascript">
	$(function(){
        
		getUserAddress();

		$(document).on('click','.addaddress',function(){
            var id = $(this).attr('data-id');
            if(id){
                $("#address").load('{{url("add-address")}}/'+id);
            }else{
                $("#address").load('{{url("add-address")}}');
            }
			
		});
	});

	function getUserAddress(){
		$.get('{{url("get-user-address")}}',function(res){
			$("#user-address").html(res);
		});
	}
</script>
@endsection
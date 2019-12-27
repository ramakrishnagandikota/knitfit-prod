@extends('layouts.shopping')
@section('title','Checkout')
@section('section1')
<!-- thank-you section start -->
<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>thank you</h2>
                    <p>Payment is successfully processsed.</p>
                    <p>Transaction ID: {{$orders->order_number}}</p>
                </div>
                <br>
                <div class="success-text">
                    <h3><b>You to do next?</b></h3>
                    
                    <p>Add <a href="../../default/Measurement.html" >Measurements </a> to start project.</p>
                    <p>Visit <a href="../../default/Timeline.html" >Projects</a> Library </p>
                    <p><a href="shop-patterns.html" >Continue shopping </a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- order-detail section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    <h3>your order details</h3>
        @if(count($booking_process) > 0)
            @foreach($booking_process as $bp)
                    <div class="row product-order-detail">
                        <div class="col-3"><img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>product name</h4>
                                <h5>{{$bp->product_name}}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>quantity</h4>
                                <h5>{{$bp->product_quantity}}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>price</h4>
                                <h5>{{$bp->setpayment}}</h5></div>
                        </div>
                    </div>
            @endforeach

        @endif    
                    <div class="total-sec">
                        <ul>
                            <li>subtotal <span>$55.00</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>${{$orders->ordered_amt}}</span></h3></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>summery</h4>
                        <ul class="order-detail">
                            <li>order ID: {{$orders->order_number}}</li>
                            <li>Order Date: {{date('dS M Y',strtotime($orders->order_date))}}</li>
                            <li>Order Total: ${{$orders->ordered_amt}}</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>shipping address</h4>
                        <ul class="order-detail">
                            <li>{{$orders->booking_fullname}}</li>
                            <li>568, suite ave.</li>
                            <li>Austrlia, 235153</li>
                            <li>Contact No. 987456321</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>payment method</h4>
                        <p>Payment by PAYPAL</p>
                    </div>
                <!--<div class="col-md-12">
                        <div class="delivery-sec">
                            <h3>expected date of delivery</h3>
                            <h2>october 22, 2018</h2>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

@endsection
@section('footerscript')

@endsection
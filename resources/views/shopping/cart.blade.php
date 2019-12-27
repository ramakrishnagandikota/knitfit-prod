
@if(Session::has('cart'))
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
<li>
    <div class="media">
        <a href="#"><img class="mr-3" src="{{$image}}" alt="Generic placeholder image"></a>
        <div class="media-body">
            <a href="#"><h4>{{$da['item']['name']}}</h4></a>
            <h4><span>{{$da['qty']}} x @if($da['item']['price'] == 0) FREE @else ${{number_format($da['item']['price'],2)}} @endif</span></h4>
        </div>
    </div>
    <div class="close-circle">
        <a href="javascript:;" class="remove-item" data-id="{{$da['item']['id']}}"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
</li>
@endforeach
<li>
    <div class="total">
        <h5>subtotal : <span>@if($totalPrice == 0) FREE @else ${{number_format($totalPrice,2)}} @endif</span></h5>
    </div>
</li>
<li>
    <div class="buttons">
        <a href="{{url('cart')}}" class="view-cart">view cart</a>
        <a href="{{url('checkout')}}" class="checkout">checkout</a>
    </div>
</li>
@else
<li>
    <div class="total">
        <h5>No items in cart</h5>
    </div>
</li>
@endif
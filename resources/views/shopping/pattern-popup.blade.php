<?php 

$images = DB::table("product_images")->where('product_id',$pattern->id)->where('main_photo',1)->get();
$filimages = DB::table("product_images")->where('product_id',$pattern->id)->get();
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
<div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img src="{{$image}}" alt="" class="img-fluid blur-up lazyload"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ucwords($pattern->name)}}</h2>
                            @if(empty($pattern->special_price))
                            @if($pattern->price == 0)
                            <h3>FREE</h3>
                            @else
                            <h3>$ {{$pattern->price}}</h3>
                            @endif
                        @else
                        @if($pattern->special_price == 0)
                            <h3>FREE</h3>
                            @else
                            <h3>$ {{$pattern->special_price}}</h3>
                            @endif
                        @endif
                            <!-- <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul> -->
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>{{ strip_tags($pattern->short_description) }}</p>
                            </div>
                            <div class="product-description border-product">
                                <!-- <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="#">s</a></li>
                                        <li><a href="#">m</a></li>
                                        <li><a href="#">l</a></li>
                                        <li><a href="#">xl</a></li>
                                    </ul>
                                </div> -->
                                <h6 class="product-title">quantity : 1</h6>
                                <input type="hidden" name="quantity" id="quantity" class="form-control input-number" value="1">
                              <!--  <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" id="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                                </div> -->
                            </div>
                            <div class="product-buttons">
                                <a href="javascript:;"  class="btn btn-solid" id="addToCart" data-id="{{$pattern->id}}">add to cart</a>
                                <a href="{{url('product/fullview/'.base64_encode($pattern->id))}}" class="btn btn-solid">view detail</a>
                            </div>
                        </div>
                    </div>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Products;
use Auth;
use Session;

class Cartcontroller extends Controller
{
    	public function __construct(){
			//$this->middleware('auth');
		}

	

    function add_to_cart(Request $request){

        if($request->ajax()){

            if($request->session()->exists('cart')){
            $oldCart = $request->session()->get('cart');
        }else{
            $oldCart = null;
        }
        //exit;

        //$oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $product = Products::find($request->product_id);

        $products = $cart->items;


    if(count($products) > 0){
        
        foreach($products as $pro){
            $pid = $pro['item']['id'];
            if($pid == $product->id){
                //echo 'You can not add more than one pattern in cart.';
                return 2;
                exit;
            }
        }

    }

        $add = $cart->add($product,$request->product_id);
        $request->session()->put('cart',$cart); 

        }else{
            if($request->session()->exists('cart')){
            $oldCart = $request->session()->get('cart');
        }else{
            $oldCart = null;
        }
        //exit;

        //$oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $product = Products::find($request->product_id);

        $products = $cart->items;


    if(count($products) > 0){
        
        foreach($products as $pro){
            $pid = $pro['item']['id'];
            if($pid == $product->id){
                 //Session::flash('error','This product is already added in cart.')
                 return redirect('checkout');
            }
        }

    }

        $add = $cart->add($product,$request->product_id);
        $request->session()->put('cart',$cart); 

        return redirect('checkout');
        }

        
		
    }

    function my_cart(Request $request){
        $oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$data = $cart->items;
    	$totalPrice = $cart->totalPrice;
    	return view('shopping.mycart',compact('data','totalPrice'));
    }

    function remove_all_items(){
    	Session::forget('cart');
    	return redirect()->back();
    }

    public function getReduseByOne($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);
    	if(count($cart->items) > 0){
    		$sess = Session::put('cart',$cart);
    	}else{
    		$sess = Session::forget('cart');
    	}
    	//return redirect()->back();
    }

    function final_step(Request $request){
    	if(! Session::has('cart')){
    		return redirect('shop-patterns');
    	}
    	$cart = Session::get('cart');
    	$data = $cart->items;
    	$totalPrice = $cart->totalPrice;
    	return view('finalpage',compact('data','totalPrice'));
    }

    
}

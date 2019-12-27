<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Products;
use Carbon\Carbon;
use App\Wishlist;
use DB;
use App\Filters;
use App\User;
use Session;
use App\Cart;
use View;

class Shoppingcontroller extends Controller
{
    function shop_patterns(){
    	//print_r(Session::get('cart'));
    	//Session::forget('cart');
    	$products = Products::where('category_name',1)->where('status',1)->paginate(3);
    	return view('shopping.index',compact('products'));
    }
    function pattern_popup(Request $request){
    	$pattern = Products::where('id',$request->id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $data = $cart->items;
    	return view('shopping.pattern-popup',compact('pattern','data'));
    }

    function product_add_wishlist(Request $request){
    	if($request->wishlist == 'yes'){
    		$fav = new Wishlist;
			$fav->user_id = Auth::user()->id;
			$fav->product_id = $request->id;
			$save = $fav->save();
    	}else{
    		$save = DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$request->id)->delete();
    	}
    	
		if($save){
			return response()->json('success');
		}else{
			return response()->json('fail');
		}
    }

    function get_cart(){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$data = $cart->items;
        $totalPrice = $cart->totalPrice;
    	return view('shopping.cart',compact('data','totalPrice'));
    }

    function product_fullview(Request $request){
        $id = base64_decode($request->id);
        $pro = Products::where('id',$id)->first();
        $comments = DB::table('product_comments')->where('product_id',$id)->orderBy('id','desc')->paginate(6);
        if ($request->ajax()) {
            return view('shopping.product-comments', compact('pro','comments'));
        }
        return view('shopping.product-fullview',compact('pro','comments'));
    }

    function product_add_comment(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }else{
            $user_id = '0';
        }

        $array = array('user_id' => $user_id,'product_id' => $request->product_id,'rating' => $request->rating,'name' => $request->name,'email' => $request->email,'comment' => $request->comment,'status' => 1,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);
        $ins = DB::table('product_comments')->insert($array);
        if($ins){
            return 0;
        }else{
            return 1;
        }
    }


    function vote_comment(Request $request){

        if($request->vote == 1){
            $array = array('user_id' => Auth::user()->id,'product_id'=> $request->pid,'comment_id' => $request->cid,'vote' => 1,'unvote' => 0,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);
            $ins = DB::table('product_comment_votes_unvote')->insert($array);
        }else{
            $ins = DB::table('product_comment_votes_unvote')->where('comment_id',$request->cid)->where('vote',1)->delete();
        }

        if($ins){
            return 0;
        }else{
            return 1;
        }
    }

    function unvote_comment(Request $request){
        if($request->vote == 1){
            $array = array('user_id' => Auth::user()->id,'product_id'=> $request->pid,'comment_id' => $request->cid,'vote' => 0,'unvote' => 1,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);
            $ins = DB::table('product_comment_votes_unvote')->insert($array);
        }else{
            $ins = DB::table('product_comment_votes_unvote')->where('comment_id',$request->cid)->where('unvote',1)->delete();
        }

        if($ins){
            return 0;
        }else{
            return 1;
        }
    }

    function select_address(Request $request){
        $ua = DB::table('user_address')->where('id',$request->id)->first();
        return view('shopping.add-address',compact('ua'));
    }
}

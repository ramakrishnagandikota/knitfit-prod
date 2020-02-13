<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function subscription(){
    	return view('subscription.index');
    }

    function getExpressCheckout(Request $request){
    	print_r($request->all());
    }
}

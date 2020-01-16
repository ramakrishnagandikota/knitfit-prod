<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use PayPal;
use Redirect;
use Auth;
use Session;
use DB;
use Carbon\Carbon;

class PayPalController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	function user_address(){
		$address = DB::table('user_address')->where('user_id',Auth::user()->id)->get();
		return view('shopping.user-address',compact('address'));
	}

	function checkout(Request $request){
        if(!Session::has('cart')){
            return redirect('shop-patterns');
        }
        $cart = Session::get('cart');
        $data = $cart->items;
        $totalPrice = $cart->totalPrice;
        
        return view('shopping.checkout',compact('data','totalPrice'));
    }

    public function payment(Request $request)
    {
    	
        //echo '<pre>';
        //print_r($request->all());
        //echo '</pre>';
        //exit;

        if($request->save_address == 1){
            $addresss = array('user_id' =>Auth::user()->id,'first_name' => $request->first_name,'last_name' => $request->last_name,'email' => $request->email,'zipcode'=> $request->zipcode,'address' => $request->address,'address2' => $request->address2,'city' => $request->city,'state' => $request->state,'phone' => $request->phone,'country' => $request->country);
            $ins = DB::table('user_address')->insert($addresss);
        }

		$cart = Session::get('cart');
		if($request->total == 0){
			$payment_type = 'FREE';
		}else{
			$payment_type = 'PAYPAL';
		}


    	$array = array('user_id' => Auth::user()->id,'order_number' => time(),'order_date' => date('Y-m-d H:i:s'),'invoice' => time(),'order_status' => 'approved','order_description' => 'Knitfit order','ordered_amt' => $request->total,'shipping' => 0,'currency' => 'USD','booking_fullname' => $request->first_name.' '.$request->last_name,'booking_datebooked' => date('Y-m-d'),'booking_timebooked' => date('H:i:s'),'booking_email' => $request->email,'booking_cart_total' => count($cart->items),'total' => $request->total,'payment_type' => $payment_type,'address_id' => 0,'cart_total' => serialize($cart));
    	//print_r($array);
    	//exit;
    	$orders = DB::table('orders')->insertGetId($array);

        Session::put('order_id',$orders);

    	for($i=0;$i< count($request->product_id);$i++){
    		$product_id = $request->product_id[$i];
    	$array1 = array('user_id' => Auth::user()->id,'product_id' => $request->product_id[$i],'product_name' => $request->product_name[$i],'product_quantity' => $request->qty[$i],'bookingdate' => date('Y-m-d'),'bookingtime' => date('H:i:s'),'booking_order_id' => $orders,'setpayment' => $request->price[$i],'ftotalamount' => $request->total,'payment_method' => $payment_type,'pat_table' => 'pat_'.$request->product_id[$i]);
    	$bp = DB::table('booking_process')->insert($array1);

    	}



    	if($payment_type == 'PAYPAL'){

      	$cart = Session::get('cart');
        $data = $cart->items;
        $totalPrice = $cart->totalPrice;


        $data = [];
        

    	$data['items'] = [];
        foreach ($cart->items as $key => $item) {
            $itemDetail=[
                'name' => $item['item']['name'],
                'price' => $item['item']['price'],
                'desc'  => $item['item']['name'],
                'qty' => $item['qty']
            ];

            $data['items'][] =$itemDetail;
        }

    	$total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
    
        $data['invoice_id'] = time();
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('payment/success/'.base64_encode($orders));
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $total;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
    	}else{
    		return redirect('payment/success/'.base64_encode($orders));
    	}
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
    	$provider = PayPal::setProvider('express_checkout'); 
        $response = $provider->getExpressCheckoutDetails($request->token);
		
		
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
           // dd('Your payment was successfully. You can create success page here.');
            $order_id = base64_decode($request->order_id);
            $orders = DB::table('orders')->where('order_id',$order_id)->first();
            $booking_process = DB::table('booking_process')->where('booking_order_id',$order_id)->get();
        return view('shopping.order-success',compact('orders','booking_process'));
        }

        dd('Something is wrong.');
    }
}

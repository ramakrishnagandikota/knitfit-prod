<?php
if(version_compare(PHP_VERSION, '7.3.11', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::match(array('GET','POST'),'login',[
	'uses' => 'Logincontroller@login_page',
    'as' => 'login'
]);

Route::match(array('GET','POST'),'register',[
	'uses' => 'Logincontroller@Register_validate',
    'as' => 'register'
]);

Route::post('notify-us','Home\Frontendcontroller@notify_us');
Route::get('newsletter/unsubscribe/{token}','Home\Frontendcontroller@newsletter_unscbscribe');
Route::post('contact-us','Home\Frontendcontroller@contact_us');

Route::get('logout',[
	'uses' => 'Logincontroller@logout',
    'as' => 'logout'
]);

Route::get('check-validpage/{token}','Logincontroller@check_validpage');

Route::get('registration/check-user-email/{email}/{encemail}','Logincontroller@email_activate');
Route::get('reset-password','Logincontroller@reset_password');
Route::post('password-reset','Logincontroller@send_reset_password_link');
Route::get('validate/password/{token}','Logincontroller@validate_password');
Route::post('validate/newpassword','Logincontroller@validate_newpassword');


Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('auth/facebook', 'Auth\FacebookController@login_with_fb');
Route::get('auth/facebook/callback', 'Auth\FacebookController@fb_login_success');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('shop-patterns',[
	'uses' => 'Shoppingcontroller@shop_patterns',
    'as' => 'shop-patterns'
]);
Route::get('pattern-popup/{id}',[
	'uses' => 'Shoppingcontroller@pattern_popup',
    'as' => 'pattern-popup/{id}'
]);
Route::POST('product/add-wishlist',[
	'uses' => 'Shoppingcontroller@product_add_wishlist',
    'as' => 'product/add-wishlist'
]);

/* cart items */
Route::get('load-cart','Shoppingcontroller@get_cart');
Route::post('add-to-cart','Cartcontroller@add_to_cart');
Route::get('cart','Cartcontroller@my_cart');
Route::get('remove-all-items','Cartcontroller@remove_all_items');
Route::get('remove-item/{id}','Cartcontroller@getReduseByOne');
Route::get('final-step','Cartcontroller@final_step');

Route::get('checkout','PayPalController@checkout');

Route::post('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success/{order_id}', 'PayPalController@success')->name('payment.success');

Route::get('get-user-address','PayPalController@user_address');

Route::get('product/fullview/{id}',[
    'uses' => 'Shoppingcontroller@product_fullview',
    'as' => 'product/fullview/{id}'
]);

Route::post('product/add-comment','Shoppingcontroller@product_add_comment');
Route::post('product/vote-comment','Shoppingcontroller@vote_comment');
Route::post('product/unvote-comment','Shoppingcontroller@unvote_comment');

Route::post('buynow','Cartcontroller@add_to_cart');

Route::get('add-address',function(){
    $ua = 0;
    return view('shopping.add-address',compact('ua'));
});

Route::get('add-address/{id}','Shoppingcontroller@select_address');

/* Express checkout & recurring payments start */

Route::get('subscription', 'TestController@subscription');
Route::post('paypal/ec-checkout', 'TestController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'TestController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'TestController@getAdaptivePay');

Route::get('paypal/cancel-subscription', 'TestController@cancel_subscription');
Route::post('paypal/notify', 'TestController@notify');

/* Express checkout & recurring payments end */
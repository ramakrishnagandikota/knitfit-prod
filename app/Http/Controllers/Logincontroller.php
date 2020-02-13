<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use DB;
use Validator;
use Mail;
use Redirect;
use App\Mail\RegistrationMail;
use App\Mail\AccountVerificationMail;
use App\Mail\PasswordResetMail;

class Logincontroller extends Controller
{

    public function findUsername()
    {
        $login = request()->input('email');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }

    

    function login_page(Request $request){

        
		
        if(Auth::check()){
            return redirect('home');
        }
    	if($request->isMethod('get')){
    		return view('auth/login');
    	}else{



            if($this->findUsername() == 'email'){
                $validator = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
                ]);
            }else{
                $validator = $request->validate([
                    'username' => 'required|alpha_num|min:5|max:15',
                    'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
                ]);
            }
    		
    		


        if(! $validator) {
            return redirect()->back();
        }else{
        	$remember = $request->remember;
            $data = array($this->findUsername() => $request->email,'password' => $request->password);
        if(Auth::attempt($data,$remember)){
            if(Auth::user()->status == 1){
				if(Auth::user()->hasRole('Admin')){
					return redirect('admin');
				}else if(Auth::user()->hasRole('Knitter')){
                    return redirect('knitter/dashboard');
                    //return redirect()->back();
                }else if(Auth::user()->hasRole('Designer')){
                    return redirect('/');
                    //return redirect()->back();
                }else{
                    return redirect('/');
                }
            
            }else{
                Auth::logout();
                Session::flash('error','Your email was not activated . Please check your email to activate your account.');
                return redirect()->back();
            }
        }else{
          Session::flash('error','Invalid credentials / No account exists . Please check & try again.');
            return redirect()->back();
        }
        }

    	}
    }
	
	function Register_validate(Request $request){
		if(Auth::check()){
			return redirect('connect');
		}
    	if($request->isMethod('get')){
    		return view('auth/register');
    	}else{
    		$validator = $request->validate([
                'first_name' => 'required|alpha|min:2|max:15',
                'last_name' => 'required|alpha|min:2|max:15',
	            'username' => 'required|alpha_num|max:25|unique:users',
		        'email' => 'email|unique:users',
		        'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		        'confirm_password' => 'same:password',
		        'terms_and_conditions' => 'required'
	        ]);
           /* [
                'password.regex' => 'Your password must be more than 8 characters long, should contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.'
            ]); */

		    if(! $validator){
	            return redirect()->back();
	        }else{
	        	 $y = date('Y') + 1; $m = date('m'); $d = date('d');
            	 $exp = $d.'-'.$m.'-'.$d;
				 
				 $md5email = md5($request->email);

            	 $user = new User;
            $user->name = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->enc_email = $md5email;
            $user->picture = 'resources/assets/user.png';
            $user->oauth_picture = $this->random_color();
            $user->sub_exp = $exp;
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();

            /* $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['first_name'] =  $user->first_name; */

            $arr = array('user_id' => $user->id,'role_id' => 2,'created_at' => date('Y-m-d H:i:s'));
            $dd = DB::table('user_role')->insert($arr);

            $arr = array('user_id' => $user->id);
            //$ii = DB::table('user_measurements')->insert($arr);
            $up = DB::table('user_profile')->insert($arr);



			$details = [
			    'detail'=>'detail',
			    'name'  => ucwords(ucwords($request->username)),
			    'email' =>$request->email,
				'encemail' => $md5email
			     ];

            \Mail::to($request->email)->send(new RegistrationMail($details));


			Session::flash('error','You have successfully registered. Please check your email to activate your account.');
			return redirect('login');
	        }
    	}
    }

    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

    function logout(){
    	Auth::logout();
    	return redirect('login');
    }


           function email_activate(Request $request){
           $e = $request->encemail;
        $db = DB::table('users')->where('enc_email',$e)->where('status',0)->first();

        if($db){
        if($db->status == 1){
            return view('alreadyactivated');
        }else{
            $ar = array('status'=>1);
            $dd = DB::table('users')->where('enc_email',$e)->update($ar);


            $details = array(
                'detail'=>'detail',
                'name'  => ucwords(ucwords($db->username)),
                'email' =>$db->email
            );

            \Mail::to($db->email)->send(new AccountVerificationMail($details));

            return view('activated');
        }

    }else{

        return view('alreadyactivated');
        
   }
    }



    function reset_password(){
        return view('auth.passwords.email');
    }

    function send_reset_password_link(Request $request,User $user){
        $validator = $request->validate([
            'email' => 'required|email'
        ]);




        if(! $validator) {
            return redirect()->back();
        }else{
            $check = $user->email($request->email)->first();
           if($check){
           $time = md5(time());
            $array = array('email' => $request->email,'token' => $time,'created_at' => date('Y-m-d H:i:s'));
            DB::table('password_resets')->insert($array);

            $details = array(
                'name'  => ucwords(ucwords($check->first_name.' '.$check->last_name)),
                'email' =>$request->email,
                'token' => $time
            );

            \Mail::to($request->email)->send(new PasswordResetMail($details));
            Session::flash('success','Mail has been sent to the registered email with reset link');
            
           }else{
            Session::flash('fail','Mail does not found in our records.');
            
           }
           return redirect()->back();
        }
    }

    function validate_password(Request $request){
        $token = $request->token;
        $expired = DB::table('password_resets')->where('token',$request->token)->first();
        if($expired->is_clicked == 1){
            return view('auth.passwords.expired');
            exit;
        }

        if(date('Y-m-d') != date('Y-m-d',strtotime($expired->created_at))){
            return view('auth.passwords.expired');
            exit;
        }
        $check = DB::table('password_resets')->where('token',$token)->first();
        $email = base64_encode($check->email);
        return view('auth.passwords.reset',compact('email','token'));
    }

    function check_validpage(Request $request){
        $expired = DB::table('password_resets')->where('token',$request->token)->first();
        if($expired->is_clicked == 1){
            echo 'expired';
        }

        if(date('Y-m-d') != date('Y-m-d',strtotime($expired->created_at))){
            echo 'expired';
        }
        return '';
    }

    function validate_newpassword(Request $request){

        $validator = $request->validate([
            'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' => 'required|same:password|min:8|max:16'
        ]);


        if(! $validator) {
            return response()->json([
            'success' => 'false',
            'errors'  => $validator->getMessageBag()->toArray(),
            ], 400);
        }else{

        $email = base64_decode($request->tok);
        
        $expired = DB::table('password_resets')->where('token',$request->token)->first();
        if($expired->is_clicked == 1){
            return view('auth.passwords.expired');
            exit;
        }

        if(date('Y-m-d') != date('Y-m-d',strtotime($expired->created_at))){
            return view('auth.passwords.expired');
            exit;
        }
        $array = array('password' => bcrypt($request->password));
        $upd = User::where('email',$email)->update($array);

        $array1 = array('is_clicked' => 1);
        $upd1 = DB::table('password_resets')->where('token',$request->token)->update($array1);

        if($upd){
            return 0;
        }else{
            return 1;
        }
    }

}

}

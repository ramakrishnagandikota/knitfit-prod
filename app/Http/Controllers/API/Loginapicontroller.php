<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use JWTAuth;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;	
use Session;
use DB;
use Validator;
use Mail;
use Redirect;
use App\Mail\RegistrationMail;
use App\Mail\AccountVerificationMail;
use App\Mail\PasswordResetMail;

class Loginapicontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }	

    public function findUsername()
    {
        $login = request()->input('email') ? request()->input('email') : request()->input('username');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }

    public function login(Request $request)
    {

    	if($this->findUsername() == 'email'){
    		$requestVariable = 'email';
        }else{
        	$requestVariable = 'username';
        }

        $credentials = $request->only($requestVariable, 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function me()
    {
    	$user = $this->guard()->user();
        return new UserResource($user);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }

    function register(Request $request){

    	$validator = $request->validate([
	        'first_name' => 'required|alpha|min:2|max:15',
	        'last_name' => 'required|alpha|min:2|max:15',
	        'username' => 'required|alpha_num|max:25|unique:users',
	        'email' => 'required|email|unique:users',
	        'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
	        'confirm_password' => 'same:password',
	        'terms_and_conditions' => 'required'
	    ]);

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
            $user->sub_exp = $exp;
            $user->created_at = date('Y-m-d H:i:s');
            $save = $user->save();

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

            if($save){
            return response()->json(['success' => 'You have successfully registered. Please check your email to activate your account.','statusCode' => 200]);
            }else{
            return response()->json(['fail' => 'Unable to register user, Please try again after some time.']);
            }
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use JWTAuth;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;	

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
    	
    }
}

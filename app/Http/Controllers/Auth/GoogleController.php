<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use DB;
use Validator;
use Mail;
use Redirect;
use Laravel\Passport\Passport;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->with(['API_KEY' => 'AIzaSyADrgQJEO8Yd3_oUqEsma0vGNjY6IMu6XU'])->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $gmailuser = Socialite::driver('google')->stateless()->user();
        }catch (\Exception $e){
            Session::flash('error','Unable to login.Try again after some time.');
            return redirect('login');
        }

        $user = User::where('email',$gmailuser->getEmail())->first();

        if(! $user){
            $y = date('Y') + 1; $m = date('m'); $d = date('d');
            $exp = $d.'-'.$m.'-'.$d;

            $appuser = new User;
            $appuser->first_name = $gmailuser->getName();
            $appuser->email = $gmailuser->getEmail();
            $appuser->oauth_provider = 'google';
            $appuser->oauth_uid = $gmailuser->getId();
            $appuser->picture = $gmailuser->getAvatar();
            $appuser->status = 1;
            $appuser->enc_email = md5($gmailuser->getEmail());
            $appuser->sub_exp = $exp;
            $appuser->created_at = date('Y-m-d H:i:s');
            $appuser->save();


            $arr = array('user_id' => $appuser->id,'role_id' => 2,'created_at' => date('Y-m-d H:i:s'));
            $dd = DB::table('user_role')->insert($arr);

            $arr = array('user_id' => $appuser->id);
            $ii = DB::table('user_measurements')->insert($arr);
            $up = DB::table('user_profile')->insert($arr);
            
            $users = User::where('email',$gmailuser->getEmail())->first();
            Auth::login($users,true);
            return redirect('/knitter/dashboard');
        }else{
             Auth::login($user,true);
            return redirect('/knitter/dashboard');
        }
    }
}

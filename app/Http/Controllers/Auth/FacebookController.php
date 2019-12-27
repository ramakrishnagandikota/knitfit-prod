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

class FacebookController extends Controller
{
    function login_with_fb(Request $request){
        return Socialite::driver('facebook')->redirect();
    }

    function fb_login_success(Request $request){
       try{
            $socialuser = Socialite::driver('facebook')->user();
        }catch (\Exception $e){
            Session::flash('error','Unable to login.Try again after some time.');
            return redirect('login');
        }

        $user = User::where('email',$socialuser->getEmail())->first();
        

        if(! $user){

            $y = date('Y') + 1; $m = date('m'); $d = date('d');
            $exp = $d.'-'.$m.'-'.$d;

            $appuser = new User;
            $appuser->first_name = $socialuser->getName();
            $appuser->email = $socialuser->getEmail();
            $appuser->oauth_provider = 'facebook';
            $appuser->oauth_uid = $socialuser->getId();
            $appuser->picture = $socialuser->getAvatar();
            $appuser->status = 1;
            $appuser->enc_email = md5($socialuser->getEmail());
            $appuser->sub_exp = $exp;
            $appuser->created_at = date('Y-m-d H:i:s');
            $appuser->save();

            $arr = array('user_id' => $appuser->id,'role_id' => 2,'created_at' => date('Y-m-d H:i:s'));
            $dd = DB::table('user_role')->insert($arr);

            $arr = array('user_id' => $appuser->id);
            $ii = DB::table('user_measurements')->insert($arr);
            $up = DB::table('user_profile')->insert($arr);
            
            $users = User::where('email',$socialuser->getEmail())->first();
            Auth::login($users,true);
            return redirect('/knitter/dashboard');
        }else{
             Auth::login($user,true);
            return redirect('/knitter/dashboard');
        }

    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Mail\NewsletterMail;
use App\Mail\NewsletterAdminMail;
use App\Mail\ContactFormMail;
use DB;

class Frontendcontroller extends Controller
{
    function notify_us(Request $request){
        $token = md5(time());
        if(Auth::check()){
            $uid = Auth::user()->id;
            $name = Auth::user()->first_name.' '.Auth::user()->last_name;
        }else{
            $uid = 0;
            $name = '';
        }

        $details = [
            'detail'=>'detail',
            'name'  => ucwords($name),
            'email' =>$request->email,
            'token' => $token
             ];

        $details1 = [
            'detail'=>'detail',
            'name'  => ucwords($name),
            'email' =>$request->email,
            'token' => $token
             ];

    	$check = DB::table('newsletters')->where('email',$request->email)->first();

    	if($check){
            if($check->status == 1){
                return 2;
                exit;
            }else{
                $array = array('token' => $token,'status' => 1,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);
                $ins = DB::table('newsletters')->update($array);

                $this->send_notify_email($details);
                $this->send_admin_notify_email($details1);
            }
    	}else{
            $array = array('user_id' => $uid,'email' => $request->email,'token' => $token,'status' => 1,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);
                $ins = DB::table('newsletters')->insert($array);
                $this->send_notify_email($details);
                $this->send_admin_notify_email($details1);
        }

            if($ins){
                return 0;
            }else{
                return 1;
            }

	} 

    function send_notify_email($details){
        \Mail::to($details['email'])->send(new NewsletterMail($details));
    }

    function send_admin_notify_email($details1){
        \Mail::to(env('EMAIL_ADMIN'))->send(new NewsletterAdminMail($details1));
    }


    function newsletter_unscbscribe(Request $request){
        $token = $request->token;
        $check = DB::table('newsletters')->where('token',$token)->first();

        if($check){
            if($check->status == 0){
                return view('newsletters/already-unsubscribed');
            }else{
                $array = array('status' => 0);
                DB::table('newsletters')->where('token',$token)->update($array);
                return view('newsletters/news-unsubscribed');
            }
        }else{
            return view('newsletters/nonews-subscribed');
        }
    }


    function contact_us(Request $request){
        $token = md5(time());
        $array = array('name' => $request->name,'email' => $request->email,'subject' => $request->subject,'message' => $request->message,'token' => $token,'created_at' => date('Y-m-d H:i:s'),'ipaddress' => $_SERVER['REMOTE_ADDR']);

        $details = [
            'detail'=>'detail',
            'name'  => ucwords($array['name']),
            'email' =>$array['email'],
            'subject' =>$array['subject'],
            'message' =>$array['message'],
            'token' => $token
             ];

        \Mail::to(env('EMAIL_ADMIN'))->send(new ContactFormMail($details));

        $ins = DB::table('contact_form')->insert($array);
            if($ins){
                return 0;
            }else{
                return 1;
            }
    }
}

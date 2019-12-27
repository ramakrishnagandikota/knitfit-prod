<?php

namespace App;
use Auth;
use App\Friendrequest;

trait FriendRequestableTrait
{
    public function friendrequest()
    {
        return $this->morphMany(Friendrequest::class,'friendrequestable')->latest();
    }

    public function sendRequest($request)
    {
		
        $friend = new Friendrequest();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $request->id;
        $friend->ipaddress = $_SERVER['REMOTE_ADDR'];

        $this->friendrequest()->save($friend);
        return $friend;
    }
}

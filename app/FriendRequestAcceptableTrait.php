<?php

namespace App;
use Auth;
use App\Friends;

trait FriendRequestAcceptableTrait
{
    public function friendrequestaccept()
    {
        return $this->morphMany(Friends::class,'friendrequestacceptable')->latest();
    }

    public function acceptRequest($request)
    {
        $friend = new Friends();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $request->id;
        $friend->ipaddress = $_SERVER['REMOTE_ADDR'];
        $this->friendrequestaccept()->save($friend);

        $friends = new Friends();
        $friends->friend_id = Auth::user()->id;
        $friends->user_id = $request->id;
        $friends->ipaddress = $_SERVER['REMOTE_ADDR'];
        $this->friendrequestaccept()->save($friends);

        return $friend;
    }
}

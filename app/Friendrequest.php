<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendrequest extends Model
{
	use FriendRequestableTrait;

    protected $table = 'friend_request';

    protected $fillable = ['user_id','friend_id'];

    public function friendrequestable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

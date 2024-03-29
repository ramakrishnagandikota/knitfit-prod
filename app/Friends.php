<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
	use FriendRequestAcceptableTrait;
	
    protected $table = 'friends';

    protected $fillable = ['user_id','friend_id'];

    public function friendrequestacceptable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

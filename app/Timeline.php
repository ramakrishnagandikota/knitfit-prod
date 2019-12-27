<?php

namespace App;
use Auth;
use App\User;
use App\Timelinecomments;


use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
	use CommentableTrait,PostlikableTrait;
    protected $table = 'timeline';

      public function user()
    {
        return $this->belongsTo(User::class);
    }
}

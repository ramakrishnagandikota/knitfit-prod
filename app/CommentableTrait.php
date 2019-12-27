<?php

namespace App;
use Auth;
use App\Timelinecomments;

trait CommentableTrait
{
    public function comment()
    {
        return $this->morphMany(Timelinecomments::class,'commentable')->latest();
    }

    public function addComment($request)
    {
        $comment = new Timelinecomments();
        $comment->user_id = Auth::user()->id;
        $comment->timeline_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->ipaddress = $_SERVER['REMOTE_ADDR'];

        $this->comment()->save($comment);
        return $comment;
    }
}

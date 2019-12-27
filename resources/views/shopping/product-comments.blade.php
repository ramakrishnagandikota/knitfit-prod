
@if(count($comments) > 0)
                                        <ul class="comment-section">
@foreach($comments as $comm)

<?php 
$vote = DB::table('product_comment_votes_unvote')->where('comment_id',$comm->id)->where('vote',1)->count();
$unvote = DB::table('product_comment_votes_unvote')->where('comment_id',$comm->id)->where('unvote',1)->count();
if(Auth::check()){
$vo = DB::table('product_comment_votes_unvote')->where('user_id',Auth::user()->id)->where('comment_id',$comm->id)->where('vote',1)->where('unvote',0)->count();
$unvo = DB::table('product_comment_votes_unvote')->where('user_id',Auth::user()->id)->where('comment_id',$comm->id)->where('unvote',1)->where('vote',0)->count();
$picture = 'resources/assets/assets/user-image-.png';
}else{
    $vo = 0;
    $unvo = 0;
    $picture = 'resources/assets/assets/user-image-.png';
}

?>
                                            
<li style="width: 100%;">
<div class="media"><img src="{{ asset($picture) }}" alt="Generic placeholder image">
    <div class="media-body">
        <h6>{{$comm->name}} <span>( {{date('dS F Y')}} at {{date('H:i A')}})</span></h6>
        <p>{{$comm->comment}}</p>
        <ul class="comnt-sec">
            <li><a href="javascript:;" id="tup{{$comm->id}}" data-id="{{$comm->id}}" data-pid="{{$pro->id}}" class="tup"><i class="fa @if(Auth::check()) @if($vo == 0) fa-thumbs-o-up @else fa-thumbs-up @endif @else fa-thumbs-o-up @endif" aria-hidden="true"></i>(<span id="up{{$comm->id}}">{{$vote}}</span>)</a></li>
            <li><a href="javascript:;" id="tdown{{$comm->id}}" class="tdown" data-id="{{$comm->id}}" data-pid="{{$pro->id}}"><i class="fa @if(Auth::check()) @if($unvo == 0) fa-thumbs-o-down @else fa-thumbs-down @endif @else fa-thumbs-o-down @endif" aria-hidden="true"></i>(<span id="down{{$comm->id}}">{{$unvote}}</span>)</a></li>
        </ul>
    </div>
</div>
</li>
@endforeach

                                        </ul>
                                        @else
<p class="text-center">NO COMMENTS TO SHOW.</p>
                                    @endif 
                                    <br>
                                    <div class="col-md-7 pull-right">
                                    {{$comments->links()}}
                                    </div>
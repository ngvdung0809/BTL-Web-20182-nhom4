<div class="row binhluan">
    <img class="col-sm-2" src="{{ asset('/storage/' . $newComment->user->image) }}" style="width:60px; height:30px; border-radius:50%">
    <div class="col cmt">
        <span><a>{{$newComment->user->username}}: </a>{{$newComment->comment}}</span>
    </div>
</div>

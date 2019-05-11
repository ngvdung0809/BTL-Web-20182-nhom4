@extends('home.layout')
@section('content')
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{$filmEpisode->film->name}}</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Tập</a></li>
						<li> <span class="ion-ios-arrow-right"></span>{{$filmEpisode->episode}}</li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
        <div class="container" >
            <div class="row ">
                <div class="col-xs-12 col-sm-6 col-md-8 ">
                    <div class="wrapper" >
                       @if($number_link >= 1)
                       @foreach ($filmEpisode->server as $key=> $server  )
                           @if($key==0)
                           <video autoplay id="videoplayer" width="900" controls poster="{{ asset('/storage/' . $filmEpisode->image) }}" >
                            <source src="{{$server->link}}" type="video/mp4" id="link-video">
                            Your browser does not support HTML5 video.
                         </video>
                           @else
                           @endif
                       @endforeach
                       @elseif($number_link == 0)
                           <h3>Nội dung đang cập nhật</h3>
                       @else
                       @endif
                    </div>
                </div>
                <div class="col-xs-6 col-md-4">
                    <div class="episode" >
                        <h5>Danh sách tập phim</h5>
                        <br>
                        <div class="border-ep" id="style-1">
                             <ul class="list-unstyled" >
                                 @foreach ($sortEpisode as $episode )
                                 <li class="list" style="margin-bottom: 5px;">
                                        <a href="{{ route('watch_film',['id' => $episode->id] )}}">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <img src="{{ asset('/storage/' . $episode->image) }}" alt="703728" width="80%" style="border-radius: 3px;">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>Tập {{$episode->episode}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                 @endforeach
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @foreach ($filmEpisode->server as $server )
            <button type="button" class="change-server" link="{{$server->link}}">{{$server->name}}</button>
            @endforeach

            <p></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="description">
                        <h4>Nội dung:</h4>
                        <br>
                        <p>{{$filmEpisode->content}}</p>
                    </div>
                </div>
            </div>
            <br>
            <h4>Bình luận:</h4>
            <br>
            <div class="row">
                <div class="col-md-8 ">
                    <textarea  class="md-textarea form-control" rows="3" placeholder="nhập bình luận của bạn" id="ipComment"></textarea>
                    <button id="send-comment" onclick="PostComment({{$filmEpisode->film->id}})" >Gửi bình luận</button>
                    <div class="comment" id="newComment">
                        @foreach ($filmEpisode->film->comments as $item)
                            <div class="row binhluan">
                                <img class="col-sm-2" src="{{ asset('/storage/' . $item->user->image) }}" style="width:60px; height:30px; border-radius:50%">
                                <div class="col cmt">
                                    <span><a>{{$item->user->username}}: </a>{{$item->comment}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
<style>
    .border-ep{
        overflow-y: scroll;
        overflow-x: hidden;
         height:382px;
    }
    .cmt{
    display:inline-block;
    font-family:  Arial;
    font-size: 100%;
    width: 90%;
    background-color:#c4cad3;
    border-radius: 3px;
}
.binhluan{
    margin-bottom: 4px;
}
.comment{

    background-color: #dce2ed;
    padding: 5px;
    border-radius: 3px;

}
.change-server{
    border-radius: 3px;
    background-color: #8b8ca5;

}
#send-comment{
    margin-bottom: 4px;
    background-color: #c4cad3;
    border-radius: 3px;
}

    #style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #dce2ed;
}
textarea{
    border-radius: 3px;
    margin-bottom: 4px;
}

#style-1::-webkit-scrollbar
{
	width: 6px;
	background-color: #dce2ed;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}

</style>
@endsection
@section('js')
<script>
    $(".change-server").click(function(){
        $('#videoplayer').get(0).pause();
        $('#link-video').attr('src', $(this).attr('link'));
        $('#videoplayer').get(0).load();
     //$('#'+videoID).attr('poster', newposter); //Change video poster
        $('#videoplayer').get(0).play();
    });
   function PostComment(i){
    var comment = $('#ipComment').val();
    // alert(comment);
    var id = i;
    if (comment != "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
        $.ajax({
        type: 'post',
        url: '/home/comment',
        data: { comment: comment, id: id },
        success: function (data) {
           if(data.success=="true"){
             //alert(data.html);
             $('#ipComment').val("");
             $('#newComment').append(data.html);
           }
           else if(data.success=="false"){
               alert(data.html);
           }
        }
    });
    }else if(comment==''){
        alert('Bạn chưa nhập bình luận');
    }
   }

</script>
@endsection

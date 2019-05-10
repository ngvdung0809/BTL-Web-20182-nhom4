<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.list', ['comments' => $comments]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('admin_comment_list')->with('success', 'Comment has been deleted successfully!');
    }

    public function search(Request $request){
    	$content = $request->input('content');
    	$type = $request->input('type');
    	if($type == 'film'){
    		//'name', 'like', '%' . Input::get('name') . '%'

    		//$comments = Comment::where('', '=', $content)->get();
    		$q = DB::table('comment')
    					->join('film', 'comment.film_id', '=', 'film.id')
    					->where('film.name', 'like', '%' .$content. '%')
    					->select('film.id')
    					->first();
    		if(empty($q)){
    			$comments = null;
    		}else{
    			$id = $q->id;
    			$comments = Comment::where('film_id', $id)->get();
    		}

    	}else{
			$q = DB::table('comment')
    					->join('users', 'comment.user_id', '=', 'users.id')
    					->where('users.name', 'like', '%' .$content. '%')
    					->select('users.id')
    					->first();
    		if(empty($q)){
    			$comments = null;
    		}else{
    			$id = $q->id;
    			$comments = Comment::where('user_id', $id)->get();
    		}
    	}
    	return view('admin.comment.search', ['content' => $content, 'type' => $type, 'comments'=>$comments]);
    }


    public function PostComment(Request $request){
        if(Auth::check()){
            $comment = $request->comment;
            $film_id=$request->id;
            $newComment=new Comment();
            $newComment->film_id=$film_id;
            $newComment->comment=$comment;
            $newComment->user_id=Auth::user()->id;
            $newComment->save();
            $true="true";
            $data=view("home/watch-film/comment",compact('newComment'))->render();
            return response()->json(['html'=>$data,'success'=>$true]);
        }else{
            $data="Bạn chưa đăng nhập";
            $false="false";
            return response()->json(['html'=>$data,'success'=>$false]);
        }

    }
}

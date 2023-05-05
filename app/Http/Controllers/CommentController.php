<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        if(Auth::user()){
            $user = User::where('id',Auth::user()->id)->first();
            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->property_id = $request->announcement;
            $comment->comment = $request->comment;
            $comment->raiting = $request->rating;

            $comment->save();
            $announcement = Property::find($request->announcement);
            $comment_count = Comment::where('property_id',$request->announcement)->count();
            $data = array(
                'date' => $comment->created_at->format('Y-m-d H:m'),
                'name' => $comment->user->first_name.' '.$comment->user->last_name ,
                'comment' => $comment->comment,
                'rating' => number_format($comment->raiting),
                'comment_count' => $comment_count,
                'designation' => $announcement->designation,
            );
            return $data;
        }
        else{
            $res = 'error';
            return $res;
        }

    }

}

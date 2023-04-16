<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

            $data = array(
                'date' => $comment->created_at->format('Y-m-d H:m'),
                'name' => $comment->user->first_name.' '.$comment->user->last_name ,
                'comment' => $comment->comment,
                'rating' => number_format($comment->raiting),
            );
            return $data;
        }
        else{
            $res = 'error';
            return $res;
        }

    }

}

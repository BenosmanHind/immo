<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TheHocineSaad\LaravelAlgereography\Models\Daira;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class FrontController extends Controller
{
    //

    public function detailAnnouncement($slug){
        $announcement = Property::where('slug',$slug)->first();
        $other_announcements = Property::where('wilaya',$announcement->wilaya)->where('slug','!=',$slug)->get();

        $comments = Comment::where('property_id',$announcement->id)->get();
        $comment_count = Comment::where('property_id',$announcement->id)->count();
        $rating = Comment::where('property_id',$announcement->id)->avg('raiting');
        $nbr_comment = 0;
        if(Auth::user()){
        $nbr_comment = Comment::where('property_id',$announcement->id)->where('user_id',Auth::user()->id)->count();
        }

         if($announcement->status == 1){
            $wilaya = Wilaya::find($announcement->wilaya);
            $daira = Daira::find($announcement->daira);
            if(Auth::user()){
                $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
            }
            else{
                $favorite = session()->get('favorite_id');
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
            }
            return view('detail-announcement',compact('announcement','wilaya','daira','nbr_comment','comments','comment_count','count_favorite_lines','rating','other_announcements'));
        }
         else{
            if(Auth::user()){
                if(Auth::user()->type == 'admin' || Auth::user()->id == $announcement->user_id){
                    $wilaya = Wilaya::find($announcement->wilaya);
                    $daira = Daira::find($announcement->daira);
                    if(Auth::user()){
                        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
                    }
                    else{
                        $favorite = session()->get('favorite_id');
                        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
                    }
                    return view('detail-announcement',compact('announcement','wilaya','daira','nbr_comment','comments','comment_count','count_favorite_lines','rating','other_announcements'));
                }
                else{
                    return abort(404, 'Not found');
                }
            }
            else{
                if($announcement->status == 1){
                    $wilaya = Wilaya::find($announcement->wilaya);
                    $daira = Daira::find($announcement->daira);
                    if(Auth::user()){
                        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
                    }
                    else{
                        $favorite = session()->get('favorite_id');
                        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
                    }
                    return view('detail-announcement',compact('announcement','wilaya','daira','nbr_comment','comments','comment_count','count_favorite_lines','rating','other_announcements'));
                }
                else{
                    return abort(404, 'Not found');
                }
            }
      }
}

}

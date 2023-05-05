<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index(){
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        $notifications = Notification::where('user_id',Auth::user()->id)->get();
        $count_notification = Notification::where('user_id',Auth::user()->id)->count();
        return view('notifications',compact('notifications','count_notification','count_favorite_lines'));
    }
    public function destroy($id){
        $notification = Notification::find($id);
        $notification->delete();
        $count_notification = Notification::where('user_id',Auth::user()->id)->count();
        return  $count_notification;
    }
}

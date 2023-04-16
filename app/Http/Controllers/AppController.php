<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Feedback;
use App\Models\Property;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function app(){
        $announcements = Property::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $count_announcement = Property::where('user_id',Auth::user()->id)->count();
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('app',compact('announcements','count_announcement','count_favorite_lines'));
    }

    public function modalDelete($id){
        $announcement = Property::find($id);
        return view('modal-delete',compact('announcement'));
    }

    public function storeFeedback(Request $request){
     $announcement = Property::find($request->id);
     $announcement->status = 3;
     $announcement->save();
     $feedback = new Reaction();
     $feedback->property_id = $request->id;
     $feedback->status = $request->checked;
     $feedback->save();
     return 1;
    }



}

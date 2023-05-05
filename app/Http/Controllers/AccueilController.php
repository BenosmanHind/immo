<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Property;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class AccueilController extends Controller
{
    //
    public function categoryAnnouncement($id){
        $announcements = Property::where('category_id',$id)->where('status',1)->get();
        $category = Category::find($id);
        $categories = Category::all();
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('category-announcements',compact('announcements','categories','category','count_favorite_lines'));
    }

    public function accueil(){
        $announcements = Property::where('status',1)->limit(8)->orderBy('created_at','desc')->get();
        $announcements_vente = Property::where('type',0)->where('status',1)->orderBy('created_at','desc')->get();
        $announcements_location = Property::where('type',1)->where('status',1)->orderBy('created_at','desc')->get();
        $categories = Category::all();
        $wilayas = Wilaya::all();
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('/welcome-2',compact('announcements','announcements_vente','announcements_location','categories','wilayas','count_favorite_lines'));
    }

    public function search(Request $request){
        $type = $request->type;
        $category = $request->category;
        $wilaya = $request->wilaya;
        $announcements = Property::where('type', 'like', "%{$type}%")->where('category_id', 'like', "%{$category}%")->where('wilaya', $wilaya)->orderBy('created_at','desc')->get();
        if(Auth::user()){
            $search = new Search();
            $search->type = $type;
            $search->category = $category;
            $search->wilaya = $wilaya;
            $search->user_id = Auth::user()->id;
            $search->save();
        }

        $categories = Category::all();
        $count_announcement = $announcements->count();
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('search-announcements',compact('announcements','categories','category','count_announcement','count_favorite_lines'));
    }
}

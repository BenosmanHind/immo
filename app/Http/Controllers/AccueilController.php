<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function categoryAnnouncement($id){
        $announcements = Property::where('category_id',$id)->where('status',1)->get();
        $category = Category::find($id);
        $categories = Category::all();
        return view('category-announcements',compact('announcements','categories','category'));
    }
}

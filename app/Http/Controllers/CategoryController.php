<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('created_at',"desc")->get();

        return view('admin.add-category',compact('categories'));
    }
    public function store(Request $request){
        $category = new Category();
        $category->designation = $request->designation;
        $category->save();
        return redirect()->back();
    }
}

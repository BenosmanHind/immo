<?php

namespace App\Http\Controllers;

use App\Models\Property;
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
        $announcements = Property::where('user_id',Auth::user()->id)->get();
        $count_announcement = Property::where('user_id',Auth::user()->id)->count();
        return view('app',compact('announcements','count_announcement'));
    }
}

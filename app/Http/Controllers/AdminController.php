<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $registrations = User::where('type','customer')->orderBy('created_at','desc')->limit('5')->get();
        $announcements = Property::orderBy('created_at','desc')->limit('5')->get();

        $count_announcement = Property::count();
        $count_registration = User::where('type','customer')->count();
        $count_comment = Comment::count();
        $announcement_warning = Property::where('status',0)->count();
        $announcement_validate = Property::where('status',1)->count();
        $announcement_cancel = Property::where('status',2)->count();
        return view('admin.dashboard-admin',compact('registrations','announcements','count_announcement','count_registration','count_comment','announcement_warning','announcement_validate','announcement_cancel'));

    }
}

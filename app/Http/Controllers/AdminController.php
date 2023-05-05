<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Property;
use App\Models\Reaction;
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
        $announcement_delete = Property::where('status',3)->count();

        $feedback_option1 = Reaction::where('status','option1')->count();
        $feedback_option2 = Reaction::where('status','option2')->count();
        $feedback_option3 = Reaction::where('status','option3')->count();

        $top_customers = Property::selectRaw('count(*) as count')->selectRaw('user_id')->orderBy('count','desc')->groupBy('user_id')->get();

        return view('admin.dashboard-admin',compact('registrations','announcements','count_announcement','count_registration','count_comment','announcement_warning','announcement_validate','announcement_cancel','feedback_option1','feedback_option2','feedback_option3','announcement_delete','top_customers'));

    }
}

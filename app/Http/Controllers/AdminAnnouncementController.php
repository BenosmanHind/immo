<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAnnouncementController extends Controller
{
    //
    public function index(){
        return view('admin.announcements');
    }
}

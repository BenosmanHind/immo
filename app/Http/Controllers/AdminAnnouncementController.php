<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class AdminAnnouncementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $announcements = Property::orderBy('created_at','desc')->get();
        return view('admin.announcements',compact('announcements'));
    }
    public function edit($id){
        $announcement = Property::find($id);
        return view('admin.modal-edit-announcement',compact('announcement'));
        }

        public function update($id , Request $request){
            $announcement = Property::find($id);
            $announcement->status = $request->status;
            $announcement->save();
            return $announcement;
        }
}

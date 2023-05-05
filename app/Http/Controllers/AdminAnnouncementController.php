<?php

namespace App\Http\Controllers;

use App\Mail\AnnouncementMail;
use App\Mail\NewsletterMail;
use App\Mail\NotificationMail;
use App\Models\Newsletter;
use App\Models\Notification;
use App\Models\Property;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            if($request->status == 1 || $request->status == 2 ){
                Mail::to($announcement->user->email)->send(new AnnouncementMail($request));

            }
            if($request->status == 1){
             $newsletters = Newsletter::all();
             foreach($newsletters as $newsletter){
                Mail::to($newsletter->email)->send(new NewsletterMail($announcement->slug));
                }
            $searchs = Search::where('type',$announcement->type)->where('category',$announcement->category_id)->where('wilaya',$announcement->wilaya)->get();
            foreach($searchs as $search){
                Mail::to($search->user->email)->send(new NotificationMail($announcement->slug));
                $notification = new Notification();
                $notification->user_id = $search->user->id;
                $notification->property_id = $announcement->id;
                $notification->save();
            }
            }
            return $announcement;
        }
}

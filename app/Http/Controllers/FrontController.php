<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TheHocineSaad\LaravelAlgereography\Models\Daira;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class FrontController extends Controller
{
    //

    public function detailAnnouncement($slug){
        $announcement = Property::where('slug',$slug)->first();
         if($announcement->status == 1){
            $wilaya = Wilaya::find($announcement->wilaya);
            $daira = Daira::find($announcement->daira);
            return view('detail-announcement',compact('announcement','wilaya','daira'));
        }
         else{
            if(Auth::user()){
                if(Auth::user()->type == 'admin' || Auth::user()->id == $announcement->user_id){
                    $wilaya = Wilaya::find($announcement->wilaya);
                    $daira = Daira::find($announcement->daira);
                    return view('detail-announcement',compact('announcement','wilaya','daira'));
                }
                else{
                    return abort(404, 'Not found');
                }
            }
            else{
                if($announcement->status == 1){
                    $wilaya = Wilaya::find($announcement->wilaya);
                    $daira = Daira::find($announcement->daira);
                    return view('detail-announcement',compact('announcement','wilaya','daira'));
                }
                else{
                    return abort(404, 'Not found');
                }
            }
      }
}

}

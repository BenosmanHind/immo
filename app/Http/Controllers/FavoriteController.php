<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Favoriteline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //
    public function store(Request $request){
        if(Auth::user()){
            $favorit = Favorite::where('user_id',Auth::user()->id)->first();
            if($favorit){
                $announcement_exist = Favoriteline::where('property_id',$request->input('id'))->where('favorite_id',$favorit->id)->first();
                if($announcement_exist){
                    $data = array(
                    'qtes' => 1,
                    );
                    return $data;
                }
                else{
                    $favorit_line = new Favoriteline();
                    $favorit_line->property_id = $request->input('id');
                    $favorit_line->favorite_id = $favorit->id;
                    $favorit_line->save();
                    $nbr_favorit = Favoriteline::where('favorite_id',$favorit->id)->count();
                    $data = array(
                        'nbr_favorit' => $nbr_favorit,
                        'designation' => $favorit_line->property->designation,
                        'image' => $favorit_line->property->images[0]->link,
                        'qtes' => 0,
                    );
                    return $data;
                }
            }
        }
        else{
            $favorit = session()->get('favorite_id');
            if($favorit){
                $announcement_exist = Favoriteline::where('property_id',$request->input('id'))->where('favorite_id',$favorit)->first();
                if($announcement_exist){
                    $data = array(
                    'qtes' => 1,
                    );
                    return $data;
                }
                else{
                    $favorit_line = new Favoriteline();
                    $favorit_line->property_id = $request->input('id');
                    $favorit_line->favorite_id = $favorit;
                    $favorit_line->save();
                    $nbr_favorit = Favoriteline::where('favorite_id',$favorit)->count();
                    $data = array(
                        'nbr_favorit' => $nbr_favorit,
                        'designation' => $favorit_line->property->designation,
                        'image' => $favorit_line->property->images[0]->link,
                        'qtes' => 0,
                    );
                    //session()->put('favorite_id', $favorit->id);
                    return $data;
                }
         }
         else{
            $favorit = new Favorite();
            $favorit->save();
            $favorit_line = new Favoriteline();
            $favorit_line->property_id = $request->input('id');
            $favorit_line->favorite_id = $favorit->id;
            $favorit_line->save();
            $nbr_favorit = Favoriteline::where('favorite_id',$favorit->id)->count();
            $data = array(
                'nbr_favorit' => $nbr_favorit,
                'designation' => $favorit_line->property->designation,
                'image' => $favorit_line->property->images[0]->link,
                'qtes' => 0,
            );
            session()->put('favorite_id', $favorit->id);
            return $data;
         }
    }
}
    public function favoriteList(){
        if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->get();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $favorite_lines = Favoriteline::where('favorite_id',$favorite)->get();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }

        return view('favorite',compact('favorite_lines','count_favorite_lines','favorite'));
    }
    public function deleteFavorite($id){
        $favoriteline = Favoriteline::find($id);
         if(Auth::user()){
           $favorite = Favorite::where('user_id',Auth::user()->id)->first();
           if($favoriteline->favorite_id == $favorite->id) {
            $favoriteline->delete();
            $count_favorite_lines = $favorite->favoritelines->count();
            $data = array(
                'count_favorite_lines' => $count_favorite_lines,

            );
            return $data;
           }
           else{
            abort(404, 'Page not found');
           }
        }
        else{
            $favorite = session()->get('favorite_id');
            if($favoriteline->favorite_id == $favorite) {
                $favoriteline->delete();
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
                $data = array(
                    'count_favorite_lines' => $count_favorite_lines,

                );
                return $data;
               }
               else{
                abort(404, 'Page not found');
               }
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Paper;
use App\Models\Paymentcondition;
use App\Models\Property;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TheHocineSaad\LaravelAlgereography\Models\Daira;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;
use Illuminate\Support\Str;
class AnnouncementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        $categories = Category::all();
        return view('add-announcement-step-one',compact('categories'));
    }
    public function stepTwo($category , $type){
        $wilayas = Wilaya::all();
        return view('add-announcement-step-two',compact('category','type','wilayas'));
    }
    public function getDaira($id){
        $dairas = Daira::where('wilaya_id',$id)->get();
        return $dairas;
    }

    public function store(Request $request){
        $announcement = new Property();
        $announcement->designation = $request->designation;
        $announcement->user_id = 1;
        $announcement->category_id = $request->category;
        $announcement->type = $request->type;
        $announcement->description = $request->description;
        $announcement->short_description = $request->short_description;
        $announcement->superficie = $request->superficie;
        $announcement->price = $request->price;
        $announcement->piece = $request->piece;
        $announcement->etage = $request->etage;
        $announcement->quartie = $request->quartier;
        $announcement->lien_map = $request->lien_map;
        $announcement->wilaya = $request->wilaya;
        $announcement->daira = $request->daira;
        $announcement->slug = str::slug($request->designation);
        $announcement->status = 0;
        $announcement->save();
       if($request->conditions){
            foreach($request->conditions as $condition){
                $payment_condition = new Paymentcondition();
                //$condition->property_id = $announcement->id;
                $payment_condition->designation = $condition;
                $announcement->paymentConditions()->save($payment_condition);
            }
        }
        if($request->specifications){
            foreach($request->specifications as $item){
                $specification = new Specification();
                //$specification->property_id = $announcement->id;
                $specification->designation = $item;
                $announcement->specifications()->save($specification);
            }
        }
        if($request->papers){
            foreach($request->papers as $line){
                $paper = new Paper();
                //$paper->property_id = $announcement->id;
                $paper->designation = $line;
                $announcement->papers()->save($paper);
            }
        }
        $hasFileOne = $request->hasFile('photos');
      //  dd($request->photos);
        $hasFileTwo = $request->hasFile('photoprincipale');
        if($hasFileTwo){
            $destination = 'public/images/properties';
            $path = $request->file('photoprincipale')->store($destination);
            $storageName = basename($path);
            $image = new Image();
            $image->type = 1;
            $image->link= $storageName;
            $announcement->images()->save($image);
        }
        if($hasFileOne){
            foreach($request->file('photos') as $file){
                $destination = 'public/images/properties';
                $path = $file->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->type = 2;
                $image->link= $storageName;
                $announcement->images()->save($image);
            }
            }
            return redirect('/app');
         }
}

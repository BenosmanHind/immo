<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Favoriteline;
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
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('add-announcement-step-one',compact('categories','count_favorite_lines'));
    }
    public function stepTwo($category , $type){
        $wilayas = Wilaya::all();
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        return view('add-announcement-step-two',compact('category','type','wilayas','count_favorite_lines'));
    }
    public function getDaira($id){
        $dairas = Daira::where('wilaya_id',$id)->get();
        return $dairas;
    }

    public function store(Request $request){
        $announcement = new Property();
        $announcement->designation = $request->designation;
        $announcement->user_id = Auth::user()->id;
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

         public function edit($id){
            $announcement = Property::find($id);
            $categories = Category::all();
            if(Auth::user()){
                $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
            }
            else{
                $favorite = session()->get('favorite_id');
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
            }
            return view('edit-announcement-step-one',compact('announcement','categories','count_favorite_lines'));
         }


         public function editStepTwo($category , $type , $id){
           $announcement = Property::find($id);
            $wilaya = Wilaya::find($announcement->wilaya);
            $wilayas = Wilaya::where('id','!=',$wilaya->id)->get();
            $daira = Daira::find($announcement->daira);
            $dairas = Daira::where('wilaya_id',$wilaya->id)->where('id','!=',$daira->id)->get();
            $images = Image::where('property_id',$id)->where('type',2)->get();

            $array_papers_p = array();
            $array_specifications_p = array();
            $array_conditions_p = array();

            $papers = Paper::where('property_id',$id)->get();
            $specifications = Specification::where('property_id',$id)->get();
            $conditions = Paymentcondition::where('property_id',$id)->get();
             foreach($papers as $paper){
                array_push($array_papers_p, $paper->designation);
             }
             foreach($specifications as $specification){
                array_push( $array_specifications_p, $specification->designation);
             }
             foreach($conditions as $condition){
                array_push($array_conditions_p, $condition->designation);
             }
            $array_papers = array();
            $array_specifications = array();
            $array_conditions = array();

            array_push($array_papers , 'Promotion immobilière');
            array_push($array_papers , 'Acte notarié');
            array_push($array_papers , 'Acte dans l indivision');
            array_push($array_papers , 'Papier timbr');
            array_push($array_papers , 'Décision');
            array_push($array_papers , 'Livret fancié');
            array_push($array_papers , 'Permis de construir');

            array_push($array_specifications , 'Jardin');
            array_push($array_specifications , 'Eléctricité');
            array_push($array_specifications , 'Gaz');
            array_push($array_specifications , 'Eau');
            array_push($array_specifications , 'Meublé');
            array_push($array_specifications , 'Garage');

            array_push($array_conditions , 'Promesse de vente possible');
            array_push($array_conditions , 'Paiement par tranche possible');
            array_push($array_conditions , 'Crédit bancair possible');

            $resultats_p = array_diff($array_papers,$array_papers_p);
            $resultats_s = array_diff($array_specifications,$array_specifications_p);
            $resultats_c = array_diff($array_conditions,$array_conditions_p);
            if(Auth::user()){
                $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
            }
            else{
                $favorite = session()->get('favorite_id');
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
            }
            return view('edit-announcement-step-two',compact('category','type','wilayas','announcement','wilaya','daira','dairas','images','resultats_p','resultats_s','resultats_c','papers','specifications','conditions','count_favorite_lines'));
        }

        public function update(Request $request , $id){
            $announcement = Property::find($id);
            $papers = Paper::where('property_id',$id)->get();
            $specifications = Specification::where('property_id',$id)->get();
            $conditions = Paymentcondition::where('property_id',$id)->get();
            $images = Image::where('property_id',$id)->get();
            foreach($papers as $paper){
                $paper->delete();
            }
            foreach($specifications as $specification){
                $specification->delete();
            }
            foreach($conditions as $condition){
                $condition->delete();
            }

            $announcement->designation = $request->designation;
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
                $image = Image::where('property_id',$id)->where('type',1)->first();
                $image->delete();

                $destination = 'public/images/properties';
                $path = $request->file('photoprincipale')->store($destination);
                $storageName = basename($path);
                $image = new Image();
                $image->type = 1;
                $image->link= $storageName;
                $announcement->images()->save($image);
            }
            if($hasFileOne){
                $images = Image::where('property_id',$id)->where('type',2)->get();
                foreach($images as $image){
                    $image->delete();
                }
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
        public function destroy($id){
            $announcement = Property::find($id);
            $papers = Paper::where('property_id',$id)->get();
            $specifications = Specification::where('property_id',$id)->get();
            $conditions = Paymentcondition::where('property_id',$id)->get();
            $images = Image::where('property_id',$id)->get();
            foreach($papers as $paper){
                $paper->delete();
            }
            foreach($specifications as $specification){
                $specification->delete();
            }
            foreach($conditions as $condition){
                $condition->delete();
            }
            foreach($images as $image){
                $image->delete();
            }
            $announcement->delete();
            return redirect('/app');
        }
}

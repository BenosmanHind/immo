<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/about', function () {
    if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
    }
    else{
        $favorite = session()->get('favorite_id');
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
    }
    return view('/about',compact('count_favorite_lines'));
});



Route::get('/contact', function () {
    if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
    }
    else{
        $favorite = session()->get('favorite_id');
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
    }
    return view('contact',compact('count_favorite_lines'));
});
Route::get('/message', function () {
    if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
    }
    else{
        $favorite = session()->get('favorite_id');
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
    }
    return view('messages',compact('count_favorite_lines'));
});

Route::get('/', [App\Http\Controllers\AccueilController::class, 'accueil']);
Route::get('/search', [App\Http\Controllers\AccueilController::class, 'search']);
Route::get('/alert', function () {
    if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
    }
    else{
        $favorite = session()->get('favorite_id');
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
    }
    return view('alert-message',compact('count_favorite_lines'));
});
Route::get('/test-login', function () {
    if(Auth::user()){
        $favorite = Favorite::where('user_id',Auth::user()->id)->first();
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
    }
    else{
        $favorite = session()->get('favorite_id');
        $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
    }
    return view('test-login',compact('count_favorite_lines'));
});


Route::resource('/admin/categories',CategoryController::class)->middleware('can:admin');
Route::resource('/admin/customers',AdminCustomerController::class)->middleware('can:admin');
Route::resource('/admin/announcements',AdminAnnouncementController::class)->middleware('can:admin');
Route::resource('/admin/comments',AdminCommentController::class)->middleware('can:admin');
Route::resource('admin/profil',AdminProfilController::class)->middleware('can:admin');
Route::resource('/admin',AdminController::class)->middleware('can:admin');
Route::get('/edit-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'edit']);
Route::post('/update-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'update']);
Route::get('/edit-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'edit']);
Route::post('/update-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'update']);


Route::resource('/app/announcement',AnnouncementController::class)->middleware('can:customer');
Route::resource('/app/profile',ProfilController::class)->middleware('can:customer');
Route::get('/app/announcement-step-two/{category}/{type}', [App\Http\Controllers\AnnouncementController::class, 'stepTwo'])->middleware('can:customer');
Route::get('/app/edit-announcement-step-two/{category}/{type}/{id}', [App\Http\Controllers\AnnouncementController::class, 'editStepTwo'])->middleware('can:customer');
Route::get('/get-dairas/{id}', [App\Http\Controllers\AnnouncementController::class, 'getDaira']);
Route::get('/announcement/{slug}', [App\Http\Controllers\FrontController::class, 'detailAnnouncement']);
Route::get('/category/{id}', [App\Http\Controllers\AccueilController::class, 'categoryAnnouncement']);
Route::get('/app', [App\Http\Controllers\AppController::class, 'app'])->middleware('can:customer');
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'favoriteList'])->middleware('can:customer');
Route::delete('/favorite/{id}', [App\Http\Controllers\FavoriteController::class, 'deleteFavorite']);
Route::get('show-model-delete/{id}', [App\Http\Controllers\AppController::class, 'modalDelete']);
Route::get('show-model-message/{announcement}/{recipient}', [App\Http\Controllers\MessageController::class, 'modalMessage']);
Route::get('messages/{id}', [App\Http\Controllers\MessageController::class, 'indexMessages']);
Route::post('store-feedback', [App\Http\Controllers\AppController::class, 'storeFeedback']);
Route::post('contact', [App\Http\Controllers\ContactController::class, 'contact']);
Route::post('add-message', [App\Http\Controllers\MessageController::class, 'addMessage']);
Route::resource('/comment',CommentController::class);
Route::resource('/favorit',FavoriteController::class);
Route::resource('/newsletter',NewsletterController::class);
Route::resource('/messages',MessageController::class);
Route::resource('app/messages',MessageController::class)->middleware('can:customer');
Route::resource('app/notifications',NotificationController::class)->middleware('can:customer');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

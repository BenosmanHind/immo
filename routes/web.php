<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfilController;
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
    return view('/contact',compact('count_favorite_lines'));
});

Route::get('/', [App\Http\Controllers\AccueilController::class, 'accueil']);
Route::get('/search', [App\Http\Controllers\AccueilController::class, 'search']);
Route::get('/alert', function () {
    return view('alert-message');
});
Route::get('/test-login', function () {
    return view('test-login');
});

Route::resource('/admin/categories',CategoryController::class);
Route::resource('/admin/customers',AdminCustomerController::class);
Route::resource('/admin/announcements',AdminAnnouncementController::class);
Route::resource('/admin/comments',AdminCommentController::class);
Route::resource('/admin',AdminController::class);


Route::resource('/app/announcement',AnnouncementController::class);
Route::resource('/app/profile',ProfilController::class);
Route::get('/app/announcement-step-two/{category}/{type}', [App\Http\Controllers\AnnouncementController::class, 'stepTwo']);
Route::get('/app/edit-announcement-step-two/{category}/{type}/{id}', [App\Http\Controllers\AnnouncementController::class, 'editStepTwo']);
Route::get('/get-dairas/{id}', [App\Http\Controllers\AnnouncementController::class, 'getDaira']);
Route::get('/announcement/{slug}', [App\Http\Controllers\FrontController::class, 'detailAnnouncement']);
Route::get('/edit-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'edit']);
Route::post('/update-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'update']);
Route::get('/edit-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'edit']);
Route::post('/update-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'update']);
Route::get('/category/{id}', [App\Http\Controllers\AccueilController::class, 'categoryAnnouncement']);
Route::get('/app', [App\Http\Controllers\AppController::class, 'app']);
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'favoriteList']);
Route::delete('/favorite/{id}', [App\Http\Controllers\FavoriteController::class, 'deleteFavorite']);
Route::get('show-model-delete/{id}', [App\Http\Controllers\AppController::class, 'modalDelete']);
Route::post('store-feedback', [App\Http\Controllers\AppController::class, 'storeFeedback']);
Route::post('contact', [App\Http\Controllers\ContactController::class, 'contact']);
Route::resource('/comment',CommentController::class);
Route::resource('/favorit',FavoriteController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

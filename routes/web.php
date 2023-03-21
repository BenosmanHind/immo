<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminController;
use App\Models\Property;

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
    return view('/about');
});
Route::get('/contact', function () {
    return view('/contact');
});
Route::get('/', function () {
    $announcements = Property::where('status',1)->limit(8)->orderBy('created_at','desc')->get();
    $announcements_vente = Property::where('type',0)->where('status',1)->orderBy('created_at','desc')->get();
    $announcements_location = Property::where('type',1)->where('status',1)->orderBy('created_at','desc')->get();
    return view('/welcome-2',compact('announcements','announcements_vente','announcements_location'));
});
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

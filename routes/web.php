<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return redirect('/login');
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
Route::get('/get-dairas/{id}', [App\Http\Controllers\AnnouncementController::class, 'getDaira']);
Route::get('/announcement/{slug}', [App\Http\Controllers\FrontController::class, 'detailAnnouncement']);
Route::get('/edit-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'edit']);
Route::post('/update-status/{id}', [App\Http\Controllers\AdminCustomerController::class, 'update']);
Route::get('/edit-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'edit']);
Route::post('/update-status-announcement/{id}', [App\Http\Controllers\AdminAnnouncementController::class, 'update']);

Route::get('/app', [App\Http\Controllers\FrontController::class, 'app']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

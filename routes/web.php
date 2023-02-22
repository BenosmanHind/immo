<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommentController;
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
Route::get('/admin', function () {
    return view('admin.dashboard-admin');
});
Route::get('/app', function () {
    return view('app');
});
Route::resource('/admin/categories',CategoryController::class);
Route::resource('/admin/customers',AdminCustomerController::class);
Route::resource('/admin/announcements',AdminAnnouncementController::class);
Route::resource('/admin/comments',AdminCommentController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

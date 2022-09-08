<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('allpost');
Route::get('home',   [BlogAdminController::class, 'dashboard'])->name('home');
Route::get('login',   [BlogAdminController::class, 'login'])->name('login');
Route::post('authenticate',   [BlogAdminController::class, 'authenticateuser'])->name('authenticate');
Route::group(['prefix' => 'kt-amin'], function () {
    Route::get('create', [BlogAdminController::class, 'create'])->name('createadmin');
    Route::post('store',  [BlogAdminController::class, 'store'])->name('store');
    Route::get('blog-admins',  [BlogAdminController::class, 'index'])->name('alladmin');
    Route::get('blog-admin-posts',   [PostController::class, 'postbyid'])->name('mypost')->middleware('auth:blogadmin');
    
});

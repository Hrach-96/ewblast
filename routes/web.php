<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutUsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function(){
	Route::group(['prefix'=>'admin'],function(){
		Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
	});
	Route::group(['prefix'=>'about-us'],function(){
		Route::get('/list', [AboutUsController::class, 'list'])->name('admin.about_us.list');
		Route::any('/add-new', [AboutUsController::class, 'add_new'])->name('admin.about_us.add_new');
		Route::any('/delete', [AboutUsController::class, 'delete'])->name('admin.about_us.delete');
		Route::any('/edit', [AboutUsController::class, 'edit'])->name('admin.about_us.edit');
	});
});
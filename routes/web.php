<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\NewsController;
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
	Route::group(['prefix'=>'news-categories'],function(){
		Route::get('/category-list', [NewsController::class, 'category_list'])->name('admin.news.category.list');
		Route::any('/category-add-new', [NewsController::class, 'category_add_new'])->name('admin.news.category.add_new');
		Route::any('/category-delete', [NewsController::class, 'category_delete'])->name('admin.news.category.delete');
		Route::any('/category-edit', [NewsController::class, 'category_edit'])->name('admin.news.category.edit');
	});
	Route::group(['prefix'=>'news'],function(){
		Route::get('/news-list', [NewsController::class, 'news_list'])->name('admin.news.list');
		Route::any('/news-add-new', [NewsController::class, 'news_add_new'])->name('admin.news.add_new');
		Route::any('/news-delete', [NewsController::class, 'news_delete'])->name('admin.news.delete');
		Route::any('/news-edit', [NewsController::class, 'news_edit'])->name('admin.news.edit');
	});
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EducationalResourcesController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\LangController;
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


Auth::routes();

Route::get('/', [MainController::class, 'home'])->name('main.home');
Route::get('/about-us', [MainController::class, 'about_us_view'])->name('about.us.display');
Route::get('/education-resources', [MainController::class, 'education_resources_view'])->name('education.resources.display');
Route::get('/news', [MainController::class, 'news_view'])->name('news.display');
Route::get('/events', [MainController::class, 'events_view'])->name('events.display');
Route::get('/trainings', [MainController::class, 'trainings_view'])->name('trainings.display');
Route::get('/news-category', [MainController::class, 'news_category_view'])->name('news.category.display');
Route::get('/events-category', [MainController::class, 'events_category_view'])->name('events.category.display');
Route::get('/trainings-category', [MainController::class, 'trainings_category_view'])->name('trainings.category.display');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
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
		Route::any('/news-update-display-main', [NewsController::class, 'update_display_main'])->name('news.update.display.main');
	});
	Route::group(['prefix'=>'training-categories'],function(){
		Route::get('/category-list', [TrainingController::class, 'category_list'])->name('admin.training.category.list');
		Route::any('/category-add-new', [TrainingController::class, 'category_add_new'])->name('admin.training.category.add_new');
		Route::any('/category-delete', [TrainingController::class, 'category_delete'])->name('admin.training.category.delete');
		Route::any('/category-edit', [TrainingController::class, 'category_edit'])->name('admin.training.category.edit');
	});
	Route::group(['prefix'=>'training'],function(){
		Route::get('/training-list', [TrainingController::class, 'training_list'])->name('admin.training.list');
		Route::any('/training-add-new', [TrainingController::class, 'training_add_new'])->name('admin.training.add_new');
		Route::any('/training-delete', [TrainingController::class, 'training_delete'])->name('admin.training.delete');
		Route::any('/training-edit', [TrainingController::class, 'training_edit'])->name('admin.training.edit');
		Route::any('/training-update-display-main', [TrainingController::class, 'update_display_main'])->name('training.update.display.main');
	});
	Route::group(['prefix'=>'events-categories'],function(){
		Route::get('/events-category-list', [EventsController::class, 'category_list'])->name('admin.events.category.list');
		Route::any('/events-category-add-new', [EventsController::class, 'category_add_new'])->name('admin.events.category.add_new');
		Route::any('/events-category-delete', [EventsController::class, 'category_delete'])->name('admin.events.category.delete');
		Route::any('/events-category-edit', [EventsController::class, 'category_edit'])->name('admin.events.category.edit');
	});
	Route::group(['prefix'=>'events'],function(){
		Route::get('/events-list', [EventsController::class, 'events_list'])->name('admin.events.list');
		Route::any('/events-add-new', [EventsController::class, 'events_add_new'])->name('admin.events.add_new');
		Route::any('/events-delete', [EventsController::class, 'events_delete'])->name('admin.events.delete');
		Route::any('/events-edit', [EventsController::class, 'events_edit'])->name('admin.events.edit');
	});
	Route::group(['prefix'=>'educational-resources'],function(){
		Route::get('/educational-resources-list', [EducationalResourcesController::class, 'list'])->name('admin.educational.resources.list');
		Route::any('/educational-resources-add-new', [EducationalResourcesController::class, 'add_new'])->name('admin.educational.resources.add_new');
		Route::any('/educational-resources-delete', [EducationalResourcesController::class, 'delete'])->name('admin.educational.resources.delete');
		Route::any('/educational-resources-edit', [EducationalResourcesController::class, 'edit'])->name('admin.educational.resources.edit');
	});
	Route::group(['prefix'=>'settings'],function(){
		Route::any('/site-settings-edit', [SiteSettingsController::class, 'edit'])->name('admin.site.settings.edit');
	});
});
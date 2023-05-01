<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NewsCategories;
use App\Models\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $layoutCategoryFolder = 'admin.news_category';
    protected $layoutNewsFolder = 'admin.news';
	public function category_list(){
		$lists = NewsCategories::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutCategoryFolder}.list",compact('lists'));
	}
	public function news_list(){
		$lists = News::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutNewsFolder}.list",compact('lists'));
	}
	public function update_display_main(Request $request){
		$news = News::findOrFail($request->news_id);
		$news->display_main = $request->val;
		$news->save();
		return true;
	}
	public function category_delete(Request $request){
		$category = NewsCategories::findOrFail($request->id);
		$category->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.news.category.list');
	}
	public function news_delete(Request $request){
		$news = News::findOrFail($request->id);
		$news->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.news.list');
	}
	public function category_add_new(Request $request){
		if($request->isMethod('post')){
			NewsCategories::create([
				'name_am' => $request->name_am,
				'name_en' => $request->name_en,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.add_new");
		}
		return redirect()->route('admin.news.category.list');
	}
	public function news_add_new(Request $request){
		$categories = NewsCategories::all();
		if($request->isMethod('post')){
			$image_url = '';
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/news');
				$image_url = explode('public/',$image_url)[1];
			}
			$file_path = '';
			if ($request->hasFile('file_path')) {
				$file_path = $request->file_path->store('public/news_files');
				$file_path = explode('public/',$file_path)[1];
			}
			News::create([
				'title_am' => $request->title_am,
				'title_en' => $request->title_en,
				'category_id' => $request->category_id,
				'content_am' => $request->content_am,
				'content_en' => $request->content_en,
				'file_path' => $file_path,
				'image' => $image_url,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutNewsFolder}.add_new",compact('categories'));
		}
		return redirect()->route('admin.news.list');
	}
	public function category_edit(Request $request){
		$category = NewsCategories::findOrFail($request->id);
		if($request->isMethod('post')){
			$category->name_am = $request->name_am;
			$category->name_en = $request->name_en;
			$category->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.edit",compact('category'));
		}
		return redirect()->route('admin.news.category.list');
	}
	public function news_edit(Request $request){
		$news = News::findOrFail($request->id);
		$categories = NewsCategories::all();
		if($request->isMethod('post')){
			$image_url = $news->image;			
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/news');
				$image_url = explode('public/',$image_url)[1];
			}
			$file_path = $news->file_path;
			if ($request->hasFile('file_path')) {
				$file_path = $request->file_path->store('public/news_files');
				$file_path = explode('public/',$file_path)[1];
			}
			$news->title_am = $request->title_am;
			$news->title_en = $request->title_en;
			$news->category_id = $request->category_id;
			$news->content_am = $request->content_am;
			$news->content_en = $request->content_en;
			$news->file_path = $file_path;
			$news->image = $image_url;
			$news->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutNewsFolder}.edit",compact('news','categories'));
		}
		return redirect()->route('admin.news.list');
	}
}

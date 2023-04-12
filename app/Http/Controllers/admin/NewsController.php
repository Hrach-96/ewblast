<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NewsCategories;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $layoutFolder = 'admin.category';
	public function category_list(){
		$lists = NewsCategories::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutFolder}.list",compact('lists'));
	}
	public function category_delete(Request $request){
		$category = NewsCategories::findOrFail($request->id);
		$category->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.news.category.list');
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
			return view("{$this->layoutFolder}.add_new");
		}
		return redirect()->route('admin.news.category.list');
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
			return view("{$this->layoutFolder}.edit",compact('category'));
		}
		return redirect()->route('admin.news.category.list');
	}
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use App\Models\Training;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    protected $layoutCategoryFolder = 'admin.training_category';
    protected $layoutTrainingFolder = 'admin.training';
	public function category_list(){
		$lists = TrainingCategories::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutCategoryFolder}.list",compact('lists'));
	}
	public function training_list(){
		$lists = Training::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutTrainingFolder}.list",compact('lists'));
	}
	public function update_display_main(Request $request){
		$training = Training::findOrFail($request->training_id);
		$training->display_main = $request->val;
		$training->save();
		return true;
	}
	public function category_delete(Request $request){
		$category = TrainingCategories::findOrFail($request->id);
		$category->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.training.category.list');
	}
	public function training_delete(Request $request){
		$training = Training::findOrFail($request->id);
		$training->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.training.list');
	}
	public function category_add_new(Request $request){
		if($request->isMethod('post')){
			TrainingCategories::create([
				'name_am' => $request->name_am,
				'name_en' => $request->name_en,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.add_new");
		}
		return redirect()->route('admin.training.category.list');
	}
	public function training_add_new(Request $request){
		$categories = TrainingCategories::all();
		if($request->isMethod('post')){
			$image_url = '';
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/training');
				$image_url = explode('public/',$image_url)[1];
			}
			Training::create([
				'title_am' => $request->title_am,
				'title_en' => $request->title_en,
				'category_id' => $request->category_id,
				'content_am' => $request->content_am,
				'content_en' => $request->content_en,
				'image' => $image_url,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutTrainingFolder}.add_new",compact('categories'));
		}
		return redirect()->route('admin.training.list');
	}
	public function category_edit(Request $request){
		$category = TrainingCategories::findOrFail($request->id);
		if($request->isMethod('post')){
			$category->name_am = $request->name_am;
			$category->name_en = $request->name_en;
			$category->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.edit",compact('category'));
		}
		return redirect()->route('admin.training.category.list');
	}
	public function training_edit(Request $request){
		$training = Training::findOrFail($request->id);
		$categories = TrainingCategories::all();
		if($request->isMethod('post')){
			$image_url = $training->image;			
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/training');
				$image_url = explode('public/',$image_url)[1];
			}
			$training->title_am = $request->title_am;
			$training->title_en = $request->title_en;
			$training->category_id = $request->category_id;
			$training->content_am = $request->content_am;
			$training->content_en = $request->content_en;
			$training->image = $image_url;
			$training->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutTrainingFolder}.edit",compact('training','categories'));
		}
		return redirect()->route('admin.training.list');
	}
}

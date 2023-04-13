<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EventsCategories;
use App\Models\Events;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    protected $layoutCategoryFolder = 'admin.events_category';
    protected $layoutEventsFolder = 'admin.events';
	public function category_list(){
		$lists = EventsCategories::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutCategoryFolder}.list",compact('lists'));
	}
	public function events_list(){
		$lists = Events::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutEventsFolder}.list",compact('lists'));
	}
	public function category_delete(Request $request){
		$category = EventsCategories::findOrFail($request->id);
		$category->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.events.category.list');
	}
	public function events_delete(Request $request){
		$events = Events::findOrFail($request->id);
		$events->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.events.list');
	}
	public function category_add_new(Request $request){
		if($request->isMethod('post')){
			EventsCategories::create([
				'name_am' => $request->name_am,
				'name_en' => $request->name_en,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.add_new");
		}
		return redirect()->route('admin.events.category.list');
	}
	public function events_add_new(Request $request){
		$categories = EventsCategories::all();
		if($request->isMethod('post')){
			$image_url = '';
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/events');
				$image_url = explode('public/',$image_url)[1];
			}
			$file_path = '';
			if ($request->hasFile('file_path')) {
				$file_path = $request->file_path->store('public/events_files');
				$file_path = explode('public/',$file_path)[1];
			}
			Events::create([
				'title_am' => $request->title_am,
				'title_en' => $request->title_en,
				'category_id' => $request->category_id,
				'content_am' => $request->content_am,
				'content_en' => $request->content_en,
				'image' => $image_url,
				'file_path' => $file_path,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutEventsFolder}.add_new",compact('categories'));
		}
		return redirect()->route('admin.events.list');
	}
	public function category_edit(Request $request){
		$category = EventsCategories::findOrFail($request->id);
		if($request->isMethod('post')){
			$category->name_am = $request->name_am;
			$category->name_en = $request->name_en;
			$category->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutCategoryFolder}.edit",compact('category'));
		}
		return redirect()->route('admin.events.category.list');
	}
	public function events_edit(Request $request){
		$events = Events::findOrFail($request->id);
		$categories = EventsCategories::all();
		if($request->isMethod('post')){
			$image_url = $events->image;			
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/events');
				$image_url = explode('public/',$image_url)[1];
			}
			$file_path = $events->file_path;
			if ($request->hasFile('file_path')) {
				$file_path = $request->file_path->store('public/events_files');
				$file_path = explode('public/',$file_path)[1];
			}
			$events->title_am = $request->title_am;
			$events->title_en = $request->title_en;
			$events->category_id = $request->category_id;
			$events->content_am = $request->content_am;
			$events->content_en = $request->content_en;
			$events->image = $image_url;
			$events->file_path = $file_path;
			$events->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutEventsFolder}.edit",compact('events','categories'));
		}
		return redirect()->route('admin.events.list');
	}
}

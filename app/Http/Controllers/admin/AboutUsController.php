<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
	protected $layoutFolder = 'admin.about-us';
	public function list(){
		$lists = AboutUs::orderBy('ordering')->paginate(10);
		return view("{$this->layoutFolder}.list",compact('lists'));
	}
	public function delete(Request $request){
		$about_us = AboutUs::findOrFail($request->id);
		$about_us->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.about_us.list');
	}
	public function add_new(Request $request){
		if($request->isMethod('post')){
			$image_url = '';			
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/about_us');
				$image_url = explode('public/',$image_url)[1];
			}
			AboutUs::create([
				'title_am' => $request->title_am,
				'title_en' => $request->title_en,
				'address_am' => $request->address_am,
				'address_en' => $request->address_en,
				'ordering' => $request->ordering,
				'image' => $image_url,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutFolder}.add_new");
		}
		return redirect()->route('admin.about_us.list');
	}
	public function edit(Request $request){
		$about_us = AboutUs::findOrFail($request->id);
		if($request->isMethod('post')){
			$image_url = $about_us->image;			
			if ($request->hasFile('image')) {
				$image_url = $request->image->store('public/about_us');
				$image_url = explode('public/',$image_url)[1];
			}
			$about_us->title_am = $request->title_am;
			$about_us->title_en = $request->title_en;
			$about_us->address_am = $request->address_am;
			$about_us->address_en = $request->address_en;
			$about_us->ordering = $request->ordering;
			$about_us->image = $image_url;
			$about_us->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutFolder}.edit",compact('about_us'));
		}
		return redirect()->route('admin.about_us.list');
	}
}

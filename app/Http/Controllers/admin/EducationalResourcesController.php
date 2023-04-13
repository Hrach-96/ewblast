<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationalResources;
use Illuminate\Support\Facades\Storage;

class EducationalResourcesController extends Controller
{
	protected $layoutFolder = 'admin.educational-resources';
	public function list(){
		$lists = EducationalResources::orderBy('id','desc')->paginate(10);
		return view("{$this->layoutFolder}.list",compact('lists'));
	}
	public function delete(Request $request){
		$education_resource = EducationalResources::findOrFail($request->id);
		$education_resource->delete();
		toastr()->success('Data has been deleted successfully!');
		return redirect()->route('admin.educational.resources.list');
	}
	public function add_new(Request $request){
		if($request->isMethod('post')){
			EducationalResources::create([
				'title_am' => $request->title_am,
				'content_am' => $request->content_am,
				'title_en' => $request->title_en,
				'content_en' => $request->content_en,
			]);
			toastr()->success('Data has been added successfully!');
		}
		else{
			return view("{$this->layoutFolder}.add_new");
		}
		return redirect()->route('admin.educational.resources.list');
	}
	public function edit(Request $request){
		$education_resource = EducationalResources::findOrFail($request->id);
		if($request->isMethod('post')){
			$education_resource->title_am = $request->title_am;
			$education_resource->content_am = $request->content_am;
			$education_resource->title_en = $request->title_en;
			$education_resource->content_en = $request->content_en;
			$education_resource->save();
			toastr()->success('Data has been Updated successfully!');
		}
		else{
			return view("{$this->layoutFolder}.edit",compact('education_resource'));
		}
		return redirect()->route('admin.educational.resources.list');
	}
}

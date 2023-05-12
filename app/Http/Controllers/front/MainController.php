<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\EducationalResources;
use App\Models\NewsCategories;
use App\Models\Training;
use App\Models\AboutUs;
use App\Models\Events;
use App\Models\News;
use App\Http\Controllers\Controller;
use Config;

class MainController extends Controller
{
    protected $layoutCategoryFolder = 'front';
    public function home(){
		return view("{$this->layoutCategoryFolder}.home.index");
    }
    public function about_us_view(Request $request){
    	$aboutUsInfo = AboutUs::findOrFail($request->id);
		return view("{$this->layoutCategoryFolder}.about_us.main",compact('aboutUsInfo'));
    }
    public function education_resources_view(Request $request){
    	$educationResourcesInfo = EducationalResources::findOrFail($request->id);
		return view("{$this->layoutCategoryFolder}.education_resources.main",compact('educationResourcesInfo'));
    }
    public function news_view(Request $request){
    	$news = News::findOrFail($request->id);
		return view("{$this->layoutCategoryFolder}.news.main",compact('news'));
    }
    public function events_view(Request $request){
    	$events = Events::findOrFail($request->id);
		return view("{$this->layoutCategoryFolder}.events.main",compact('events'));
    }
    public function trainings_view(Request $request){
    	$trainings = Training::findOrFail($request->id);
		return view("{$this->layoutCategoryFolder}.trainings.main",compact('trainings'));
    }
    public function news_category_view(Request $request){
    	$news = News::where('category_id',$request->id)->get();
		return view("{$this->layoutCategoryFolder}.news_category.main",compact('news'));
    }
    public function events_category_view(Request $request){
    	$events = Events::where('category_id',$request->id)->get();
		return view("{$this->layoutCategoryFolder}.events_category.main",compact('events'));
    }
    public function trainings_category_view(Request $request){
    	$trainings = Training::where('category_id',$request->id)->get();
		return view("{$this->layoutCategoryFolder}.trainings_category.main",compact('trainings'));
    }
}

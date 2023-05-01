<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\NewsCategories;
use App\Models\News;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $layoutCategoryFolder = 'front.home';
    public function home(){
		return view("{$this->layoutCategoryFolder}.index");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	protected $layoutFolder = 'admin';
	public function home(){
		return view("{$this->layoutFolder}.home.index");
	}
}

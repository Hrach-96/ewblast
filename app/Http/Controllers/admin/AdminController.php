<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class AdminController extends Controller
{
	protected $layoutFolder = 'admin';
	public function logout(){
		Session::flush();
        Auth::logout();
        return redirect('home');
	}
	public function home(){
		return view("{$this->layoutFolder}.home.index");
	}
}

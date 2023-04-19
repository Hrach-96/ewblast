<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SiteSettings;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{
    protected $layoutFolder = 'admin.site_settings';
    public function edit(Request $request){
		if($request->isMethod('post')){
			// $row = SiteSettings::where('key',$re)
			foreach($request->except('_token') as $key=>$value){
				updateSiteSetting($key,$value);
			}
			toastr()->success('Data has been deleted successfully!');
			return redirect()->route('admin.site.settings.edit');
		}
		return view("{$this->layoutFolder}.edit");
    }
}

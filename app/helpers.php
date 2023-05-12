<?php
use App\Models\SiteSettings;
  
function getSiteSetting($key){
    return SiteSettings::where('key',$key)->first();    
}  
function mainLang(){
	$lang = 'am';
	if(Request::get('lang')){
		$lang = Request::get('lang');
	}
	return $lang;
}
function trWord($word){
	$lang = 'am';
	if(Request::get('lang')){
		$lang = Request::get('lang');
	}
	return Config::get("lang.".$lang . '.' . $word);
}
function updateSiteSetting($key,$value){
	$setting = SiteSettings::where('key',$key)->first();
	if($setting){
		$setting->update(['value'=>$value]);
	}
	return true;
}

?>
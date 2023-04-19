<?php
use App\Models\SiteSettings;
  
function getSiteSetting($key){
    return SiteSettings::where('key',$key)->first();    
}  
function updateSiteSetting($key,$value){
	$setting = SiteSettings::where('key',$key)->first();
	if($setting){
		$setting->update(['value'=>$value]);
	}
	return true;
}

?>
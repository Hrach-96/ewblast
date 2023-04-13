<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];
    protected $table = 'events';
    public function categoryInfo(){
    	return $this->belongsTo(EventsCategories::class,'category_id','id');
    }
}

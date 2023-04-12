<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];
    protected $table = 'news';
    public function categoryInfo(){
    	return $this->belongsTo(NewsCategories::class,'category_id','id');
    }
}

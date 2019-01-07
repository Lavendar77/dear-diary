<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diaries extends Model
{
    // Get the category that belongs to the diary. 
    public function category()
    {
    	return $this->belongsTo('App\Categories', 'category_id');
    }
}

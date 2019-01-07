<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	// Get the diary associated with the category.
    public function diary()
    {
    	return $this->hasMany('App\Diaries', 'id');
    }
}

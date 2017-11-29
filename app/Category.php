<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Protected $table = 'categories';
	//one category have many posts
	public function posts()
	{
		return $this->hasMany('App\Post');
	}
	
}

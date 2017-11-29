<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   //every posts belongs to one category
   public function category()
	{
		return $this->belongsTo('App\Category');
	}
	 public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}

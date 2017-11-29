<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class BlogController extends Controller
{
    
	
	
	Public function getSingle($slug)
	{
		
		//return $slug;
		$post = Post::where('slug','=',$slug)->first();
		return view('blog.single')->withPost($post);
	}
	Public function getIndex()
	{
		
		//return $slug;
		$post = Post::Paginate(3);
		//$comment = Comment::all();
		return view('blog.index')->withPosts($post);
	}
}

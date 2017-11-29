<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
use Purifier;
use Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
	public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }
	
	public function index()
    {
        $posts = Post::OrderBy('id','desc')->Paginate(5);
		return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all();
		 $tags = Tag::all();
		return view('posts.create')->withCategories($categories)->withTags($tags);
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
		
		//validate the data
		 $this->validate($request, [
        'title' => 'required|max:255',
        'body' => 'required',
		'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
		'featured_img' =>'sometimes|image',
		]);
		
		//srore into dba_close
		$post = new Post;
		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->category_id = $request->category;
		$post->body = Purifier::clean($request->body);
		
		if($request->hasFile('featured_img'))
		{
			$image = $request->file('featured_img');
			$filename = time().".".$image->getClientOriginalExtension();
			$location =public_path('images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);
			$post->image = $filename;
		}
		$post->save();
		
		
		$post->tags()->sync($request->tags,false);
		
		 //display success message
		 Session::flash('success','The Blog post was successfully Saved!!!!');
		 //redirect to another page
		 return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
		
		return view('posts.show')->withPosts($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categories = Category::all();
		 $cats = array();
		 foreach($categories as $category){
		 $cats[$category->id] =  $category->name;
		 
		 }
		 
		 $tags = Tag::all();
		 $tag_array = array();
		 foreach($tags as $tag){
		 $tag_array[$tag->id] =  $tag->name;
		 }
		 
		 $post = Post::find($id);
		
		return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag_array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
		
		$post = Post::find($id);
		
			$this->validate($request, [
			'title' => 'required|max:255',
			'category_id' => 'required|integer',
			'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
			'body' => 'required',
			'featured_img' =>'image',
			]);

			
		
        $post->title = $request->input('title');
		$post->slug = $request->input('slug');
        $post->body = Purifier::clean($request->body);
		$post->category_id = $request->input('category_id');
        
		if($request->hasFile('featured_img'))
		{
			$oldfile  = $post->image;
			$image = $request->file('featured_img');
			$filename = time().".".$image->getClientOriginalExtension();
			$location =public_path('images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);
			
			$post->image = $filename;

            
            Storage::delete($oldfile);	
		}

        $post->save();
		


		if(isset($request->tags)){
		$post->tags()->sync($request->tags,true);
		}
		else{
			$post->tags()->sync(array()); 
		}
		
		Session::flash('success','The post updated successfully!!!');
		 //redirect to another page
		 return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
		
           
		Storage::delete($post->image);	 
		$post->tags()->detach();

		//$post->comments()->detach();	

		$post->delete();
		Session::flash('success','Post deleted successfully!!!');
		 return redirect()->route('posts.index');
    }
}

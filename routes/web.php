<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::resource('employee','EmployeeControler');
Route::resource('employee','EmployeeControler');
Route::resource('pharmacy','PharmacyController');
Auth::routes();

Route::get('/home','HomeController@index');

Route::get('blog/{slug}',['as' =>'blog.single' ,'uses' => 'BlogController@getSingle'])
->where('slug','[\w\d\-\_]+');

Route::get('blog',['as' =>'blog.index' ,'uses' => 'BlogController@getIndex'])
->where('slug','[\w\d\-\_]+');

Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');

Route::get('about','PagesController@getAbout');
Route::get('/','PagesController@getIndex');

Route::resource('posts','PostController');
//categories
Route::resource('categories','CategoryController',['except'=>['create']]);
 //tags
 Route::resource('tags','TagController',['except'=>['create']]);
 
 
 //commets
 
 Route::post('comments/{post_id}',['uses' =>'CommentController@store','as'=>'comments.store']);
 Route::get('comments/{id}/edit',['uses' =>'CommentController@edit','as'=>'comments.edit']);
 Route::put('comments/{id}',['uses' =>'CommentController@update','as'=>'comments.update']);
 Route::delete('comments/{id}',['uses' =>'CommentController@destroy','as'=>'comments.destroy']);
  Route::get('comments/{id}/delete',['uses' =>'CommentController@delete','as'=>'comments.delete']);
?>
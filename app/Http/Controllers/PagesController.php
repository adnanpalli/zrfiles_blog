<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Mail;
class PagesController extends Controller
{
    //
	public function getIndex()
	{
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		
		return view('Pages.welcome')->withPosts($posts);
	}
	public function getAbout()
	{
		
		$fname ="adnan";
		$lname = "palli";
		$full = $fname." ".$lname;
		$email = 'adnanpalli@gmail.com';
		$data = [];
		$data['email']  = $email;
		$data['full']  = $full;
		//return view('Pages.about')->with('Fullname',$full);
		//return view('Pages.about')->withFullname($full)->withEmail($email);
		return view('Pages.about')->withData($data);
		
	}
	public function getContact()
	{
		return view('Pages.contact');
	}
		public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('email.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@devmarketer.io');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}	
}

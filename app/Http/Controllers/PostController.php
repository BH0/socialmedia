<?php 

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller { 
	
	public function getDashboard(Request $reuqest) { 

		$posts = Post::orderBy('created_at', 'desc')->get(); 
		return view('dashboard', ["posts" => $posts]); 
	}
	
	public function postCreatePost(Request $request) { 
		
		$this->validate($request, [
			'body' => 'required|max:40' 
		]); 

		$post = new Post(); 
		$post->body = $request['body']; 
		$message = 'There was an error with your post'; 
		if ($request->user()->post()->save($post)) { 
			$message = "Post succcess"; 
		} 
		return redirect()->route('dashboard')->with(['message' => $message]); 
	} 

	public function getDeletePost($post_id) { 
		$post = Post::where('id', $post_id)->first(); 
	     if (Auth::user() != $post->user) {
            return redirect()->back();
        }
		$post->delete(); 
		return redirect()->route('dashboard')->with(['message' => 'Deleted post']); 
	}
}
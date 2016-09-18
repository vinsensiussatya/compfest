<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comments;

use Auth;

class CommentController extends Controller
{
    public function store(Request $request)
	{
		$user = Auth::user();
		//on_post, from_user, body
		$input['from_user'] = $user->id;
		$input['on_post'] = $request->input('on_post');
		$input['body'] = $request->input('body');
		$slug = $request->input('slug');
		Comments::create( $input );
 
		return redirect('diary/'.$slug)->with('message', 'Comment published'); 	
	}

}

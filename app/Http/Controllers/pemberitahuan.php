<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Diary;

use App\Comments;


use Auth;



class pemberitahuan extends Controller
{
    public function index()
	{
		$diarys = Diary::where('active','1')->orderBy('created_at','desc')->paginate(5);
		$title = 'Latest Posts';
		// return view('home',['pemberitahuan_list' => $pemberitahuan_list])->withPosts($posts)->withTitle($title);
		 return view('home', ['diarys' => $diarys, 'title' => $title]);
		// ->with('pemberitahuan_list', $pemberitahuan_list)

		// return view('home', ['posts' => 'posts']);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//

			return view('diary.create');
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$diary = new Diary();
		$diary->title = $request->get('title');
		$diary->body = $request->get('body');
		$diary->slug = str_slug($diary->title);
		$diary->author_id = $request->user()->id;
		if($request->has('save'))
		{
			$diary->active = 0;
			$message = 'Post saved successfully';
		}
		else
		{
			$diary->active = 1;
			$message = 'Post published successfully';
		}
		$diary->save();
		\Session::flash('flash_message_tambah','');
		return redirect('/')->withMessage($message);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */




	public function show($slug)
	{
		$diary = Diary::where('slug',$slug)->first();

		$comments = Comments::where('on_post',$diary->id)->orderBy('created_at','desc')->paginate(5);
		if($diary)
		{
			if($diary->active == false)
				return redirect('/diary')->withErrors('requested page not found');
			// $comments = $diary->comments;
		}
		else
		{
			return redirect('/diary')->withErrors('requested page not found');
		}
		
return view('diary.show')->with('diary',$diary)->with('comments',$comments);

		// return view('diary.show')->withPost($diary)->withComments($comments);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request,$slug)
	{
		$diary = Diary::where('slug',$slug)->first();
		if($diary && ($request->user()->id == $diary->author_id || $request->user()->is_admin()))
			return view('diary.edit')->with('diary',$diary);
		else
		{
			\Session::flash('flash_message_edit','');
			return redirect('/')->withErrors('you have not sufficient permissions');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//
		$diary_id = $request->input('diary_id');
		$diary = Diary::find($diary_id);
		if($diary && ($diary->author_id == $request->user()->id || $request->user()->is_admin()))
		{
			$title = $request->input('title');
			$slug = str_slug($title);
			$duplicate = Diary::where('slug',$slug)->first();
			if($duplicate)
			{
				if($duplicate->id != $diary_id)
				{
					return redirect('edit/'.$diary->slug)->withErrors('Title already exists.')->withInput();
				}
				else
				{
					$diary->slug = $slug;
				}
			}

			$diary->title = $title;
			$diary->body = $request->input('body');

			if($request->has('save'))
			{
				$diary->active = 0;
				$message = 'Post saved successfully';
				$landing = 'edit/'.$diary->slug;
			}
			else {
				$diary->active = 1;
				$message = 'Post updated successfully';
				$landing = $diary->slug;
			}
			$diary->save();
			\Session::flash('flash_message_edit','');
	 		return redirect('/')->withMessage($message);
		}
		else
		{

			return redirect('/')->withErrors('you have not sufficient permissions');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		//
		$diary = Diary::find($id);
		if($diary && ($diary->author_id == $request->user()->id || $request->user()->is_admin()))
		{
			$diary->delete();
			$data['message'] = 'Post deleted Successfully';
		}
		else
		{
			$data['errors'] = 'Invalid Operation. You have not sufficient permissions';
		}
		\Session::flash('flash_message_hapus','');
		return redirect('/')->with($data);
	}
}



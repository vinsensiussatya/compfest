@extends('layouts.app')

@section('title')
	@if($diary)
		{{ $diary->title }}
		@role(1)
			<button class="btn" style="float: right"><a href="{{ url('edit/'.$diary->slug)}}">Edit Post</a></button>
		@endrole

	@role(2)
	@if(Auth::user()->id == $diary->author_id)
	<button class="btn" style="float: right"><a href="{{ url('edit/'.$diary->slug)}}">Edit Post</a></button>
	@endif
	@endrole

	@role(3)
	@if(Auth::user()->id == $diary->author_id)
	<button class="btn" style="float: right"><a href="{{ url('edit/'.$diary->slug)}}">Edit Post</a></button>
	@endif
	@endrole

@role(4)
	@if(Auth::user()->id == $diary->author_id)
	<button class="btn" style="float: right"><a href="{{ url('edit/'.$diary->slug)}}">Edit Post</a></button>
	@endif
	@endrole

@role(5)
	@if(Auth::user()->id == $diary->author_id)
	<button class="btn" style="float: right"><a href="{{ url('edit/'.$diary->slug)}}">Edit Post</a></button>
	@endif
	@endrole


	@else
		Page does not exist
	@endif
@endsection

@section('title-meta')
<p>{{ $diary->created_at->format('M d,Y \a\t h:i a') }} By Admin</p>
@endsection


@section('content')

@if($diary)
	<div>
		{!! $diary->body !!}
	</div>	
	<div>
		<h2>Leave a comment</h2>
	</div>
	@if(Auth::guest())
		<p>Login to Comment</p>
	@else
		<div class="panel-body">
			<form method="post" action="{{url('/comment/add')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="on_post" value="{{ $diary->id }}">
				<input type="hidden" name="slug" value="{{ $diary->slug }}">
				<div class="form-group">
					<textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
				</div>
				<input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
			</form>
		</div>
	@endif
	
	<div>
		@if($comments)
		<ul style="list-style: none; padding: 0">
			@foreach($comments as $comment)
				<li class="panel-body">
					<div class="list-group">
						<div class="list-group-item">
							<h3>{{ $comment->author->name }}</h3>
							<p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
						</div>
						<div class="list-group-item">
							<p>{{ $comment->body }}</p>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		@endif
	</div>


		
{!!$comments->render()!!}

@else
404 error
@endif



@endsection
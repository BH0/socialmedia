
@extends('layouts.master'); 
@section('content') 

<h3>Dashboard</h3> 
<section> 
	@include('includes.message') 
	<h3>Post Something</h3> 
	<form method="post" action="{{ route('post.create') }}"> 
		<textarea name="body" id="new-post"></textarea> 
		<button type="submit">Post</buttoon>
		<input type="hidden" value="{{ Session::token() }}" name="_token" /> 
	</form> 
</section> 
<section> 
	<h3>Other's posts</h3> 
	<article> 
		@foreach($posts as $post) 
			<article> 
				<p>{{ $post->body }}</p> 
				<em>by {{ $post->user->email }} created: {{ $post->user->created_at }}</em> 
				<div> 
					<a href="#">Like</a> |		
					<a href="#">Dislike</a> |
				   @if(Auth::user() == $post->user) 
                            <a href="#">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
					@endif	
				</div> 
			</article> 
		@endforeach
	</article> 
</section> 

		<!-- Editing was postponed  (may use Fetch API instead of XmlHttpRequest object)
		<div> <!-- Edit Post -- 
                <button type="button">&times;</button>
                <form> Edit: 
                    <textarea name="post-body" id="post-body"></textarea>
                </form> 
                <button type="button">Update</button>
        </div> --> 

@endsection 
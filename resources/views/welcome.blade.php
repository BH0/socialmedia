@extends('layouts.master') 

@section('title')
	Welcome 
@endsection 

@section('content')

	@if (count($errors) > 0) 
	<div class="errors">
		<b>Errors:</b> 
		<ul> 
			@foreach($errors->all() as $error) 
				<li>{{$error}}</li> 
			@endforeach
		</ul> 
	</div> 
	@endif 
	 
	<form action="{{ route('signup') }}" method="post"> 
		<input  type="email" name="email" value="{{ Request::old('email') }}" >
		<input type="password" name="password" value="{{ Request::old('password') }}">
		<input type="submit" value="Signup" />	
		<input type="hidden" name="_token" value="{{ Session::token() }}" />
	</form> 

	<form action="{{ route('signin') }}" method="post"> 
		<input  type="email" name="email" value="{{ Request::old('email') }}">
		<input type="password" name="password" value="{{ Request::old('password') }}">
		<input type="submit" value="Signup" />	
		<input type="hidden" name="_token" value="{{ Session::token() }}" />
	</form> 

@endsection 
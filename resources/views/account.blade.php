
<!-- may change name to user --> 

@extends('layouts.master') 
@section('title') 
	Account 
@endsection 

@section('content') 
    <section>
            <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
                <input type="text" name="email"  value="{{ $user->email}}" id="email">
                <input type="file" name="image" id="image">
				<button type="submit">Save & Update</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token"> 
            </form>
        </div>
    </section>

    @if (Storage::disk('local')->has($user->email . '-' . $user->id . '.jpg'))
		<div class="user-image"> 
			<section>
					<img src="{{ route('account.image', ['filename' => $user->email . '-' . $user->id . '.jpg']) }}" alt="user image">
			</section>
		</div> 
    @endif
@endsection 


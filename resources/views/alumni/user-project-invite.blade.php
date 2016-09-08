
@extends('layout.master')

@section('content')

<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	<div class="form-container container">
		<h1 id="edit-data">Edit and Approve</h1>
		<form method="GET" action="{{ action('ProjectsController@showProject', $boolean['id']) }}">
            {!! csrf_field() !!}
			@foreach ($data as $key => $value)
				<div class="form-group">
					<h3 class="static-option">{{ $key }}: {{ $value }}</h3>
					<input name="{{ $key }}" style="display:none;" type="text" class="form-control edit-option" value="{{ $value }}" >
				</div>
			@endforeach

			@foreach ($boolean as $key => $value)
				@if ($value == 0)
			  	<h4> {{ $key }} </h4>
			  	@endif
			@endforeach

			<div class="container button-container">	  
	  <a type="button" href="{{ action('UsersController@acceptInvite', $user->id) }}" class="btn btn-success" >Accept</a>
	  <a type="submit" href="{{ action('UsersController@rejectInvite', $user->id) }}" class="btn btn-danger" >Reject</a>
</div>




		</form>
	</div>
</div>





@stop
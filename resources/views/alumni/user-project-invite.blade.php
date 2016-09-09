
@extends('layout.master')

@section('content')

<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	<div class="form-container container">
		<h1 id="edit-data">Accept or Pass on Project</h1>
		<form method="GET" action="{{ action('ProjectsController@showProject', $project['id']) }}">
            {!! csrf_field() !!}
			@foreach ($project as $key => $value)
				<div class="form-group">
					<h3 class="static-option">{{ $key }}: {{ $value }}</h3>
					<input name="{{ $key }}" style="display:none;" type="text" class="form-control edit-option" value="{{ $value }}" >
				</div>
			@endforeach

			@foreach ($user as $key => $value)
				@if ($value == 0)
			  	<h4> {{ $key }} </h4>
			  	@endif
			@endforeach

			<div class="container button-container">	  
	  <a type="button" href="{{ action('UsersController@acceptInvite', $user->id) }}" class="btn btn-success" >Accept</a>
	  <a type="submit" href="{{ action('UsersController@rejectInvite', $user->id) }}" class="btn btn-danger" >Pass</a>
</div>




		</form>
	</div>
</div>





@stop
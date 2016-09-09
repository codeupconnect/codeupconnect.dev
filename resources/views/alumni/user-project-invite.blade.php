
@extends('layout.master')

@section('content')

{{ dd( $project, $user )}}

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
		</form>

	<div class="container button-container">
	<form method="POST" action="{{ action('UsersController@acceptInvite') }}">
    {!! csrf_field() !!}  
	  <button name="id" value="{{ $user->id }}" class="btn btn-success" >Accept</button>
	</form>
	<form method="POST" action="{{ action('UsersController@rejectInvite') }}">
    {!! csrf_field() !!}    
	  <button name="id" value="{{ $user->id }}" class="btn btn-danger" >Pass</button>
	</form>
	</div>




		</form>
	</div>
</div>





@stop
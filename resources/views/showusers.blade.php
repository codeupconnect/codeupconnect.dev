@extends('master')

@section('content')
	
	<div class="container">
	 	<div class="row">
	 		<div class="col-sm-4" id="user-info" data-value="{{ $user->url }}">
	 			<h1> {{ $user->name }} </h1>
	 		</div>
	 	</div>
	 </div>

@section('bottom-scripts')
	<script>

		// JS to pull JSON from GitHub API
		// Then format the information to be inserted into page

		var api = $('#user-info').data();
		// api['value'] is now the string we are looking for

		

	</script>
@stop
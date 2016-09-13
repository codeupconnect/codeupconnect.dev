@extends('layout.master')

@section('content')

@include('partials.single-project-view')


	<div class="container col-xs-12">
		<div class="col-md-3">
		</div>
 		<div id="pass-reject" class="col-sm-9">
 			<form method="POST" action="{{ action('UsersController@acceptInvite') }}">
 	   			{!! csrf_field() !!}  
 				<button name="id" value="{{ $user->id }}" class="btn btn-success accept-pass" >Accept</button>
 			</form>
 			<form method="POST" action="{{ action('UsersController@rejectInvite') }}">
 		    	{!! csrf_field() !!}    
 				<button name="id" value="{{ $user->id }}" class="btn btn-danger accept-pass" >Pass</button>
 			</form>
 		</div>
	</div>
</div>


@stop
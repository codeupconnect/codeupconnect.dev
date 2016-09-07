@extends('layout.master')

@section('content')

<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	
	<h4>Project</h4>
	<p><textarea>Yay project</textarea></p>
</div>
<div class="container button-container">	  
	  <button type="button" class="btn btn-success" href="{{ action('UsersController@acceptInvite', $user->id) }}">Accept</button>
	  <button type="submit" class="btn btn-danger" href="{{ action('UsersController@rejectInvite', $user->id) }}">Reject</button>
</div>




@stop
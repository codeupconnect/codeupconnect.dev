@extends('layout.master')

@section('content')
<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	
	<h4>{{ $user->name }}</h4>
	<p>{{ $project->organization_name }}</p>
</div>
<div class="container button-container">	  
	  <!-- {{ action('UsersController@acceptInvite', $user->id) }}
	  {{ action('UsersController@rejectInvite', $user->id) }} -->
</div>




@stop
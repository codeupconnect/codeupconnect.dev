@extends('layout.master')

@section('content')
<h2 class="title">Your Project, Should You Choose to Accept It</h2>

<div class="container">	
	
	<h4>{{ $user->name }}</h4>
	<p>{{ $project->organization_name }}</p>
	<p>{{ $project->project_details }}</p>
</div>





@stop
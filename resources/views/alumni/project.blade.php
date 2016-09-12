@extends('layout.master')

@section('content')

@include('partials.single-project-view')

@include('partials.back-to-projects-btn')

<div>
	<a href="{{ action('UsersController@closeProject') }}" class="btn btn-danger" id="back-to-projects">Back to Projects</a>
</div>

@section('bottom-scripts')

@stop



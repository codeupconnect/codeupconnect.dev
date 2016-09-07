@extends('layout.master')


@section('content')
	

	<h1>Featured Projects</h1>
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Project ID</td>
				<td>Organization</td>
			</tr>
		<thead>
		<tbody>
		@foreach($projects as $project)
			<tr class="table-row" data-href="{{ action('ProjectsController@showComplete', $project->id) }}">
				<td>{{ $project->id }}</td>
				<td>{{ $project->organization_name }} </td>
			</tr>
		@endforeach
		</tbody>
	</table>		

@section('bottom-scripts')
	<script>
		$(document).ready(function($) {
		    $(".table-row").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
	</script>
@stop
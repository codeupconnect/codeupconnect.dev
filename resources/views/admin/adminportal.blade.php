@extends('layout.master')


@section('content')
	

<div class="container admin text-center">
	<h2 class='font-thin' id="header-spacing">Admin Portal</h2>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<td>Project ID</td>
				<td>Status</td>
				<td>Organization</td>
				<td>Project Details</td>
			</tr>
		</thead>
		<tbody>
		@foreach($projects as $project)
			<tr class="table-row" data-href="{{ action('ProjectsController@showProject', $project->id) }}">
				<td>{{ $project->id }}</td>
				<td>{{ $project->status }}</td>
				<td>{{ $project->organization_name }} </td>
				<td>{{ $project->project_details }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>		
@stop


@section('bottom-scripts')
	<script>
		$(document).ready(function($) {
		    $(".table-row").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
	</script>
@stop

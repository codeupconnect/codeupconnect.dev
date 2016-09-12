@extends('layout.master')

@section('content')
<div class="container admin text-center">
	<h3 id="header-spacing" class="teal-font">Approved Projects</h3>
	<div class="container edit">
	<table class="table table-bordered table-striped table-hover tables">
		<thead>
			<tr>
				<td>Project ID</td>
				<td>Organization</td>
				<td>Project Details</td>
			</tr>
		</thead>
		<tbody>
		@foreach($projects as $project)
			<tr>
				<td><a href="{{ action('ProjectsController@showProject', $project->id) }}">{{ $project->id }}</a></td>
				<td>{{ $project->organization_name }} </td>
				<td>{{ $project->project_details }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>		
	{{ $projects->render() }}
</div>

@section('bottom-scripts')
	<script>

		// Get API url from user-info data-value
		var api = $('#user-info').data();
		// api['value'] is now the string we are looking for

		$.getJSON(api['value'], function (data) {
			console.log(data);

			// Enter #id that should be targeted, and data['value'] that should be inserted
			$('#github-id').text(data['login']);
			$('#name').text(data['name']);
		});


	</script>
@stop
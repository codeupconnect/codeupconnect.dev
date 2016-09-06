@extends('layout.master')

@include('partials.navbar')

@section('content')
	<h1>Approved Projects</h1>
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Project ID</td>
				<td>Status</td>
				<td>Organization</td>
				<td>Project Details</td>
				<td>Assigned To</td>
				<td>Team</td>
			</tr>
		<thead>
		<tbody>
		@foreach($projects as $project)
			<tr>
				<td><a href="{{ action('ProjectsController@showProject', $project->id }}"></a></td>
				<td>{{ $project->status }}</td>
				<td>{{ $project->organization_name }} </td>
				<td>{{ $project->project_details }}</td>
				<!-- claimed project team lead -->
				<td>{{ $teamMember->user_id }} </td>
				<!-- accepted invite team members -->
				<td>{{ $teamMember->user_id }} </td>
			</tr>
		@endforeach
		</tbody>
	</table>		
	{{ $projects->render() }}

@include('partials.footer')

@stop


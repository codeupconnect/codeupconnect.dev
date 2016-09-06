@extends('layout.master')

@include('partials.navbar')

@section('content')
	<h1>Admin Portal</h1>
	<table class="table table-bordered table-stripped table-hover">
		<thead>
			<tr>
				<td>Project ID</td>
				<td>Status</td>
				<td>Organization</td>
				<td>Project Details</td>
			</tr>
		<thead>
		<tbody>
		@foreach($projects as $project)
			<tr>
				<a href="{{ action('ProjectsController@showProject', $project->id }}"></a>
				<td>{{ $project->project_id }}</td>
				<td>{{ $project->status }}</td>
				<td>{{ $project->organization_name }} </td>
				<td>{{ $project->project_details }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>		
	{{ $projects->render() }}

@include('partials.footer')

@stop

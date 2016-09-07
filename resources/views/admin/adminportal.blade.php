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
				<td>Edit/Accept</td>
				<td>Reject</td>
			</tr>
		<thead>
		<tbody>
		@foreach($projects as $project)
			<tr>
				<td><a href="{{ action('ProjectsController@showProject', $project->id }}"></a></td>
				<td>{{ $project->status }}</td>
				<td>{{ $project->organization_name }} </td>
				<td>{{ $project->project_details }}</td>
				<td><a href="{{ action('ProjectsController@edit', $project->id)}}">Edit/Accept</td>
				<td><a href="{{ action('ProjectsController@destroy', $project->id)}}">
					{{ csrf_field() }}
	    			{{ method_field("DELETE")}}
	    			<button class="btn btn-danger">Delete</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>		
	{{ $projects->render() }}

@include('partials.footer')

@stop

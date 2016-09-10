@extends('layout.master')

@section('content')

<div class="container">
	<h2 class="static-option text-center teal-font title">{{ $project->organization_name }}</h2>
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- Username/Preference -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Additional Requests:
					</div>
				</div>

				@include('partials.project-menu')

			</div>
		</div>
		<div class="col-md-9">
			<div class="profile-content current-project">
				@include('partials.project-table')
			</div>
		</div>
	</div>
	<div>
		<a href="{{ action('ProjectsController@index') }}" class="btn btn-info" id="back-to-projects">Back to Projects</a>
		</div>
	</div>
</div>

@section('bottom-scripts')


@stop



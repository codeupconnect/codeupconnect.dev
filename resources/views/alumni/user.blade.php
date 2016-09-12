@extends('layout.master')
@section('content')

@include('partials.project-invite')
<div class="container">
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- Profile Pic -->
				<div class="profile-userpic">
					<img src="{{ $myUser->avatar }}" class="img-responsive" alt="">
				</div>
				<!-- Username/Preference -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $myUser->name }}
					</div>
					<div class="profile-usertitle-job">
						{{ $myUser->proficiencies }}
					</div>
				</div>
				@include('partials.user-profile-menu')
			</div>
			<div class="container col-xs-9 add-queue">
				<form action="{{ action('UsersController@enterQueue', $myUser->id) }}" method="POST">
					{!! csrf_field() !!}
					{!! method_field("PUT") !!}
					<button type="submit" class="btn btn-info text-center">
					<i class="glyphicon glyphicon-plus"></i>
					    Add Me to the Queue </button>
				</form>
			</div>
		</div>
		<div class="col-md-9">
			@if($myUser->active_project !== "")
				<div class="profile-content current-project">
					<div class="container">
						<h3>Current Project: {{ $myUser->organization_name }}</h3>
					</div>
					<div>
						<a class="btn btn-info" id="current-project-btn"><i class="glyphicon glyphicon-th-list"></i> Details</a>
					</div>
				</div>
			@endif
			@include('partials.queue')
		</div>
	</div>
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
		
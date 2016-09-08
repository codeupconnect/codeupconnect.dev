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

				<!-- Menu -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="#">
							<i class="fa fa-github"></i>
							{{ $myUser->nickname }} </a>
						</li>
						<li>
							<a href="{{ action('ProjectsController@edit') }}">
							<i class="glyphicon glyphicon-pencil"></i>
							Edit Profile </a>
						</li>
						<li>
							<a href="/{{ $myUser->resume_url }}">
							<i class="glyphicon glyphicon-user"></i>
							Résumé </a>
						</li>
						<li>
							<form method="PUT">
							<a href="{{ action('UsersController@enterQueue', $myUser->id) }}">
							<i class="glyphicon glyphicon-plus"></i>
							Add Me to the Queue </a></form>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="profile-content" id="current-project">
				<div class="container">
					<h3>Current Project: {{ $myUser->active_project }}</h3>
					<div class="container">
						<h4>Current Team:</h4>
					</div>
				</div>
			</div>
			<div class="profile-content col-xs-12" id="queue">
				@include('partials.queue')
				</div>
		</div>
	</div>
</div>
<br>
<br>

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
		
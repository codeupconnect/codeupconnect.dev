@extends('layout.master')



@section('content')

<!-- if user has a project in queue for them to view-->

<div id="alert-notification" class="alert alert-warning" role="alert">
  <strong>Heads up!</strong> You have a project invitation to <a href="#">view.</a>
</div>
	
<div class="container">
	<div class="row user-menu-container" >
		<div class="col-xs-7 bottom-block user-details">
			<div class="row info-portfolio">
				<div class="col-xs-6 no-pad">
					<div class="user-image">
						<img src="/giphy.gif">
					</div>
				</div>
				<div class="col-xs-6 no-pad" id="user-info" data-value="">
					<div class="user-pad font text-center">
						<h3 id="name"></h3>
						<h4><i class="fa fa-check-circle-o"></i> Alumni</h4>
						<i class="fa fa-github"></i><h4 id="github-id"> schmidty</h4>
					</div>
				</div>
			</div>
			<div class="row overview font text-center">
				<h3 class="user-pad">Preferences</h3>
			</div>
		</div>
		<div class="col-xs-4 font">
			<div>
				<h3>Current Project: MyFitSA Website</h3>
				<ul class="user-menu-list">
					<li><h4>Team Members: </h4></li>
					<li><h5> Nick</h5></li>
					<li><h5> Jess</h5></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- <div class="container">
	<div class="row">
		<div class="col-xs-7 info-portfolio" id="user-portfolio">
			<div class="row">
				<div class="user-pad font text-center"><h3 class="user-pad">CodeupConnect Portfolio</h3>
				</div>
			</div>
		</div>
	</div>
</div> -->

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
		
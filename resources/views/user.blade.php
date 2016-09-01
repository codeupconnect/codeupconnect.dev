@extends('master')

@section('content')

<div class="container">
	<div class="row user-menu-container" >
		<div class="col-xs-7 teal user-details">
			<div class="row lavbg">
				<div class="col-xs-6 no-pad">
					<div class="user-image">
						<img src="/giphy.gif">
					</div>
				</div>
				<div class="col-xs-6 no-pad">
					<div class="user-pad profile-font text-center">
						<h3>(user's name)</h3>
						<h4><i class="fa fa-check-circle-o"></i> (freelancer/alumni)</h4>
						<h4><i class="fa fa-github"></i> (github user)</h4>
					</div>
				</div>
			</div>
			<div class="row overview profile-font">
				<h3 class="user-pad">Preferences</h3>
			</div>
		</div>
		<div class="col-xs-4">
			<div>
				<h3>Current Project:</h3>
				<ul class="user-menu-list">
					<li><h4>Team Members: </h4></li>
					<li><h5> (team member)</h5></li>
					<li><h5> (team member)</h5></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-7 lavbg" id="user-portfolio">
			<div class="row">
				<div class="user-pad profile-font"><h3 class="user-pad">CodeupConnect Portfolio</h3>
				</div>
			</div>
		</div>
	</div>
</div>
		
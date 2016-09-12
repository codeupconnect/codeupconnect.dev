<div class="container">
	<h2 class="text-center teal-font title">{{ $project->organization_name }}</h2>
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- Username/Preference -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Optional Requests:
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

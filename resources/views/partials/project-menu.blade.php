<div class="profile-usermenu">
	<ul class="nav">

		@if($project->collateral != 1)
			<li><a>Has Collateral (Graphics/Logos etc.)</li></a>
		@endif
		
		@if($project->facebook != 1)
			<li><a>Facebook Integration</li></a>
		@endif
		
		@if($project->linkedin != 1)
			<li><a>LinkedIn Integration</li></a>
		@endif
		
		@if($project->twitter != 1)
			<li><a>Twitter Integration</li></a>
		@endif
		
		@if($project->youtube != 1)
			<li><a>Youtube Integration</li></a>
		@endif
		
		@if($project->instagram != 1)
			<li><a>Instagram Integration</li></a>
		@endif
		
		@if($project->tumblr != 1)
			<li><a>Tumblr Integration</li></a>
		@endif
		
		@if($project->blog != 1)
			<li><a>Blog Integration</li></a>
		@endif
		
		@if($project->comments != 1)
			<li><a>User Comments Integration</li></a>
		@endif
		
		@if($project->member_signup != 1)
			<li><a>Enable Member Signup</li></a>
		@endif
		
		@if($project->contact_form != 1)
			<li><a>Contact Form</li></a>
		@endif
		
		@if($project->existing_database != 1)
			<li><a>Has Existing Database</li></a>
		@endif
		
		@if($project->stripe != 1)
			<li><a>Stripe Integration</li></a>
		@endif
		
	</ul>
</div>
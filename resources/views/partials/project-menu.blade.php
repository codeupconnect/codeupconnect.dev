<div class="profile-usermenu">
	<ul class="nav">

		@if($project->collateral != 0)
			<li><a>Has Collateral (Graphics/Logos etc.)</li></a>
		@endif
		
		@if($project->facebook != 0)
			<li><a>Facebook Integration</li></a>
		@endif
		
		@if($project->linkedin != 0)
			<li><a>LinkedIn Integration</li></a>
		@endif
		
		@if($project->twitter != 0)
			<li><a>Twitter Integration</li></a>
		@endif
		
		@if($project->youtube != 0)
			<li><a>Youtube Integration</li></a>
		@endif
		
		@if($project->instagram != 0)
			<li><a>Instagram Integration</li></a>
		@endif
		
		@if($project->tumblr != 0)
			<li><a>Tumblr Integration</li></a>
		@endif
		
		@if($project->blog != 0)
			<li><a>Blog Integration</li></a>
		@endif
		
		@if($project->comments != 0)
			<li><a>User Comments Integration</li></a>
		@endif
		
		@if($project->member_signup != 0)
			<li><a>Enable Member Signup</li></a>
		@endif
		
		@if($project->contact_form != 0)
			<li><a>Contact Form</li></a>
		@endif
		
		@if($project->existing_database != 0)
			<li><a>Has Existing Database</li></a>
		@endif
		
		@if($project->stripe != 0)
			<li><a>Stripe Integration</li></a>
		@endif
		
	</ul>
</div>
<div class="profile-usermenu">
	<ul class="nav">

		@if($project->collateral != 1)
			<li><a><i class="fa fa-check-square" aria-hidden="true"></i> Has Collateral (Graphics/Logos etc.)</li></a>
		@endif
		
		@if($project->facebook != 1)
			<li><a><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook Integration</li></a>
		@endif
		
		@if($project->linkedin != 1)
			<li><a><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn Integration</li></a>
		@endif
		
		@if($project->twitter != 1)
			<li><a><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter Integration</li></a>
		@endif
		
		@if($project->youtube != 1)
			<li><a><i class="fa fa-youtube-square" aria-hidden="true"></i> Youtube Integration</li></a>
		@endif
		
		@if($project->instagram != 1)
			<li><a><i class="fa fa-instagram" aria-hidden="true"></i> Instagram Integration</li></a>
		@endif
		
		@if($project->tumblr != 1)
			<li><a><i class="fa fa-tumblr-square" aria-hidden="true"></i> Tumblr Integration</li></a>
		@endif
		
		@if($project->blog != 1)
			<li><a><i class="fa fa-rss-square" aria-hidden="true"></i> Blog Integration</li></a>
		@endif
		
		@if($project->comments != 1)
			<li><a><i class="fa fa-comment-o" aria-hidden="true"></i> User Comments Integration</li></a>
		@endif
		
		@if($project->member_signup != 1)
			<li><a><i class="fa fa-user-plus" aria-hidden="true"></i> Enable Member Signup</li></a>
		@endif
		
		@if($project->contact_form != 1)
			<li><a><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Form</li></a>
		@endif
		
		@if($project->existing_database != 1)
			<li><a><i class="fa fa-database" aria-hidden="true"></i> Has Existing Database</li></a>
		@endif
		
		@if($project->stripe != 1)
			<li><a><i class="fa fa-cc-stripe" aria-hidden="true"></i> Stripe Integration</li></a>

		
	</ul>
</div>
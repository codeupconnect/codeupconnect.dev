<div class="profile-usermenu">
	<ul class="nav">

		@if($project->collateral != 0)
			<li><a><i class="fa fa-check-square" aria-hidden="true"></i> Has Collateral (Graphics/Logos etc.)</li></a>
		@endif
		
		@if($project->facebook != 0)
			<li><a><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook Integration</li></a>
		@endif
		
		@if($project->linkedin != 0)
			<li><a><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn Integration</li></a>
		@endif
		
		@if($project->twitter != 0)
			<li><a><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter Integration</li></a>
		@endif
		
		@if($project->youtube != 0)
			<li><a><i class="fa fa-youtube-square" aria-hidden="true"></i> Youtube Integration</li></a>
		@endif
		
		@if($project->instagram != 0)
			<li><a><i class="fa fa-instagram" aria-hidden="true"></i> Instagram Integration</li></a>
		@endif
		
		@if($project->tumblr != 0)
			<li><a><i class="fa fa-tumblr-square" aria-hidden="true"></i> Tumblr Integration</li></a>
		@endif
		
		@if($project->blog != 0)
			<li><a><i class="fa fa-rss-square" aria-hidden="true"></i> Blog Integration</li></a>
		@endif
		
		@if($project->comments != 0)
			<li><a><i class="fa fa-comment-o" aria-hidden="true"></i> User Comments Integration</li></a>
		@endif
		
		@if($project->member_signup != 0)
			<li><a><i class="fa fa-user-plus" aria-hidden="true"></i> Enable Member Signup</li></a>
		@endif
		
		@if($project->contact_form != 0)
			<li><a><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact Form</li></a>
		@endif
		
		@if($project->existing_database != 0)
			<li><a><i class="fa fa-database" aria-hidden="true"></i> Has Existing Database</li></a>
		@endif
		
		@if($project->stripe != 0)
			<li><a><i class="fa fa-cc-stripe" aria-hidden="true"></i> Stripe Integration</li></a>
		@endif
		
	</ul>
</div>
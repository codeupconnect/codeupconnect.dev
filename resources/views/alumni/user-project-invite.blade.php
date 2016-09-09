@extends('layout.master')

@section('content')

<div class="container">	
	<h2 class="title text-center">Your Project, Should You Choose to Accept It:</h2>
	<div class="container">
		<h2 class="static-option text-center teal-font">{{ $project->organization_name }}</h2>
		<div class="form-group edit">
			<h3>Website: {{ $project->site_url }}</h3> 
			<div class="container">
				<h4>Start Date: {{ $project->start_date }}</h4> 
				<h4 class="static-option">End Date: {{ $project->end_date }}</h4> 
				<h4 class="static-option">Contact: {{ $project->point_person }}</h4> 
				<h4 class="static-option">Phone Number: {{ $project->phone }}</h4> 
				<h4 class="static-option">Email: {{ $project->email }}</h4> 
				<h4 class="static-option">Project Details: {{ $project->project_details }}</h4> 
			</div>
			<h3 class="static-option">Additional Requests:</h3> 
			<ul>
				<li>
					@if($project->collateral !== null)
						<h4 class="static-option">Has Collateral (Graphics/Logos etc.)</h4>
					@endif
				</li>
				<li>
					@if($project->facebook !== null)
						<h4 class="static-option">Facebook Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->linkedin !== null)
						<h4 class="static-option">LinkedIn Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->twitter !== null)
						<h4 class="static-option">Twitter Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->youtube !== null)
						<h4 class="static-option">Youtube Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->instagram !== null)
						<h4 class="static-option">Instagram Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->tumblr !== null)
						<h4 class="static-option">Tumblr Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->blog !== null)
						<h4 class="static-option">Blog Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->comments !== null)
						<h4 class="static-option">User Comments Integration</h4> 
					@endif
				</li>
				<li>
					@if($project->member_signup !== null)
						<h4 class="static-option">Enable Member Signup</h4> 
					@endif
				</li>
				<li>
					@if($project->contact_form !== null)
						<h4 class="static-option">Contact Form</h4> 
					@endif
				</li>
				<li>
					@if($project->existing_database !== null)
						<h4 class="static-option">Has Existing Database</h4> 
					@endif
				</li>
				<li>
					@if($project->stripe !== null)
						<h4 class="static-option">Stripe Integration</h4> 
					@endif
				</li>
			</ul>
		</div>
		
	</div>
</div>





@stop
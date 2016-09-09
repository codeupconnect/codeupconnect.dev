
@extends('layout.master')

@section('content')




<div class="container">	
	<h2 class="title text-center">Your Project, Should You Choose to Accept It:</h2>
	<div class="container">
		<h3 class="static-option text-center">{{ $project->organization_name }}</h3>
		<div class="form-group edit">
			

				<h3>Website: </h3>
				<h4>{{ $project->site_url }}</h4> 
				<h4>Start Date: {{ $project->start_date }}</h4> 
				<h4 class="static-option">End Date: {{ $project->end_date }}</h4> 
				<h4 class="static-option">Contact: {{ $project->point_person }}</h4> 
				<h4 class="static-option">Phone Number: {{ $project->phone }}</h4> 
				<h4 class="static-option">Email: {{ $project->email }}</h4> 
				<h4 class="static-option">Project Details: {{ $project->project_details }}</h4> 
				<h3 class="static-option">Additional Requests:</h3> 
				<ul>
					<li>
						@if($project->collateral !== null)
							<h4 class="static-option">Has Collateral (Graphics/Logos etc.)</h4>
						@endif
					</li>
					<li>
						@if($project->facebook !== null)
							<h4 class="static-option">Facebook Presence</h4> 
						@endif
					</li>
					@if($project->linkedin !== null)
						<h4 class="static-option">LinkedIn Presence</h4> 
					@endif
					@if($project->twitter !== null)
						<h4 class="static-option">Twitter Presence</h4> 
					@endif
					@if($project->youtube !== null)
						<h4 class="static-option">Youtube Presence</h4> 
					@endif
					@if($project->instagram !== null)
						<h4 class="static-option">Instagram Presence</h4> 
					@endif
					@if($project->tumblr !== null)
						<h4 class="static-option">Tumblr Presence</h4> 
					@endif
					@if($project->blog !== null)
						<h4 class="static-option">Blog Integration</h4> 
					@endif
					@if($project->comments !== null)
						<h4 class="static-option">User Comments Integration</h4> 
					@endif
					@if($project->member_signup !== null)
						<h4 class="static-option">Enable Member Signup</h4> 
					@endif
					@if($project->contact_form !== null)
						<h4 class="static-option">Contact Form</h4> 
					@endif
					@if($project->existing_database !== null)
						<h4 class="static-option">Has Existing Database</h4> 
					@endif
					@if($project->stripe !== null)
						<h4 class="static-option">Stripe Integration</h4> 
					@endif
				</ul>
			
		</div>

		<div class="container button-container col-xs-12">
			<div class="col-xs-4">
				<form method="POST" action="{{ action('UsersController@acceptInvite') }}">
		   			{!! csrf_field() !!}  
					<button name="id" value="{{ $user->id }}" class="btn btn-success" >Accept</button>
				</form>
			</div>
			<div class="col-xs-4">
				<form method="POST" action="{{ action('UsersController@rejectInvite') }}">
			    	{!! csrf_field() !!}    
					<button name="id" value="{{ $user->id }}" class="btn btn-danger" >Pass</button>
				</form>
			</div>
		</div>
	</div>
</div>





@stop
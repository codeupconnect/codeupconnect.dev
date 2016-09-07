@extends('layout.master')


@section('content')
<div class="container form-font">
    <h1 class="navbar-margin text-center">Submit a Project</h1>
	<div class="container-fluid form-group">
        <div class="row">
            <form method="POST" action="{{ action('ProjectsController@store') }}">
                {!! csrf_field() !!}
                <p>Your Organization: <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="form-control"></p>
                @if($errors->has('organization_name'))
		    		{!! $errors->first('organization_name', '<p><span class="help-block alert alert-warning">:message</span></p>') !!}
				@endif
                

                <p>Your Current Web Address (if applicable): <input type="text" name="site_url" value="{{ old('site_url') }}" class="form-control"></p>
           
                <p>How soon do you want to start your project? <input type="text" name="start_date" value="{{ old('start_date') }}" class="form-control"> </p>
            
				<p>What is your target date for completion? <input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control"> </p>
              
				<p>Primary Point-of-Contact: <input type="text" name="point_person" value="{{ old('point_person') }}" class="form-control"> </p>
                @if($errors->has('point_person'))
		    		{!! $errors->first('point_person', '<p><span class="help-block alert alert-warning">:message</span></p>') !!}
				@endif
                

				<p>Point-of-Contact Phone: <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"> </p>
        
				<p>Point-of-Contact email: <input type="text" name="email" value="{{ old('email') }}" class="form-control"> </p>
                @if($errors->has('email'))
		    		{!! $errors->first('email', '<p><span class="help-block alert alert-warning">:message</span></p>') !!}
				@endif

				<p>Please describe your project/goals/features: <input type="textarea" name="project_details" value="{{ old('project_details') }}" class="form-control"> </p>
                @if($errors->has('project_details'))
		    		{!! $errors->first('project_details', '<p><span class="help-block alert alert-warning">:message</span></p>') !!}
				@endif

				<p>Do you have collateral prepared for your project? <input type="checkbox" name="collateral" value="true"> </p>
      
				<p>Facebook integration? <input type="checkbox" name="facebook" value="true"> </p>
              
				<p>LinkedIn integration? <input type="checkbox" name="linkedin" value="true"> </p>
          
				<p>Twitter integration? <input type="checkbox" name="twitter" value="true"> </p>
         
				<p>Youtube integration? <input type="checkbox" name="youtube" value="true"> </p>
        
				<p>Instagram integration? <input type="checkbox" name="instagram" value="true"></p> 
          
				<p>Tumblr integration? <input type="checkbox" name="tumblr" value="true"> </p>
            
				<p>Do you want a blog as part of the site? <input type="checkbox" name="blog" value="true"></p> 
         
				<p>Will your visitors be able to provide comments or feedback? <input type="checkbox" name="comments_feedback" value="true"> </p>
           
				<p>Do you need the capability for visitors to signup? <input type="checkbox" name="member_signup" value="true"> </p>
            
				<p>Do you need a contact form? <input type="checkbox" name="contact_form" value="true"> </p>

				<p>Do you need to migrate an existing database? <input type="checkbox" name="existing_database" value="true"> </p>
               
                <p>Will you need to take payments or donations? <input type="checkbox" name="stripe" value="true"> </p>
        
        		<input type="hidden" name="trello_id" value="null">
        		<input type="hidden" name="status" value="unapproved">  

                <p class="text-center"><input type="submit" class="button btn-success"></p>                  
            </form>
        </div>    
    </div>
</div>

@stop

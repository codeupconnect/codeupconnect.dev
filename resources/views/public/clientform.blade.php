@extends('layout.master')

@include('partials.navbar')

@section('content')
	<h1>Submit a Project</h1>
	<div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ action('ProjectsController@store') }}">
                        {!! csrf_field() !!}
                        Your Organization: <input type="text" name="organization_name" value="{{ old('organization_name') }}">
                        @if($errors->has('organization_name'))
    			    		{!! $errors->first('organization_name', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

                        Your Current Web Address (if applicable): <input type="text" name="site_url" value="{{ old('site_url') }}">
                   
                        How soon do you want to start your project? <input type="text" name="start_date" value="{{ old('start_date') }}"> 
                    
    					What is your target date for completion? <input type="text" name="end_date" value="{{ old('end_date') }}"> 
                      
    					Primary Point-of-Contact: <input type="text" name="point_person" value="{{ old('point_person') }}"> 
                        @if($errors->has('point_person'))
    			    		{!! $errors->first('point_person', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

    					Point-of-Contact Phone: <input type="text" name="phone" value="{{ old('phone') }}"> 
                
    					Point-of-Contact email: <input type="text" name="email" value="{{ old('email') }}"> 
                        @if($errors->has('email'))
    			    		{!! $errors->first('email', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

    					Please describe your project/goals/features: <input type="textarea" name="project_details" value="{{ old('project_details') }}"> 
                        @if($errors->has('project_details'))
    			    		{!! $errors->first('project_details', '<span class="help-block alert alert-warning">:message</span>') !!}
    					@endif

    					Do you have a logo/graphics for your project? <input type="checkbox" name="logo_graphics" value="{{ old('logo_graphics') }}"> 
                    
    					Do you have a color palette in mind? <input type="checkbox" name="color_palette" value="{{ old('color_palette') }}"> 
              
    					Facebook integration? <input type="checkbox" name="facebook" value="{{ old('facebook') }}"> 
                      
    					LinkedIn integration? <input type="checkbox" name="linkedin" value="{{ old('linkedin') }}"> 
                  
    					Twitter integration? <input type="checkbox" name="twitter" value="{{ old('twitter') }}"> 
                 
    					Youtube integration? <input type="checkbox" name="youtube" value="{{ old('youtube') }}"> 
                
    					Instagram integration? <input type="checkbox" name="instagram" value="{{ old('instagram') }}"> 
                  
    					Tumblr integration? <input type="checkbox" name="tumblr" value="{{ old('tumblr') }}"> 
                    
    					Do you want a blog as part of the site? <input type="checkbox" name="blog" value="{{ old('blog') }}"> 
                 
    					Will your visitors be able to provide comments or feedback? <input type="checkbox" name="comments_feedback" value="{{ old('comments_feedback') }}"> 
                   
    					Do you need the capability for visitors to signup? <input type="checkbox" name="member_signup" value="{{ old('member_signup') }}"> 
                    
    					Do you need a contact form? <input type="checkbox" name="contact_form" value="{{ old('contact_form') }}"> 

    					Do you need to migrate an existing database? <input type="checkbox" name="existing_database" value="{{ old('existing_database') }}"> 
                       
                        Will you need to take payments or donations? <input type="checkbox" name="stripe" value="{{ old('stripe') }}"> 
                
                		<input type="hidden" name="trello_id" value="null">
                		<input type="hidden" name="status" value="unapproved">  

                        <input type="submit" class="button">                  
            </form>
        </div>    
    </div>

@include('partials.footer')

@stop


@extends('layout.master')


    <div class="slide story" id="slide-1" data-slide="1">
		<div class="col-md-12">
			<video id="home-video" class="video" autoplay="autoplay">
			  <source src="video/westward-view.mp4" type="video/mp4" />
			</video>
		</div>
		<div class="container">
			<div id="home-row-1" class="row clearfix">
				<div class="col-12">
					<img class="img-responsive" src="/images/logo.png" id="codeupconnect">
					<h4 class="font-thin">We are a team of <span class="font-semibold">Codeup graduates</span> looking to give back to the community.</h4>
				</div>
				<div class="container">
    				<a class="btn-0" href="/form">Make a Request</a>
    			</div>
			</div>
			
		</div>
	</div><!-- /slide1 -->
	
	<!-- === Slide 2 === -->
	<div class="slide story" id="slide-2" data-slide="2">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-semibold">Our Mission</div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div><!-- /row -->
			
			<div class="row content-row">
				<div class="col-12">
					@include('partials.mission-slide')

				</div><!-- /col12 -->
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /slide2 -->

		<!-- === Slide 3 - Portfolio -->
	<!-- <div class="slide story" id="slide-3" data-slide="3">
		<div class="container">
			<div class="row title-row">
				<div class="col-xs-12 font-thin"><span class="font-semibold">Portfolio</div> -->
			<!-- </div> --><!-- /row -->
			<!-- <div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div> --><!-- /row -->
			<!-- <div class="row subtitle-row">
				<div class="col-xs-1 hidden-xs">&nbsp;</div>
				<div class="col-xs-12 col-xs-10 font-light"><p>Here's where we brag about clients we've worked with...whenever that actually happens.</p> <p>For now...dancing Schmidty.</p></div>
				<div class="col-xs-1 hidden-xs">&nbsp;</div>
			</div> --><!-- /row -->
			<!-- <div class="row content-row col-xs-12">
				
				<div class="col-xs-6 img-responsive"><img src="giphy.gif" alt=""></div>
				<div class="col-xs-6 img-responsive"><img src="giphy.gif" alt=""></div>
				
			</div> --><!-- /row -->
		<!-- </div> --><!-- /container -->
	<!-- </div> --><!-- /slide3 -->

	<!-- === Slide 4 - Freelancers === -->
	<!-- <div class="slide story" id="slide-4" data-slide="4">
		<div class="container">
			<div class="row title-row">
				<div class="col-xs-12 font-thin">Featured Freelancers</span></div>
			</div> --><!-- /row -->
			<!-- <div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div> --><!-- /row -->
			<!-- <div class="row subtitle-row">
				<div class="col-xs-1 hidden-xs">&nbsp;</div>
				<div class="col-xs-12 col-xs-10 font-light"><p>And when we have freelancers to display, this is where they'd go!</p>
				<p>Until then...more Dancing Schmidty.</p>
				</div>
				
		
				<div class="col-xs-12 img-responsive"><img src="giphy.gif" alt=""></div>
		
				<div class="col-xs-1 hidden-xs">&nbsp;</div>
			</div> --><!-- /row -->
		<!-- </div> --><!-- /container -->
	<!-- </div> --><!-- /slide4 -->

	<script>
		$(function() {
	        $('video').cover({
	        	ratio: 1080 / 1920;
	        });
	    	$(window).resize(function() {
	        	$('video').cover('set');
	        });
	    });
	</script>
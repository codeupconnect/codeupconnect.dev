
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
	<div class="slide story" id="slide-3" data-slide="3">
		<div class="container">
			<div class="row title-row">
				<div class="col-xs-12 font-thin"><span class="font-semibold">What's <a href="http://www.codeup.com">Codeup?</a></div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div> <!-- /row -->
			<div class="row subtitle-row">
				<div class="col-xs-1 hidden-xs">&nbsp;</div>
				<div class="col-xs-12 col-xs-10 font-light">
					@include('partials.codeup')
				</div>
				<div class="col-xs-1 hidden-xs">&nbsp;</div><img src="/images/codeup-img.jpg">
			</div> <!-- /row --> 
		</div> <!-- /container-->
	 </div> <!-- /slide3 -->

	<!-- === Slide 4 - Freelancers === -->
	<div class="slide story" id="slide-4" data-slide="4">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-semibold">Connect <span class="font-thin">With Us!</span></div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div><!-- /row -->
			<div class="row subtitle-row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div><!-- /row -->
			<div id="contact-row-4" class="row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="fa fa-camera-retro fa-5x"></i></a></p>
					<span class="hover-text font-light ">+44 4839-4343</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-envelope"></i></a></p>
					<span class="hover-text font-light ">munter@blacktie.co</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-home"></i></a></p>
					<span class="hover-text font-light ">London, England<br>zip code 98443</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-facebook"></i></a></p>
					<span class="hover-text font-light ">facebook/blacktie_co</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-twitter"></i></a></p>
					<span class="hover-text font-light ">@BlackTie_co</span></a>
				</div><!-- /col12 -->
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /Slide 4 -->

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
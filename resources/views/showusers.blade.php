@extends('master')

@section('content')

	 <div class="container">
	 	<div class="row">
	 		<div class="col-sm-4" data-value="{{ dd(session()) }}">
	 			<p class="{{ session()->get('key') }}">
	 			</div>

	 <script type="text/javascript">



	 	// var name = $(.'data-value').val();
	 	// console.log(name);

	 	// $.getJSON('https://api.github.com/users/octocat' + name, function (data) {
 
   //          // do all this on success       
   //          var items = [],
   //              $ul;
 
   //          $.each(data, function (key, val) {
   //              //iterate through the returned data and build a list
   //              items.push('<li id="' + key + '"><span class="name">' + val.entityname + '</span><br><span class="addr">' + val.principaladdress1 + '</span> <span class="city">' + val.principalcity + '</span></li>');
   //          });
   //          // if no items were returned then add a message to that effect
   //          if (items.length < 1) {
   //              items.push('<li>No results for this ZIP code, try again!</li>');
   //          }
 
   //          // remove spinner
   //          $('.fa-spin').remove();
 
   //          // append list to page
   //          $ul = $('<ul />').appendTo('.content');
 
   //          //append list items to list
   //          $ul.append(items);
   //      });

	 </script>
@stop
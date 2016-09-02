@extends('layout.master')

@section('content')
    
    <div class="container">		      
    	<h1>Trello Dashboard</h1>		
      	<form class="form-horizontal" id="boards_form">		        
	      	<div class="form-group">		          
	      		<label class="control-label">Choose your board</label>
	      	    <select class="form-control" id="boards"></select>		        
	      	</div>		      
	    </form>
	    <div id="labels"></div>
    	  </div> 
		    
	</div> 

@section('bottom-scripts')

	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
	<script>
		
		var authenticationSuccess = function() 
			{ 
				console.log('Successful authentication'); 
			};
		var authenticationFailure = function() 
			{ 
				console.log('Failed authentication'); 
			};
		
	    var loadedBoards = function(boards) 
	    {		      
	    	$.each(boards, function(index, value) 
	    	{		        
	    		$('#boards')		          
	    		.append($("<option></option>")		          
	    		.attr("value",value.id)		          
	    		.text(value.name)); 		      
	    	});		    
	    };		    

		// Get the users boards		      
		var loadBoards = function() 
		{		      
			Trello.get(
				'/members/me/boards/',		        
				loadedBoards,		        
				function() { console.log("Failed to load boards"); }
			);		    
		};

		var loadedLabels = function(labels) 
		{
			console.log(labels);
      		$.each(labels, function(index, label) 
      		{
        		var label = $("<p><span class='badge' style='background:" + label.color + ";'>" + label.uses + "</span> " + label.id + "</p>");
        		$('#labels').append(label);
      		});
    	};

    	var dump = function(data)
    	{
    		console.log(data);
    	}

	    $('#boards').change(function() 
	    {
	    	var boardId = $("option:selected", this).val();
	    	$('#labels').empty();

	      
	      	Trello.get(
	        	'/boards/' + boardId,
	        	dump,
	       		function() { console.log("Failed to load labels"); }
	      	);
	    });

		Trello.authorize({
		  type: 'popup',
		  name: 'CodeupConnect',
		  scope: {
		    read: 'true',
		    write: 'true' },
		  expiration: 'never',
		  success: loadBoards,
		  error: authenticationFailure
		});

	</script>
@stop
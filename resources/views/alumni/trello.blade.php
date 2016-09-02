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
	    <div id="lists">
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

		// Get the users boards		      
		var loadBoards = function() 
		{		      
			Trello.get(
				'/members/me/boards/',		        
				loadedBoards,		        
				function() { console.log("Failed to load boards"); }
			);		    
		};

		// Show user's boards
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

	    $('#boards').change(function() 
	    {
	    //	Clear loaded lists
	    	$('#lists').empty();

	    // Get selected board id
	   		var boardId = $("option:selected", this).val();

    	// Get the selected board's lists
	     	Trello.get(
	        	'/boards/' + boardId + '/lists',
	        	loadedLists,
	       		function() { console.log("Failed to load lists"); }
	      	);


	    });

	    // Global Scope Variable to Recieve List Name
    	var listName;

		// Show selected board's lists
		var loadedLists = function(lists) 
		{
      		$.each(lists, function(index, list) 
      		{
        		var listText = $("<div class='col-sm-3';><table><tr><th>" + list.name + "</tr></th><td id='" + list.name + "'></td></div>");
        		listName = list.name;
        		$('#lists').append(listText);

      		});
    	};


    	// Not Working.
    	// Show Cards from selected list
    	var loadCards = function(cards)
    	{
    		$.each(cards, function(index, card) 
    		{
    			var cardText = $("<br>" + card.name + "</div>");
    			$("#"+listName).append(cardText);
    		});
    	}

    	// Test code
    	var dump = function(data)
    	{
    		console.log(data);
    	}

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
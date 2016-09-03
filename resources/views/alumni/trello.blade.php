@extends('layout.master')

@section('head-includes')

	<link href="/css/trello.css" rel="stylesheet">

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
    	var listIds = new Array();

		// Show selected board's lists
		var loadedLists = function(lists) 
		{
			// Get each list data asynchronously
      		$.each(lists, function(index, list) 
      		{
      			// Add ID and Name to arrays
        		listIds.push(list.id);

        		// Create div with table for each list, with name in table head 
        		var listText = 
        		$("<div class='col-sm-3 lists'>
        			<textarea id='newCard" + list.id + "'></textarea>
        			<table><thead><tr><th>" + list.name + "</th></tr></thead>
        			<tbody id='" + list.id + "'></tbody></table></div>");
        		$('#lists').append(listText);

        		
      		});

      		// Get cards for each list
      		for (i=0; i<listIds.length; i++)
      		{
				$("#"+listIds[i]).empty();    			
	      		var url = '/lists/' + listIds[i] + '/cards';
	      		Trello.get(
		        		url,
	    	    		loadCards,
	       				function() { console.log("Failed to load lists"); }
	      			);
	      	}
    	};

    	// Show Cards from selected list
    	var loadCards = function(cards)
    	{
    		// Loop through each card
    		$.each(cards, function(index, card) 
    		{
    			//console.log(index, card, listIds[index]);
    			var cardText = "<tr><td>" + card.name + "</td></tr>";
    			$("#"+card.idList).append(cardText);
    		});
    	}

    	var myList = 'ID';
		var creationSuccess = function(data) {
			console.log('Card created successfully. Data returned:' + JSON.stringify(data));
		};
		var newCard = {
			name: 'New Test Card', 
			desc: 'This is the description of our new card.',
		  	idList: myList,
		  	pos: 'top'
		};
		Trello.post('/cards/', newCard, creationSuccess);

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
@extends('layout.master')

@section('head-includes')

	<link href="/css/trello.css" rel="stylesheet">

@section('content')
    
    <div class="container">		      
    	<h1>Trello Dashboard</h1>
    	<button id="newBoard">New Board</button>		
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

	    // Global Scope Variables
    	var listIds = new Array();
    	var listNames = new Array();
    	var boardId;
		
		var authenticationSuccess = function() 
			{ 
				dump('Successful authentication'); 
			};
		var authenticationFailure = function() 
			{ 
				dump('Failed authentication'); 
			};

		// Load board upon selection from dropdown
	    $('#boards').change(function() 
	    {
	    	// Get selected board id and load boards
	   		boardId = $("option:selected", this).val();
	    	loadBoard();
	    });

		// Get the users boards		      
		var loadAllBoards = function() 
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
	    	// Create Intro Item
    		$('#boards')
    		.append($("<option></option>")
    		.text("Select a Board:")); 

    		// Populate Board Selection Menu	
	    	$.each(boards, function(index, value) 
	    	{	
	    		$('#boards')		          
	    		.append($("<option></option>")		          
	    		.attr("value",value.id)		          
	    		.text(value.name)); 		      
	    	});		    
	    };		    


	    function loadBoard()
	    {
	    //	Clear loaded lists
	    	$('#lists').empty();

    	// Get the selected board's lists
	     	Trello.get(
	        	'/boards/' + boardId + '/lists',
	        	loadedLists,
	       		function() { dump("Failed to load lists"); }
	      	);
	    }

		// Show selected board's lists
		var loadedLists = function(lists) 
		{
			listIds = [];
			listNames = [];
			// Get each list data asynchronously
      		$.each(lists, function(index, list) 
      		{
      			// Add ID and Name to arrays
        		listIds.push(list.id);
        		listNames.push(list.name);

        		// Create div with table for each list, with name in table head 
        		//-Invalid or unexpected token-
        		var listText = 
	    
        		$("<div class='col-sm-3 lists'><input type='text' placeholder='Create New Card' class='newCard' data-id='" + list.id + "'><table><thead><tr><th>" + list.name + "</th></tr></thead><tbody id='" + list.id + "'></tbody></table></div>");

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
    		// Loop through to create each card
    		$.each(cards, function(index, card) 
    		{
    			var cardText = "<tr><td class='allCards' id='" + card.id + "'>" + card.name + "</td></tr>";
    			$("#"+card.idList).append(cardText);
    			
    			// Click listener placed on each card
    			$("#"+card.id).click(function() 
    			{
    				// Create textarea, edit button, discard button, and delete link
    				var cardHtml = "<textarea id='editing'>"+ card.name + "</textarea><button id='edit'>Edit Card</button><button id='discard'>Discard Changes</button><a id='delete' href='javascript'>Delete</a>";

    				// Add links to move card to other lists
    				var moveLinks = createMoveLinks();
    				cardHtml += moveLinks;

    				// Create textarea and buttons/links for editing
    				$('#'+card.id).html(cardHtml);

    				// Remove listeners on all other cards
    				$("#"+card.id).off();
    				$(".allCards").off();

    				// Create listeners on move links
					$('.moveList').bind('click',function(e){
  						e.preventDefault();	
    					var move = Trello.put('/cards/' + card.id + "/idList?value=" + $(this).attr('data-list'));
    					dump(move);
    					loadBoard();
					});

    				// Create listeners on buttons and delete link
    				$(document).on('click', '#edit', function() 
    				{
    					Trello.put('/cards/'+card.id, {name: $('#editing').val()});
    					loadBoard();
       				});

       				$(document).on('click', '#discard', function() 
    				{
    					loadBoard();
      				});       				
    				
    				$('#delete').bind('click',function(e){
      					e.preventDefault();
    					Trello.delete('/cards/'+card.id);
      					loadBoard();     
					});
    				// and refresh view
    			});
    		});
    	}

    	// Create Listener to Allow Card Creation
    	$(document).on('change', '.newCard', function() 
    	{
	    	var listId = $(this).attr('data-id');
	    	// Reload Lists After Creation
			var creationSuccess = function(data) {
				loadBoard();
				dump('Card Created Successfully');
			};
			// Check for empty value
			if ($(this).val() !== '' && $(this).val() !== ' ')
			{
				// Create New Card
				var newCard = {
					name: $(this).val(), 
					desc: 'This is the description of our new card.',
				  	idList: listId,
				  	pos: 'top'
				};
				Trello.post('/cards/', newCard, creationSuccess);
			}
		});

		// Create Links to Move Card to Another List
		function createMoveLinks()
		{
			var moveLinks = '<ul>';
			$.each(listNames, function(index, name)
			{
				// Create new anchor for each list
				moveLinks += "<li><a href='javascript' class='moveList' data-list='" + listIds[index] + "'>" + name + "</a></li>";
			});
			moveLinks += '</ul>';
			return moveLinks;
		}

		// Create New Board
		// This will be changed to occur only when project is accepted
		$(document).on('click', '#newBoard', function() 
    	{
    		var test = Trello.post('/boards/', {name: 'newProject'})
    			.done(function(board)
    			{ 
    				alert(board.id);
    			})
		});

    	// Test code
    	function dump(data)
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
		  success: loadAllBoards,
		  error: authenticationFailure
		});

	</script>
@stop
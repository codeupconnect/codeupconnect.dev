"use strict"

// ------------------------------
// --- Global Scope Variables ---
// ------------------------------

	var listIds = new Array();
	var listNames = new Array();
	var boardId;


// ---------------------
// --- Test Function ---
// ---------------------

	function dump(data1, data2)
	{
		console.log(data1, data2);
	}



// -------------------------------
// --- Dropdown Menu Functions ---
// -------------------------------

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



// -----------------------------
// --- Regular Functionality ---
// -----------------------------

    function loadBoard()
    {
		boardId = $('#board-id').val();
		dump('boardId: ', boardId);
	    //	Clear loaded lists
    	$('#lists').empty();
	// Get the selected board's lists
     	Trello.get(
        	'/boards/' + boardId + '/lists',
        	loadedLists,
       		function() { dump("Failed to load lists"); }
      	);
    }

	var loadedLists = function(lists) 
	{
		// Clear global scope
		listIds = [];
		listNames = [];

		// Get each list data asynchronously
  		$.each(lists, function(index, list) 
  		{
  			// Add ID and Name to arrays
    		listIds.push(list.id);
    		listNames.push(list.name);

    		// Create div with table for each list, with name in table head 
    		var listText = 
    		$("<div class='col-sm-3 lists'><input type='text' placeholder='Create New Card' class='newCard' data-id='" + list.id + "'><table><thead><tr><th>" + list.name + "</th></tr></thead><tbody id='" + list.id + "'></tbody></table></div>");

    		$('#lists').append(listText);
    		
  		});

  		// Get cards from each list
  		for (var i=0; i<listIds.length; i++)
  		{
			$("#"+listIds[i]).empty();    			
			dump(listIds[i]);    			
      		var url = '/lists/' + listIds[i] + '/cards';
      		Trello.get(
	        		url,
    	    		loadCards,
       				function() { console.log("Failed to load lists"); }
      			);
      	}
	};

	// Display Cards from selected list
	var loadCards = function(cards)
	{
		// Loop through to create each card
		$.each(cards, function(index, card) 
		{
			var cardText;
			cardText = "<tr><td class='allCards' id='" + card.id + "'>" + card.name + "</td></tr>";
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

				// Create listeners for move links
				$('.moveList').bind('click',function(e){
					e.preventDefault();	
					Trello.put('/cards/' + card.id + "/idList?value=" + $(this).attr('data-list'));
					loadBoard();
				});

				// Create listeners on buttons and delete link
				$('#edit').bind('click', function(e) 
				{
					Trello.put('/cards/'+card.id, {name: $('#editing').val()});
					loadBoard();
   				});
   				$('#discard').bind('click', function() 
				{
					loadBoard();
  				});       				
				$('#delete').bind('click',function(e){
  					e.preventDefault();
					Trello.delete('/cards/'+card.id);
  					loadBoard();     
				});
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

		// Do not run if value is empty
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



// -------------------
// --- New Project ---
// -------------------

	// Create New Board on Click (for testing)
	$(document).on('click', '#newBoard', function() 
	{
		var name = $(this).val();
		createOrViewBoard(name);
	});

	// Create New Board if first_member is true, otherwise view
	function createOrViewBoard()
	{
		// Create New
		if ($('#board-id').val() == "null" || $('#board-id').val() == null)
		{
			Trello.post('/boards/', {name: $('#board-name').val(), idBoardSource: '57ccac05a9c89e70ce374d64'})
				.done(function(board)
				{ 
					// Post Board ID and Redirect to Laravel Function for Storing
				    $('#board-id').val(board.id);
				    $('#operations').submit();
				});
		} 
		else
		// View Existing
		{
			// Future: add logged in user to board.
			loadBoard();
		}
	}



// ---------------------
// --- Authorization ---
// ---------------------

	var authorizeSuccess = function() 
	{
		var token = $('#token').val();
		if (window.location.href == "http://codeupconnect.dev/trello")
		{
			dump('logging in', Trello.token());
			$.ajax({
				url: "/trello-login",
				type: "POST",
				data: {
				'trello_id' : Trello.token(),
				'_token' : token,
				}
			}).done(function(data) {
				$('#board-name').val(data['board_name']);
				$('#project-id').val(data['project_id']);
				$('#board-id').val(data['board_id']);
				createOrViewBoard();
			});
		} else if (window.location.href == "http://codeupconnect.dev/add-user")
		{
			// Create and submit a form instead of AJAX?
			// no...
			// shoot me plz.

		} else
		{
		loadBoard();
		}
	}

	var authorizeFailure = function() 
	{ 
		dump('Failed authentication'); 
	};

	Trello.authorize({
	  type: 'popup',
	  name: 'CodeupConnect',
	  scope: {
	    read: 'true',
	    write: 'true' },
	  expiration: 'never',
	  success: authorizeSuccess,
	  error: authorizeFailure
	});



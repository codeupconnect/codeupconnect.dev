$(document).on('click', '#logout', function()
	{
		Trello.deauthorize();
		alert('Logging Out');
	});
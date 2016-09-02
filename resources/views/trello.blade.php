@extends('master')

@section('content')
    
    <div class="container">
        <h1>Trello Dashboard</h1>		        
        <!-- We will be putting our dashboard right here -->		    
    </div> 

@section('bottom-scripts')
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://api.trello.com/1/client.js?key=06255aa30ed43a51b57297877330a541"></script>
<script>
var authenticationSuccess = function() { console.log(Successful authentication); };
var authenticationFailure = function() { console.log(Failed authentication); };
Trello.authorize({
  type: 'popup',
  name: 'Getting Started Application',
  scope: {
    read: 'true',
    write: 'true' },
  expiration: 'never',
  success: authenticationSuccess,
  error: authenticationFailure
});
</script>
@stop
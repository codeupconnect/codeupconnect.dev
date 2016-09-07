@extends('layout.master')

@section('content')

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="../bucky.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Bucky Barnes
                    </div>
                    <div class="profile-usertitle-job">
                        Winter Soldier
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
               
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Edit Profile </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
               Some user related content goes here...
            </div>
        </div>
    </div>
</div>
<br>
<br>

@section('bottom-scripts')
	<script>

		// Get API url from user-info data-value
		var api = $('#user-info').data();
		// api['value'] is now the string we are looking for

	 	$.getJSON(api['value'], function (data) {
            console.log(data);

            // Enter #id that should be targeted, and data['value'] that should be inserted
	        $('#github-id').text(data['login']);
	        $('#name').text(data['name']);
        });


	</script>
@stop
		
<?php
   include('session.php');
?>
<html ng-app="myApp">
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/taskman.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">


    </head>
    <body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Read-Around</a></div>
				<div class="collapse navbar-collapse" id="navcol-1">
					<ul class="nav navbar-nav">
						<li role="presentation"><a href="main.php">Main board</a></li>
						<!-- disable input -->
						<input type="text" ng-model="userid" ng-init="userid=<?php echo $login_userid ;?>" ng-show="false">	
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li role="presentation"><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>	
		

		<div class="row" ng-controller="readingController">			
			<div ng-include src="'partials/reading-panel.html'"></div>
		</div>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
		<script type="text/javascript" src="app/app.js"></script>
		<script
		  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
		  crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
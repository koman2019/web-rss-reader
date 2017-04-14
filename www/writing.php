<?php
   include('session.php');
?>
<html ng-app="myApp">
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/taskman.css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

    </head>
    <body>
	
		<!-- disable input -->
		<div class="navbar navbar-default" id="navbar">
		<div class="container" id="navbar-container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">
				<small>
					<i class="glyphicon glyphicon glyphicon-log-out"></i>
					Learn-Around
				</small>
			</a><!-- /.brand -->
			<input type="text" ng-model="userid" ng-init="userid=<?php echo $login_userid ;?>" ng-show="false">	
		</div><!-- /.navbar-header -->
		<div class="navbar-header pull-right" role="navigation">
			<a href="main.php" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Main board</a>
			<a href="logout.php" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-download"></i>&nbsp;logout</a>
		</div>	
		</div>
		</div>
		<div class="row" ng-controller="writingController">
		
		</div>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
		<script type="text/javascript" src="app/app.js"></script>
    </body>
</html>
<?php
   include('session.php');
?>
<html ng-app="myApp">
    <head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/taskman.css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
		<link rel="stylesheet" href="fonts/font-awesome.min.css">
		<title>News Carpet </title>

    </head>
    <body>
	
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header"><a class="navbar-brand navbar-link"   href="index.html">News Carpet</a></div>
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
		<div class="content" style="min-height: 500px;">
			<div class="row" ng-controller="writingController">
				<div ng-include src="'partials/writing-panel.html'"></div>
			</div>
		</div>
		<footer class="site-footer"> 
			<div class="container">
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<h5>News Carpet © 2017</h5>
					</div>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
		<script type="text/javascript" src="app/app.js"></script>
    </body>
</html>
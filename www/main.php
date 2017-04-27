<?php
   include('session.php');
?>

<html ng-app="myApp">
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/taskman.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
	<title>Read Around </title>

    </head>
    <body>
	<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link"  href="index.html">Read-Around</a></div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="" ng-click="learning = false; choosePage = true;">Find Source</a></li>
                    <li role="presentation"><a href="" ng-click="learning = true; choosePage = false;">Learning</a></li>
					<input type="text" ng-model="userid" ng-init="userid=<?php echo $login_userid ;?>" ng-show="false">	
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li role="presentation"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- disable input -->


	
	<!-- render choose source page -->
	<div class="content">
	<div ng-show="choosePage" class="row">
    	<div class="container">
    		<blockquote><h2>Choose your Reading material</h2></blockquote>
    		<div class="col-sm-12">
    			<div ng-include src="'partials/choose-source.html'"></div>
    		</div>
    	</div>
    </div>
	
	<!-- render learning main page -->
	<div ng-init="learning = true; " ng-show="learning" class="row">
    	<div class="container">
    		<blockquote><h2>Learning by . . .</h2></blockquote>
    		<div class="col-sm-12">
    			<div ng-include src="'partials/learning-by.html'"></div>
    		</div>
    	</div>
    </div>
	</div>

	<footer class="site-footer"> 
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Read Around © 2017</h5>
				</div>
            </div>
        </div>
    </footer>

	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
    </body>
</html>

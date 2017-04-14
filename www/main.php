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
        <a href="" ng-click="learning = false; choosePage = true;" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-book"></i>&nbsp;Source</a>
		<a href="" ng-click="learning = true; choosePage = false;" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-pencil"></i>&nbsp;Learning</a>
		<a href="logout.php" class="btn btn-sm btn-warning nav-button-margin"> <i class="glyphicon glyphicon-download"></i>&nbsp;logout</a>
	</div>	
	</div>
	</div>
	
	<!-- render choose source page -->
	<div ng-show="choosePage" class="row">
    	<div class="container">
    		<blockquote><h1>Choose your Reading material</h1></blockquote>
    		<div class="col-sm-12">
    			<div ng-include src="'partials/choose-source.html'"></div>
    		</div>
    	</div>
    </div>
	
	<!-- render learning main page -->
	<div ng-init="learning = true; " ng-show="learning" class="row">
    	<div class="container">
    		<blockquote><h1>Learning by ...</h1></blockquote>
    		<div class="col-sm-12">
    			<div ng-include src="'partials/learning-by.html'"></div>
    		</div>
    	</div>
    </div>
    <br>
	<br>
	<br>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
    </body>
</html>
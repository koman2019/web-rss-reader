<?php
   include('session.php');
?>
<style>
.CodeMirror, .CodeMirror-scroll {
	max-height: 150px;
}
</style>
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
				<div class="container">
				<div class="row">
					<div class="col-md-12" style="margin:1px;">


						<div>
							<ul class="nav nav-tabs">
								<li data-ng-class="{'active' : clickedItem == 1}" style="margin-bottom: -10px;">
									<a ng-click="switchTab()"><h4>Without Feedback <span class="badge" ng-bind="numOfFeedback[0].count" ></span><h4> </a>
								</li>
								<li data-ng-class="{'active' : clickedItem == 2}" style="margin-bottom: -10px;">
									<a ng-click="switchTab()"><h4>With Feedback<h4></a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" role="tabpanel">
									<div class="thread-list-head">
										<nav class="thread-pages">
											<ul class="pagination"></ul>
										</nav>
									</div>
									<ul class="thread-list">
										<div ng-repeat="yournew in yournews" >
										<li class="thread" ng-if="yournew.feedback == '' && clickedItem == 1">
											<span class="time" ng-bind="yournew.pubdate.substring(5, 12)"></span>
											<span class="title" ng-bind="yournew.title"></span>
											<span class="icon"> 
												<a href="" ng-click="showArticle(yournew.sourcename, yournew.title,yournew.pubdate.substring(5, 12),yournew.content,yournew.feedback)" class="flag">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
											</span>
										</li>
										<li class="thread" ng-if="yournew.feedback != '' && clickedItem == 2">
											<span class="time" ng-bind="yournew.pubdate.substring(5, 12)"></span>
											<span class="title" ng-bind="yournew.title"></span>
											<span class="icon"> 
												<a href="" ng-click="showArticle(yournew.sourcename,yournew.title,yournew.pubdate.substring(5, 12),yournew.content,yournew.feedback)" class="flag">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
											</span>
										</li>
										</div>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="container post">
						<div class="row">
							<div class="col-md-6 post-title">
								<h3 ng-bind="title"></h3>
								<p class="author"><strong ng-bind="sourcename"></strong> <span class="text-muted" ng-bind="date"></span></p>
							</div>
							<div class="col-md-6 col-md-offset-0 post-body">

								<figure><img class="img-thumbnail" src="">
									<figcaption></figcaption>
								</figure>
								<p ng-bind-html="renderHtml(content)"></p>
							
							</div>
						</div>
						</div ng-show="false">
							<textarea style="display:none" id="editor"></textarea>
						</div>
						<button type="button" ng-if="isTextOpen" class="btn btn-primary pull-right" ng-click="saveFeedback()">Save It</button>
					</div>
				</div>

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
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
		<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
		<script type="text/javascript" src="app/app.js"></script>
		    <!-- MARKDOWN Editor -->
			


    </body>
</html>
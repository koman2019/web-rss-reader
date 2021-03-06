<?php
   include('session.php');
?>
<style>
.a-z a {
	font-size: 40px;
}
.correct {
	color: blue;
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
				<div class="navbar-header"><a class="navbar-brand navbar-link" href="index.html">News Carpet</a></div>
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
		<div class="content">
		<div class="row" ng-controller="playingController">
			<!-- TODO start here -->
			<div class="container">

				<sound-manager></sound-manager>
				<div class="col-md-12">
					
					<button type="button" class="btn" music-player="play" add-song="song">Tip: Listening the word</button>
					<button type="button" class="btn pull-right" ng-click="restartGame()">Play Again</button>
					<div class="col-md-6 col-md-offset-3">
						<h2 style="letter-spacing: 8px;" >{{displayWord}}</h2>
					</div>
					<br>
					<br>
					<br>
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-default">
							<div class="panel-body">
								<img src="img/hangman_{{lose}}.gif" class="img-rounded" alt="Cinque Terre" width="500" height="336"> 
							</div>
						</div>
					</div>
					<div class="a-z row">
						<div class="col-md-10 col-md-offset-1">
							<a ng-click="tryGuess('a')" ng-class="{'correct' : correctGuess.includes('a')}" href="">A</a>
							<a ng-click="tryGuess('b')" ng-class="{'correct' : correctGuess.includes('b')}" href="">B</a>
							<a ng-click="tryGuess('c')" ng-class="{'correct' : correctGuess.includes('c')}"  href="">C</a>
							<a ng-click="tryGuess('d')" ng-class="{'correct' : correctGuess.includes('d')}"  href="">D</a>
							<a ng-click="tryGuess('e')" ng-class="{'correct' : correctGuess.includes('e')}"  href="">E</a>
							<a ng-click="tryGuess('f')" ng-class="{'correct' : correctGuess.includes('f')}"  href="">F</a>
							<a ng-click="tryGuess('g')" ng-class="{'correct' : correctGuess.includes('g')}"  href="">G</a>
							<a ng-click="tryGuess('h')" ng-class="{'correct' : correctGuess.includes('h')}"  href="">H</a>
							<a ng-click="tryGuess('i')" ng-class="{'correct' : correctGuess.includes('i')}"  href="">I</a>
							<a ng-click="tryGuess('j')" ng-class="{'correct' : correctGuess.includes('j')}"  href="">J</a>
							<a ng-click="tryGuess('k')" ng-class="{'correct' : correctGuess.includes('k')}"  href="">K</a>
							<a ng-click="tryGuess('l')" ng-class="{'correct' : correctGuess.includes('l')}"  href="">L</a>
							<a ng-click="tryGuess('m')" ng-class="{'correct' : correctGuess.includes('m')}"  href="">M</a>
							<a ng-click="tryGuess('n')" ng-class="{'correct' : correctGuess.includes('n')}"  href="">N</a>
							<a ng-click="tryGuess('o')" ng-class="{'correct' : correctGuess.includes('o')}"  href="">O</a>
							<a ng-click="tryGuess('p')" ng-class="{'correct' : correctGuess.includes('p')}"  href="">P</a>
							<a ng-click="tryGuess('q')" ng-class="{'correct' : correctGuess.includes('q')}"  href="">Q</a>
							<a ng-click="tryGuess('r')" ng-class="{'correct' : correctGuess.includes('r')}"  href="">R</a>
							<a ng-click="tryGuess('s')" ng-class="{'correct' : correctGuess.includes('s')}"  href="">S</a>
							<a ng-click="tryGuess('t')" ng-class="{'correct' : correctGuess.includes('t')}"  href="">T</a>
							<a ng-click="tryGuess('u')" ng-class="{'correct' : correctGuess.includes('u')}"  href="">U</a>
							<a ng-click="tryGuess('v')" ng-class="{'correct' : correctGuess.includes('v')}"  href="">V</a>
							<a ng-click="tryGuess('w')" ng-class="{'correct' : correctGuess.includes('w')}"  href="">W</a>
							<a ng-click="tryGuess('x')" ng-class="{'correct' : correctGuess.includes('x')}"  href="">X</a>
							<a ng-click="tryGuess('y')" ng-class="{'correct' : correctGuess.includes('y')}"  href="">Y</a>
							<a ng-click="tryGuess('z')" ng-class="{'correct' : correctGuess.includes('z')}"  href="">Z</a>
							
						</div>
					</div>
				</div>
        </div>
			</div>		
			<!-- TODO end here cstsangac -->
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
		<br>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/angular-soundmanager2.js"></script>
		<script type="text/javascript" src="app/app.js"></script>
    </body>
</html>
//Define an angular module for our app
var app = angular.module('myApp', ['angularSoundManager']);

app.controller('sourcesController', function($scope, $http, $sce, $rootScope) {
	
	getSource(); // Load all available tasks
	getSourceFromCart();
	$rootScope.grade;
	// show the learning page after login
	$scope.userid;
	console.log($scope.userid);
	function getSource(){  
		$http.post("ajax/getSource.php?uid=" + $scope.userid).success(function(data){
			$rootScope.sources = data;
			console.log($rootScope.sources)
			

			$http.get("ajax/getAverageLevel.php").success(function(data2){
				console.log(data2);
				$rootScope.grade = data2;
			});
				


		});

	};
	
	$scope.getGradeBy = function (sourcename) {
		var i;
		console.log($rootScope.grade.length)
		for (i=0 ; i < $rootScope.grade.length ; i++) {
			if ($rootScope.grade[i].sourcename == sourcename) {
				return $rootScope.grade[i].grade;
			}
		}
	}
	
	function getSourceFromCart(){  
		$http.post("ajax/getSourceFromCart.php?uid="+ $scope.userid).success(function(data){
			$scope.sourcesFromCart = data;
			console.log($scope.sourcesFromCart)
			//console.log($scope.tasks[0].url)
		});

	};
	
	$scope.renderHtml = function (htmlCode) {
		return $sce.trustAsHtml(htmlCode);
	};
	$scope.addSource = function (sourceurl) {
		$http.post("ajax/addSource.php?url=" + sourceurl).success(function(data){
			getSource();
			console.log("hello")
		});
		$scope.addNewClicked = false;
	};
	$scope.deleteTask = function (sourcename) {
	if(confirm("Are you sure to unsubscrible this source?")){
		$http.post("ajax/unsubscribeSource.php?uid="+ $scope.userid + "&sourcename=" + sourcename).success(function(data){
			getSource();
		  });
		}
	};
	$scope.previewSource = function (url) {
		$scope.isPreviewShow = true;
		$http.get("ajax/getSourceContent.php?q=" + url).success(function(data){
			$scope.body = data;
			console.log(data);
		}); 

	};

	$scope.subscrible = function(sourcename) {
	   $http.post("ajax/subscribeSource.php?uid="+ $scope.userid +"&sourcename="+sourcename).success(function(data){
	     getSource();
			$http.get("ajax/getSourceFromCart.php?uid=" + $scope.userid).success(function(data){
			$scope.sourcesFromCart = data;
			console.log($scope.sourcesFromCart)
			});

			
	   });
	   
	};
	

	
	$scope.unsubscrible = function (sourcename) {
		if(confirm("Are you sure to delete this line?")){
			$http.post("ajax/unsubscribeSource.php?uid="+ $scope.userid +"&sourcename="+sourcename).success(function(data){
				getSourceFromCart();
				getSource();
			});
		}
	};

});


// Reading Controller
app.controller('readingController', function($scope, $http, $sce) {
	$scope.clickedItem = 0;
	getSourceFromCart();
	console.log("HELLO, it is reading controller")
	function getSourceFromCart(){  
		$http.post("ajax/getSourceFromCart.php?uid="+ $scope.userid).success(function(data){
			$scope.sourcesFromCart = data;
			console.log($scope.sourcesFromCart)
			//console.log($scope.tasks[0].url)
		});

	};
	
	$scope.renderHtml = function (htmlCode) {
		return $sce.trustAsHtml(htmlCode);
	};
	
	$scope.addNews = function(sourcename,title,date,desc) {
		$http({
			url: "ajax/addNews.php", 
			method: "GET",
			params: {
				title: title,
				date: date,
				desc: desc,
				uid: $scope.userid,
				sourcename: sourcename
			}
		 }).then(function successCallback(response) {
				console.log(response)
		  }, function errorCallback(response) {
			console.log("hi2")
		  });
		 console.log("hi")
 
	}
	
	$scope.viewSource = function (url,index, sourceName) {
		$scope.selectedSourceName = sourceName;
		$scope.clickedItem = index;
		$http.get("ajax/getSourceContentInReading.php?q=" + url).success(function(data){
			$scope.articleContents = data;
			console.log(data);
		}); 
		$http.get("ajax/getLevel.php?uid=" + $scope.userid + "&sourceName=" + sourceName).success(function(data){
			$scope.getLevel = data;
			console.log($scope.getLevel[0].count);
		}); 

	};
	
	$scope.fullSize = function (title,date,desc) {
		$scope.title = title;
		$scope.date = date;
		$scope.desc = desc;
	}
	
	$scope.setLevel = function(level,sourceName) {
		console.log(level + " " + sourceName);
		$http.get("ajax/setLevel.php?level=" + level + "&sourceName=" + sourceName + "&uid="+ $scope.userid).success(function(data){

			$http.get("ajax/getLevel.php?uid=" + $scope.userid + "&sourceName=" + sourceName).success(function(data2){
				$scope.getLevel = data2;
				console.log($scope.getLevel[0].count);
			});
		}); 
		

	}

});

// Writing Controller
app.controller('writingController', function($scope, $http, $sce) {

	console.log("HELLO, it is writing controller!");
	$scope.clickedItem = 1;
	getArticlesFromYourNews();
	getNumOfFeedback();
	
	$scope.switchTab = function() {
		if ($scope.clickedItem == 1) {
			$scope.clickedItem = 2;
		} else {
			$scope.clickedItem = 1;
		}
	}
	function getArticlesFromYourNews(){  
		$http.get("ajax/getArticlesFromYourNews.php?uid="+ $scope.userid).success(function(data){
			$scope.yournews = data;
			console.log($scope.yournews)
			//console.log($scope.tasks[0].url)
		});

	};
	
	function getNumOfFeedback(){  
		$http.get("ajax/getNumOfFeedback.php?uid="+ $scope.userid).success(function(data){
			$scope.numOfFeedback = data;
			console.log($scope.numOfFeedback)
			//console.log($scope.tasks[0].url)
		});

	};

});

// Playing Controller
app.controller('playingController', function($scope, $http, $sce, $rootScope) {
	console.log("HELLO, it is playing controller");
	$rootScope.correctGuess = "";
	$rootScope.word = "We are finding the diffcult word for you :)";
	$rootScope.displayWord = "Finding the word :)";
	$rootScope.lose = 0;

			
	getWord();

	
	function getWord(){  
		$http.get("ajax/getWordForHangman.php?uid=" + $scope.userid).success(function(data){
			console.log(data);
				
			if(angular.isUndefined(data.results)) {
				getWord();
			} else {
				
				$rootScope.song = {
					id: 'one',
					url: ''
				};
				$rootScope.song.id = Math.floor((Math.random()*6)+1);
				$rootScope.word = data.results[0].word;
				var display = "";
				for (var i=0; i<$rootScope.word.length; i++) {
					display = "_" + display;
				}
				$rootScope.displayWord = display;
				$rootScope.song.url = data.results[0].lexicalEntries[0].pronunciations[0].audioFile;
				console.log($rootScope.word);
				console.log(data.results[0]);
				console.log($rootScope.song.url);
				console.log(data.results[0].lexicalEntries[0].pronunciations[0].audioFile);
				

			}

			//console.log($scope.tasks[0].url)
		});

	};
	
	function playHangman() {
		
		console.log($rootScope.word);
		$http({
			url: "ajax/hangmanGame.php", 
			method: "GET",
			params: {
				guess: $rootScope.correctGuess,
				word: $rootScope.word,
				lose: $rootScope.lose
			}
		}).then(function successCallback(response) {
			console.log(response.data.correctGuess);
			console.log(response.data.displayWord);
			console.log(response.data.lose);
			$rootScope.correctGuess = response.data.correctGuess;
			$rootScope.displayWord = response.data.displayWord;
			$rootScope.lose = response.data.lose
			if($rootScope.lose >= 6) {
				$rootScope.displayWord = $rootScope.word;
			}
			else if($rootScope.displayWord == $rootScope.word) {
					$rootScope.lose = 100;
			}
		}, function errorCallback(response) {
			console.log("error")
		});
		
	};
	
	$scope.tryGuess = function (letter) {
		if($rootScope.lose >= 6) {
			return;
		}
		
		if($rootScope.correctGuess.includes(letter)) {
			return;
		}
		$rootScope.correctGuess = $rootScope.correctGuess + letter;
		console.log("HELLO"+$rootScope.correctGuess);
		playHangman();
	}
	
	$scope.restartGame = function() {
		$rootScope.correctGuess = "";
		$rootScope.displayWord = "Finding the word :)";
		$rootScope.word = "We are finding the diffcult word for you :)";
		$rootScope.lose = 0;
		getWord();
	}

});


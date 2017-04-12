//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('sourcesController', function($scope, $http, $sce) {
	
	getSource(); // Load all available tasks
	getSourceFromCart();
	
	// show the learning page after login
	$scope.userid;
	console.log($scope.userid);
	function getSource(){  
		$http.post("ajax/getSource.php?uid=" + $scope.userid).success(function(data){
			$scope.sources = data;
			console.log($scope.sources)
			//console.log($scope.tasks[0].url)
		});

	};
	
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
	if(confirm("Are you sure to delete this line?")){
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
			$http.post("ajax/getSourceFromCart.php?uid=" + $scope.userid).success(function(data){
			$scope.sourcesFromCart = data;
			console.log($scope.sourcesFromCart)
			//console.log($scope.tasks[0].url)
			});
			
	   });
	   
	};
	
	$scope.unsubscrible = function (sourcename) {
		if(confirm("Are you sure to delete this line?")){
			$http.post("ajax/unsubscribeSource.php?uid="+ 1 +"&sourcename="+sourcename).success(function(data){
				getSourceFromCart();
				getSource();
			});
		}
	};

});


// Reading Controller
app.controller('readingController', function($scope, $http, $sce) {
	getSourceFromCart();
	console.log("HELLO, it is reading controller")
	function getSourceFromCart(){  
		$http.post("ajax/getSourceFromCart.php?uid="+ $scope.userid).success(function(data){
			$scope.sourcesFromCart = data;
			console.log($scope.sourcesFromCart)
			//console.log($scope.tasks[0].url)
		});

	};

});

// Writing Controller
app.controller('writingController', function($scope, $http, $sce) {

	console.log("HELLO, it is writing controller");


});

// Playing Controller
app.controller('playingController', function($scope, $http, $sce) {
	
	console.log("HELLO, it is playing controller")

});


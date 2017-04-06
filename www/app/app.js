//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('sourcesController', function($scope, $http, $sce) {
	
	getSource(); // Load all available tasks
	getSourceFromCart();
	
	function getSource(){  
		$http.post("ajax/getSource.php?uid=" + 1).success(function(data){
			$scope.sources = data;
			console.log($scope.sources)
			//console.log($scope.tasks[0].url)
		});

	};
	
	function getSourceFromCart(){  
		$http.post("ajax/getSourceFromCart.php?uid="+ 1).success(function(data){
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
		$http.post("ajax/unsubscribeSource.php?uid="+1 + "&sourcename=" + sourcename).success(function(data){
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
	   $http.post("ajax/subscribeSource.php?uid="+1+"&sourcename="+sourcename).success(function(data){
	     getSource();
			$http.post("ajax/getSourceFromCart.php?uid="+ 1).success(function(data){
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




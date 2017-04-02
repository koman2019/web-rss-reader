//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('sourcesController', function($scope, $http, $sce) {
	getSource(); // Load all available tasks 
	function getSource(){  
		$http.post("ajax/getSource.php").success(function(data){
			$scope.tasks = data;
			console.log($scope.tasks)
			//console.log($scope.tasks[0].url)
		});
		//url = 'http://news.google.com/news?ned=us&topic=h&output=rss';

	    //$http.get("ajax/getSourceContent.php?q=Google").success(function(data){
        //    $scope.body = data;
        //    console.log(data);
		//}); 
		


        //$scope.body = '<div style="width:200px; height:200px; border:1px solid blue;"></div>'; 
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

	$scope.toggleStatus = function(item, status, task) {
	//if(status=='2'){status='0';}else{status='2';}
	//  $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data){
	//    getTask();
	//  });
	};

});



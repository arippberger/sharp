"use strict";

var ctrls = angular.module('sharp.controllers', []);

ctrls.controller('AppCtrl', function ($scope, $http) {
});

ctrls.controller('PostsListCtrl', function ($scope, sharp, $http, $sce, $routeParams) {
	//console.log("running PostsListCtrl");
	$scope.posts;

	// console.log($routeParams);

	//list posts? pages?
	var list = $routeParams.list;

	sharp.list(list).then(function (data) {
		//posts is posts json
		$scope.posts = data.data;

		//count posts
		var imax = $scope.posts.length;
		//for each post trust content as html and store as trustedHtml variable
		for (var i = 0; i < imax; i++){
			$scope.posts[i].trustedHtml = $sce.trustAsHtml($scope.posts[i].content);
		}
		
	});
});

ctrls.controller('DateArchiveCtrl', function ($scope, sharp, $http, $routeParams) {
	$scope.posts;
	
	//get month and year form routeParams
	var month = $routeParams.month;
	var year = $routeParams.year;

	//site = $rootScope.site + '$routeParams'
	sharp.dateArchive(month, year).then(function (data) {
		$scope.posts = data.data;
	});

});

ctrls.controller('SingleCtrl', function ($scope, sharp, $http, $routeParams, $sce) {
	$scope.post;
	
	//get month and year form routeParams
	var list = $routeParams.list;
	var id = $routeParams.id;

	//site = $rootScope.site + '$routeParams'
	sharp.single(list, id).then(function (data) {
		$scope.post = data.data;
		//trust post body
		$scope.post.trustedHtml = $sce.trustAsHtml($scope.post.content)
	});
});


"use strict";

var SharpApp = angular.module('sharp', [
    'sharp.controllers',
    'sharp.filters',
    'sharp.directives',
    'sharp.services',
    'ngRoute'
]);

//set the configuration
SharpApp.run(['$rootScope', function($rootScope){
  // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
  $rootScope.dir = BlogInfo.url;
  $rootScope.site = BlogInfo.site;
  $rootScope.api = AppAPI.url;
  // console.log("rootScope.dir: ");
  // console.log($rootScope.dir);
  // console.log("rootScope.site: ");
  // console.log($rootScope.site);
  // console.log("rootScope.api: ");
  // console.log($rootScope.api);    

}]);


// SharpApp.config(["$routeProvider", function ($routeProvider) {
//   $routeProvider
//     .when("/date/:month/:year", {controller: "DateArchiveCtrl", templateUrl: "../partials/date_archive.html"})
//     .otherwise({controller: "PostsListCtrl", templateUrl: "../partials/post_list.html"})
// }]);

SharpApp.config(function ($routeProvider) {
  $routeProvider
  .when("/date/:month/:year", {controller: "DateArchiveCtrl", templateUrl: BlogInfo.url + "partials/date_archive.html"})
  .when("/:list", {controller: "PostsListCtrl", templateUrl: BlogInfo.url + "partials/post_list.html"})
  .when("/:list/:id", {controller: "SingleCtrl", templateUrl: BlogInfo.url + "partials/single.html"})
  .otherwise({redirectTo: "/posts"})
});



"use strict";

var services = angular.module('sharp.services', []);

services.factory('sharp', function ($http) {
	function simpleLoad(path, params) {
		//check if params is array - if so combine array values to a string
		if (Array.isArray(params)) {
			//if params is an array, count how many items it contains
			var count = params.length;
			var urlParams = '';
			//add each array item to a string separated by a slash
			for (var i = 0; i < count; i++) {
				urlParams = urlParams + params[i] + '/';
			}
			//set the params variable to the concatinated string
			params = urlParams;
		}
		if (null == path || path == undefined) {
			path = '';
		}
		if (null == params || params == undefined) {
			params = '';
		}		
		return $http.get('http://sharp.dev/wp-json/' + path + '/' + params);
	}
	function dateLoad(month, year) {
		return $http.get('http://sharp.dev/wp-json/posts/?filter[monthnum]=' + month + '&filter[year]=' + year);
	}
	return {
		list: function (type) {
			//return $http.get('http://sharp.dev/wp-json/' + type );
			return simpleLoad("" + type);
		},
		single: function (type, id) {
			return simpleLoad(type, id);
		},
		dateArchive: function (month, year) {
			return dateLoad(month, year);
		}
	}

});
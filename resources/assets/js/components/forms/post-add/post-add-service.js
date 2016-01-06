angular.module('stream.post-adds', [])

.factory('PostAdd', function($http) {

    return {
    	create: function(data) {

		    return $http({
		    	method: 'POST',
		    	url: '/api/v1/post', 
		    	headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8' },
				data: data
		    })
			.success(function(data, status, headers, config) {
				//
			})
			.error(function(data, status, headers, config) {
				//
			});
		     
    	}

    }

});
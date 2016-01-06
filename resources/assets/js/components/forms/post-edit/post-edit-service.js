angular.module('stream.post-edits', [])

.factory('PostEdit', function($http) {

    return {
    	save: function(data) {

		    return $http({
		    	method: 'PUT',
		    	url: '/api/v1/post/'+data.id, 
		    	data: data,
		    	headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8' }
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
angular.module('stream.post_listc', [])

.controller('post_listCtrl', function($scope, $rootScope, PostList) {
        
 	// save previous state
	$rootScope.previousState = "";
        
    PostList.getPosts()
        .success(function(data) {
            $scope.posts = data;
            $scope.page.loaded = true;
            $(".ng-panel").css("height","auto");
        });
	
});
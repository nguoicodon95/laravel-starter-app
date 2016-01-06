angular.module('stream.post_editc', [])

.controller('post_editCtrl', function($scope, $rootScope, PostEdit) {

	/**

	- show post edit overlay if logged in user and
	  post author is the same otherwise remove template
	- CRUD edit / get and update / put

	*/

  	var userId = Number($(".identity-cache").text());

  	if($rootScope.valid && $rootScope.userId === userId) {
		$('.stream.overlay').show();
		$('body').addClass('hide-interface');
	} else {
		// empty template
		$(".overlay-wrapper").html("");
		$('.stream.overlay').show();
	}

	var postId = "", title = "", body = "";
	var titleEl = $(".post-edit-form").find("input[name='title']");
	var bodyEl = $(".post-edit-form").find("textarea[name='body']");

	function getPostId() {
		var href = location.href;
		var post = href.split("post")[1];
		var hash = post.split("#")[0]
		var id = hash.split("/")[1];
		return id;
	}

	if($rootScope["details"] != undefined) {
		postId = $rootScope.details[0].id;
		userId = $rootScope.details[0].user_id;
		title = $rootScope.details[0].title;
		body = $rootScope.details[0].body;
	} else {
		postId = getPostId();
		userId = $(".identity-cache").text();
		title = $(".title-cache").text();
		body = $(".body-cache").text();
	}

	titleEl.val(title);
	bodyEl.text(body);

	$scope.editPost = function() {
		var post = {
			"id": postId,
			"userId": userId,
			"title": titleEl.val(),
			"body": bodyEl.val(),
		}

        PostEdit.save(post)
        	.success(function(data) {
        		$scope.closeOverlay();
        	});
    };
	
	// add image
	$scope.updateImages = function() {
		$(".image-edit-group").show();
		$(".post-edit-group").hide();
	} 
	
	// done
	$scope.done = function() {
		$(".image-edit-group").hide();
		$(".image-add-group").hide();
		$(".post-edit-group").show();
	} 
	
	$scope.closeOverlay = function() {
		$('.stream.overlay').hide();
		$('body').removeClass('hide-interface');
		var href = location.href;
		var firstFrag = href.split("#")[0];
		location.href = firstFrag + "#/" + $rootScope.previousState;	
	}

});
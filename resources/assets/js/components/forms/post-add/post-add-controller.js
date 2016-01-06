angular.module('stream.post_addc', [])

.controller('post_addCtrl', function($scope, $rootScope, $http, PostAdd, CSRF_TOKEN, $compile) {

	var userId = $rootScope.userId, tagResult = "";
	
  	if($rootScope.valid) {
		$('.stream.overlay').show();
		$('body').addClass('hide-interface');
		
		if($rootScope.newTag != "") {
			$("input[name='displaystream']").val($rootScope.newTag);
			$("input[name='streamname']").val($rootScope.newTag);
			$(".selected-stream").show();
		} else {
			// show get stream
			$(".get-stream").show();
		}
		
	} else {
		// empty template
		$(".overlay-wrapper").html("");
		$('.stream.overlay').hide();
	}
	
	var tokenEl = $(".post-add-form").find("input[name='_token']");
	var titleEl = $(".post-add-form").find("input[name='title']");
	var bodyEl = $(".post-add-form").find("textarea[name='body']");
	var streamNameEl = $(".post-add-form").find("input[name='streamname']");
	var streamIdEl = $(".post-add-form").find("input[name='streamid']");
	
	// pass token
	tokenEl.val(CSRF_TOKEN);
	
	$scope.selectCurrentStream = function(e) {
		$(".selected-stream").show();
		$("input[name='displaystream']").val($(e.target).data("tag"));
		$("input[name='streamid']").val($(e.target).data("id"));
		$(".tag-results-wrapper").hide();
		$(".get-stream").hide();
		$(".create-new-tag").hide();
	}
	
	$scope.createNewStream = function(e) {
		$(".selected-stream").show();
		$("input[name='displaystream']").val($(e.target).data("tag"));	
		$("input[name='streamname']").val($(e.target).data("tag"));
		$(".tag-results-wrapper").hide();
		$(".get-stream").hide();
		$(".create-new-tag").hide();
	}
	
	$scope.changeStream = function() {
		$(".selected-stream").hide();
		$("input[name='streamid']").val("0");
		$("input[name='streamname']").val("0");
		$(".get-stream").show();
		// empty all input values
		$(".get-stream input[name='stream']").val("");
	}
	
	$scope.tagSearch = function() {
		if($scope.tagSearchData != "") {
			var term = $scope.tagSearchData.replace(/ /g,'');
			return $http.get('/api/v1/tagssearch?q='+term)
			.then(function(response) {
				tagResult = response.data.tags;
				if(tagResult.length === 0) {
					$(".create-new-tag").show();
					$(".tag-results-wrapper").hide();
					$(".tag-results").html("");
				} else {
					tagResult = tagResult.map(function(item) {
						return "<div><a href=\"#\" ng-click=\"selectCurrentStream($event)\" data-id=\""+item.id+"\" data-tag=\""+item.name+"\" style=\"margin-top:2px;display:block\">"+item.name+"</a></div>";
					});
					var parseResult = tagResult.join("");
					var compiled = $compile(parseResult)($scope);
					$(".create-new-tag").hide();
					$(".tag-results-wrapper").show();
					$(".tag-results").html(compiled);
				}
			});
		} else {
			$(".tag-results, .create-new-tag").hide();
			$(".tag-results").html("");
		}	
	}
	
	$scope.publish = function() {
		var post = {
			"_token": tokenEl.val(),
			"userId": userId,
			"title": titleEl.val(),
			"body": bodyEl.val(),
			"streamid": streamIdEl.val(),
			"streamname": streamNameEl.val()
		}

        PostAdd.create(post)
        	.success(function(data) {
				$(".stream-err").hide();
				if(data.success === false) {
					$(".stream-err").show();
				} else {
					$scope.closeOverlay();
				}	
        	});
    };

	// add image
	$scope.addImage = function() {
		$(".image-add-group").show();
		$(".post-add-group").hide();
	} 
	
	// done
	$scope.done = function() {
		$(".image-add-group").hide();
		$(".post-add-group").show();
	} 

	$scope.closeOverlay = function() {
		$('.stream.overlay').hide();
		$('body').removeClass('hide-interface');
		var href = location.href;
		var firstFrag = href.split("#")[0];
		location.href = firstFrag + "#/" + $rootScope.previousState;	
	}

});
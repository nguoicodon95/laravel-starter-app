(function() {

	// modals
	$(".stream.button").on("click", function() {
    	$(".stream-modal").modal("show");	    		
	});

	$(".post.button").on("click", function() {
    	$(".post-modal").modal("show");	    		
	});

	$(".signin.link").on("click", function() {
    	$(".signin-modal").modal("show");	    		
	});

	$(".features.link").on("click", function() {
    	$(".features-modal").modal("show");	    		
	});

})();
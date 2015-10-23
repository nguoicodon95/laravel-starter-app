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

	// post wizard module
	var postWizard = {};

	window.pw = pw = postWizard;

	pw.defaults = {
		buttons : {
			next : ".next.button"
		},
		wrapper : ".post-wizard",
		"form-holders" : ".post-wizard-"
	}

	pw.init = function() {

		var h = pw.defaults["form-holders"].split(".")[1];

		// hide all holders
		var holder = $(pw.defaults.wrapper).find("*[class*='"+h+"']");

		holder.hide();

		// show first one
		holder.eq(0).show();

	}

	pw.init();

})();
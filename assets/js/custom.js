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
		var holder = pw.getHolder();
		pw.hideAll();
		pw.show(1);
		pw.events();
	}

	pw.getHolder = function() {
		var h = pw.defaults["form-holders"].split(".")[1];
		var holder = $(pw.defaults.wrapper).find("*[class*='"+h+"']");
		return holder;
	}

	pw.hideAll = function() {
		var holder = pw.getHolder();
		holder.hide();
	}

	pw.show = function(p) {
		var holder = pw.getHolder();
		var n = Number(p) - 1;
		holder.eq(n).show();
	}

	pw.events = function() {
		var n = $(pw.defaults.buttons.next);
		$(n).on("click", function(e) {
			var p = $(e.target).data("next");
			pw.hideAll();
			pw.show(p);		
		})

	}

	pw.init();

})();
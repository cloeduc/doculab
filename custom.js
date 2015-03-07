jQuery("document").ready(function($){
	var nav = $('#secondary');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {
			nav.addClass("f-nav");
		} else {
			nav.removeClass("f-nav");
		}
	});
	console.log($(window).height());
});
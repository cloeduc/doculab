

jQuery("document").ready(function($){
	jQuery.fn.exists = function(){return this.length>0;}
	var nav = $('#secondary');
	nav.addClass('fixed-nav');
	if(window.innerHeight >= nav.height()) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				nav.addClass("f-nav");
			} else {
				nav.removeClass("f-nav");
			}
		});
	} else {
		nav.removeClass('fixed-nav');
		nav.addClass('fluid-nav');
	}
	jQuery('a.scroll-to').click(function(){
		var id = jQuery(this).attr('href');
		if(id != '#' && id != '' && id.substring(0,1) == '#') {
			scrollToAnchor(id.substring(1,id.length));
		}
	});
	jQuery('.primary-menu li.last a').click(function(){
			return slideLogin();
		});

    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 10,
        asNavFor: '#slider'
      });
      
      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  	$('#menu-item-135').click(function(){
  		$('#explorenav').slideToggle();
  	});
  	$("#contribuer").click(function(){
  			if(jQuery('#middleheader').exists()) {
  				jQuery('html,body').animate({scrollTop:jQuery('#header').offset().top}, 1000);
  				return slideLogin();
  			}
  	});
  	$('#toregistration').click(function(){
  		$('#registration').slideToggle();
  	})
  	$('#toforgotpassword').click(function(){
  		$('#forgotpassword').slideToggle();
  	})
  	$(document).delegate('.cleanlogin-form', 'submit', function(){

  		//return false;
  	});
});

function slideLogin(){
	console.log(jQuery('#middleheader').exists());
	if(jQuery('#middleheader').exists())
	{
		jQuery('#middleheader').slideToggle();
		jQuery('#menu-item-20').toggleClass('current-menu-item');
		if(jQuery('#navigation').css('margin-bottom')=='0px') {
			jQuery('#navigation').css('margin-bottom', '10px')
		} else {
			jQuery('#navigation').css('margin-bottom', '0px')
		}
		return false;
	}
}

function scrollToAnchor(aid){
    var aTag = jQuery("a[name='"+ aid +"']");
    console.log(aTag);
    if(aTag[0]) {
    	scrollToElement(aTag);
    }
}
function scrollToElement(element, delay)
{
	delay = (delay != null)? delay : 'slow';
	jQuery('html,body').animate({scrollTop: element.offset().top-80}, delay);
}
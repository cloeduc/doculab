/** THEME OPTIONS JS **/
jQuery(document).ready(function() {

    jQuery('.color').wpColorPicker();

    if(getCookie("currtab") != "" && getCookie("currtab") != null) {
	    jQuery(".tab").removeClass("current-tab");
	    var currtab = getCookie("currtab");
	    jQuery("#" + currtab).addClass("current-tab");
	    var currsection = currtab.replace("tab","section");
	    jQuery(".section").hide();
	    jQuery("#" + currsection).show();
    }
    jQuery(".tab").click(function() {
        var tabId = jQuery(this).attr("id");
        var secId = tabId.replace("tab","section");
        if(!jQuery(this).hasClass("current-tab")) {
            jQuery(".tab").removeClass("current-tab");
            jQuery(this).addClass("current-tab");
            jQuery(".section").hide();
            jQuery("#" + secId).fadeIn(500);
        }
    });
    
    jQuery("input[type='submit']").click(function() {
        var currentTabId = jQuery(".current-tab").attr("id");
        setCookie("currtab",currentTabId,3);
    });
    
    jQuery(".image-select").click(function() {
	var elem = jQuery(this).attr("rel");
	jQuery(".image-select").removeClass("selected");
	jQuery(this).addClass("selected");
	var sval = jQuery(this).attr("id").replace("image-select-","");
	jQuery("#" + elem).val(sval);
    });
    
    /** Adapting the Theme option page to Admin page color scheme **/
    jQuery(".settings-title").css("background-color",jQuery("#adminmenuwrap").css("background-color"));
    jQuery(".settings-title").css("color",jQuery("#wpadminbar").css("color"));
    jQuery(".settings-tabs").css("background-color", jQuery(".wp-submenu-wrap").css("background-color"));
    jQuery(".tab").css("color", jQuery(".wp-submenu li").css("color"));
    
    /* Re-positioning the Error Message */
    var settings_error = jQuery(".settings-error");    
    jQuery(".settings-error").remove();
    settings_error.appendTo("#error-container");
});

function setCookie(name,value,secs) {
    if(secs) {
        var date = new Date();
        date.setTime(date.getTime()+(secs*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==" ") c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
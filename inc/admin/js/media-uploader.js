/* == Media Uploader == */

jQuery(document).ready(function() {
    var formfieldID;
    window.send_to_editor = function(html) {
        imgurl = jQuery("img",html).attr("src");
        jQuery("#" + formfieldID).val(imgurl);
        tb_remove();
    }
    jQuery(document).on("click", ".image_upload", function() {
        var btnId = jQuery(this).attr("id");
        formfieldID = btnId.replace("_upload","");
        tb_show("", "media-upload.php?type=image&amp;TB_iframe=1");
        return false;
    });
});
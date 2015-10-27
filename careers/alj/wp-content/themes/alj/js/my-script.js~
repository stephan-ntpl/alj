
jQuery(document).ready( function(  ) {
alert("test");
   jQuery('#upload_image_button').click(function() {
   	alert("test2");
        formfield = jQuery('#upload_image').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    window.send_to_editor = function(html) {

        imgurl = jQuery('img',html).attr('src');
        jQuery('#upload_image').val(imgurl);
        tb_remove();
    }

});
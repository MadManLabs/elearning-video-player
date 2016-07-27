jQuery(document).ready(function() {
	
	var formfield;
	var formfieldsub;
	
	jQuery('#upload_image_button').click(function() {
		jQuery('html').addClass('Image');
		formfield = jQuery('#poster_link').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});
	jQuery('#upload_sub_button').click(function() {
		jQuery('html').addClass('subtitle');
		formfieldsub = jQuery('#sub_link').attr('name');
		tb_show('', 'media-upload.php?TB_iframe=true');
		return false;
	});
	
	// user inserts file into post. only run custom if user started process using the above process
	// window.send_to_editor(html) is how wp would normally handle the received data

	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){

		if (formfield) {
			fileurl = jQuery('img',html).attr('src');
			
			jQuery('#poster_link').val(fileurl);

			tb_remove();
			
			jQuery('html').removeClass('Image');
		
		} else if (formfieldsub) {
		    fileurl = jQuery(html).attr('href');
			
			jQuery('#sub_link').val(fileurl);

			tb_remove();
			
			jQuery('html').removeClass('subtitle');
		} else {
			window.original_send_to_editor(html);
		}
	};

});
jQuery(document).ready(function($) {
	
	// detect input video link and show message
	$("#video_link").focusout(function(){
				var url = jQuery(this).val();
				if (url != undefined || url != "") {        
			        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
			        var match = url.match(regExp);
			        if (match && match[2].length == 11) {
			        	jQuery(this).val("https://www.youtube.com/watch?v=" + match[2]);
			        	jQuery(this).next().html("You just entered a <b>Youtube</b> link");
			        } else {
			            jQuery(this).next().text("You just entered a link");
			        }
			    }	
				
			});
	
	// copy shortcode to clipboard
	new Clipboard(".btn");
	$("#copy-shortcode").click(function(){$(this).html("Shortcode Copied");});
	
	// media uploader
	var formfield;
	var formfieldsub;
	$('#upload_image_button').click(function() {
		$('html').addClass('Image');
		formfield = $('#poster_link').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});
	$('#upload_sub_button').click(function() {
		$('html').addClass('subtitle');
		formfieldsub = $('#sub_link').attr('name');
		tb_show('', 'media-upload.php?TB_iframe=true');
		return false;
	});
	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){

		if (formfield) {
			fileurl = $('img',html).attr('src');
			
			$('#poster_link').val(fileurl);

			tb_remove();
			
			$('html').removeClass('Image');
		
		} else if (formfieldsub) {
		    fileurl = $(html).attr('href');
			
			$('#sub_link').val(fileurl);

			tb_remove();
			
			$('html').removeClass('subtitle');
		} else {
			window.original_send_to_editor(html);
		}
	};
	
	// tab quizz
	$("#visual-tab").html($("textarea#quizz").val());
	$("#tab-navigator span").click(function(){
	    $("#tab-navigator span").removeClass("selected-tab");
	    $(this).addClass("selected-tab");
	    $(".tab").removeClass("current");
	    $(".tab").removeClass("previous");
	    $("#" + $(this).data("tab")).addClass("current");
	    $("#" + $(this).data("tab")).siblings().addClass("previous");
	});
	$("textarea#quizz").focusout(function(){
	    $("#visual-tab").html($(this).val());
	});
	// Change View Video Text
	$("#wp-admin-bar-view a").html("Preview Video");
	$("#wp-admin-bar-view a").attr("target", "_blank");
});
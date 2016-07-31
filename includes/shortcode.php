<?php

function evp_shortcode($evp_val) {
	if(isset($evp_val['width']) && isset($evp_val['height'])){
	    return '<iframe src="'. esc_url(get_permalink( $evp_val['id'] )) .'" allowfullscreen width="'.$evp_val['width'].'" height="'.$evp_val['height'].'" style="border:none;"></iframe>';
	} else {
	    return '<iframe src="'. esc_url(get_permalink( $evp_val['id'] )) .'" allowfullscreen width="480px" height="270px" style="border:none;"></iframe>';
	}
	

}
add_shortcode( 'e-video', 'evp_shortcode' );


?>
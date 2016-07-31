<?php

function lqh_evp_shortcode($val) {
	if(isset($val['width']) && isset($val['height'])){
	    return '<iframe src="'. esc_url(get_permalink( $val['id'] )) .'" allowfullscreen width="'.$val['width'].'" height="'.$val['height'].'" style="border:none;"></iframe>';
	} else {
	    return '<iframe src="'. esc_url(get_permalink( $val['id'] )) .'" allowfullscreen width="480px" height="270px" style="border:none;"></iframe>';
	}
	

}
add_shortcode( 'lqh-e-video', 'lqh_evp_shortcode' );


?>
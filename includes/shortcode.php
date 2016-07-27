<?php

function evp_shortcode($evp_val) {
	if(isset($evp_val['width']) && isset($evp_val['height'])){
	    return '<iframe src="'. plugins_url('/videojs-quizz/video.php?id='.$evp_val['id'], __FILE__) .'" allowfullscreen width="'.$evp_val['width'].'" height="'.$evp_val['height'].'" style="border:none;"></iframe>';
	} else {
	    return '<iframe src="'. plugins_url('/videojs-quizz/video.php?id='.$evp_val['id'], __FILE__) .'" allowfullscreen width="480px" height="270px" style="border:none;"></iframe>';
	}
	

}
add_shortcode( 'e-video', 'evp_shortcode' );


?>
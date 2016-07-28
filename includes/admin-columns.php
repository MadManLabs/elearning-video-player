<?php

add_filter( 'manage_edit-evideo_columns', 'edit_evideo_columns' ) ;

function edit_evideo_columns( $columns ) {

	$columns = array_slice($columns, 0, 2, true) +
    array('preview-video' => __( 'Preview' ), 'short' => __( 'Shortcode' )) +
    array_slice($columns, 2, count($columns)-2, true);
	return $columns;
}

add_action( 'manage_evideo_posts_custom_column', 'manage_evideo_columns', 10, 2 );

function manage_evideo_columns( $column, $post_id ) {
	
	switch( $column ) {

		
		case 'preview-video' :

			$countnumber = '<a href="'.plugins_url('/videojs-quizz/video.preview.php?id='. $post_id, __FILE__).'" target="_blank"><span class="dashicons dashicons-controls-play"></span></a>';
			printf($countnumber );
			break;
		case 'short' :
			printf('[e-video id="'. $post_id .'"]');
			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

?>
<?php

add_filter( 'manage_edit-evideolqh_columns', 'lqh_evp_edit_evideo_columns' ) ;

function lqh_evp_edit_evideo_columns( $columns ) {

	$columns = array_slice($columns, 0, 2, true) +
    array('preview-video' => __( 'Preview' ), 'short' => __( 'Shortcode' )) +
    array_slice($columns, 2, count($columns)-2, true);
	return $columns;
}

add_action( 'manage_evideolqh_posts_custom_column', 'lqh_evp_manage_evideo_columns', 10, 2 );

function lqh_evp_manage_evideo_columns( $column, $post_id ) {
	
	switch( $column ) {

		
		case 'preview-video' :

			$previewbutton = '<a href="'.esc_url(get_permalink( $post_id )).'" target="_blank"><span style="display:block;width: 0;height: 0;	border-top: 10px solid transparent;border-right: 10px solid #0085BA;border-bottom: 10px solid transparent;"></span></a>';
			printf($previewbutton);
			break;
		case 'short' :
			printf('[lqh-e-video id="'. $post_id .'"]');
			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

?>
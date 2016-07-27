<?php
/**
 * Plugin Name: Elearning Video Player
 * Plugin URI: https://github.com/lequanghuylc/elearning-video-player
 * Description: A wordpress plugin that helps your viewers interact with your videos via quizzes
 * Version: 1.0 
 * Author: Huy Le 
 * Author URI: http://lequanghuy.xyz
 * License: GPLv2 or later
 */
 
// add shortcode
require plugin_dir_path( __FILE__ ) . 'includes/shortcode.php';

// add script and style to admin
add_action('admin_head', 'admin_evp_style_and_script');
function admin_evp_style_and_script() {
    global $post_type;
    if ($post_type == 'evideo') {
        wp_enqueue_script('jquery');
    	wp_enqueue_script( 'copy_clipboard', plugins_url('/includes/clipboard.min.js', __FILE__) );
        wp_enqueue_style( 'evp-style', plugins_url('/includes/style.css', __FILE__) );
        wp_enqueue_script('media-upload');
        wp_enqueue_script('evp-upload', plugins_url('/includes/evp-admin.js', __FILE__));
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
    }
}

// add custom post type E-Video and customize 
require plugin_dir_path( __FILE__ ) . 'includes/custom-post-type.php';
?>
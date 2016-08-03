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
add_action('admin_head', 'lqh_evp_admin_style_and_script');
function lqh_evp_admin_style_and_script() {
    global $post_type;
    if ($post_type == 'evideolqh') {
        wp_enqueue_script('jquery');
    	wp_enqueue_script( 'copy_clipboard', plugins_url('/includes/clipboard.min.js', __FILE__) );
        wp_enqueue_style( 'lqh-evp-admin-style', plugins_url('/includes/style.css', __FILE__) );
        wp_enqueue_script('media-upload');
        wp_enqueue_script('lqh-evp-admin-script', plugins_url('/includes/evp-admin.js', __FILE__));
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
    }
}

// add custom post type E-Video and customize 
require plugin_dir_path( __FILE__ ) . 'includes/custom-post-type.php';

// add custom columns to admin
require plugin_dir_path( __FILE__ ) . 'includes/admin-columns.php';

// create single webpage view
add_filter('single_template', 'lqh_evp_custom_template');

function lqh_evp_custom_template($single) {
    global $wp_query, $post;

    /* Checks for single template by post type */
    if ($post->post_type == "evideolqh"){
        if(is_single()){
        if(file_exists(plugin_dir_path( __FILE__ ) . 'includes/single-video.php'))
            return plugin_dir_path( __FILE__ ) . 'includes/single-video.php';
        }
    }
    return $single;
}
// add script and style to front
add_action('wp_print_scripts', 'lqh_evp_front_script');
function lqh_evp_front_script(){
    global $wp_query, $post;
    if ($post->post_type == "evideolqh"){
        if(is_single()){
        wp_enqueue_script('jquery');
        wp_enqueue_script('videojs', plugins_url('/includes/videojs-quizz/js/video-js.5.8.min.js', __FILE__), 5.8);
        wp_enqueue_script('videojs-youtube', plugins_url('/includes/videojs-quizz/js/videojs-youtube.js', __FILE__));
        wp_enqueue_script('videojs-functions', plugins_url('/includes/videojs-quizz/js/video.func.js', __FILE__));
        }
    }
}
add_action('wp_print_styles', 'lqh_evp_front_style');
function lqh_evp_front_style(){
    global $wp_query, $post;
    if ($post->post_type == "evideolqh"){
        if(is_single()){
        wp_enqueue_style( 'videojs-style', plugins_url('/includes/videojs-quizz/css/video-js.5.8.min.css', __FILE__) );
        wp_enqueue_style( 'videojs-quizz-style', plugins_url('/includes/videojs-quizz/css/style.css', __FILE__) );
        }
    }
}
?>
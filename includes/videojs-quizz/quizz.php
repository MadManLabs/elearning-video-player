<?php require('../../../../../wp-blog-header.php'); 
echo !empty(get_post_meta( $_GET['id'], '_quizz', true )) ? get_post_meta( $_GET['id'], '_quizz', true ) : "There isn't any quizz in this video";

?>
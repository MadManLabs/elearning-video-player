<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
$link = get_post_meta( $post->ID, '_videolink', true );
$sub = get_post_meta( $post->ID, '_sub', true );
$poster = get_post_meta( $post->ID, '_poster', true );
$popuptime = get_post_meta( $post->ID, '_popuptime', true );
$quizz = get_post_meta( $post->ID, '_quizz', true );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<?php wp_print_styles(); ?>
<?php wp_print_scripts(); ?>
</head>
<body>
    <div id="videohotkey">
        <p><b>Enter</b>: Fullscreen | <b>Space</b>: Play/Pause | <b>Arrow keys</b>: Jump & Volume<br>
        <b>Q</b>: Open Quizz | <b>M</b>: Mute</p>
    </div>
    <div id="popup">
        <h3>Quizz</h3>
        <div class="quizz-content">
           <?php echo !empty($quizz) ? $quizz : "There isn't any quizz in this video"; ?>
        </div>
        <div class="quizz-control quizz-middle">
            <div class="quizz-close quizz-center"><span class="vjs-icon-cancel z150"></span>  <b class="quizz-control-text">Return</b>
            </div>
            <div class="quizz-submit quizz-center">
            <b class="quizz-control-text">Your Answers</b> <span class="vjs-icon-circle-outline z150"></span> <span id="quizz-score">0</span>/<span id="quizz-all">0</span>
            </div>
            <div class="quizz-again quizz-center"><span class="vjs-icon-replay z150"></span>  <b class="quizz-control-text">Again</b>
            </div>
            <div class="quizz-fullscreen quizz-center">
                <span class="vjs-icon-fullscreen-enter z150"></span> <b class="quizz-control-text">Fullscreen</b> </div>
            
        </div>   
    </div>
    <script>
    var timeToPopup = <?php echo !empty($popuptime) ? $popuptime : 999999; ?>;
    </script>
    <?php
    $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/';
    preg_match($regExp, $link, $match);
    ?>
    <?php if($match && strlen($match[2]) == 11){ ?>
         <video
        id="my_video_1"
        class="video-js vjs-default-skin vjs-big-play-centered"
        controls
        preload="auto"
        data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=<?php echo $match[2]; ?>"}] }'
        ></video>
    <?php } else { ?>
    <video id="my_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto"
  data-setup='{ "playbackRates": [0.5, 1, 1.5, 2]}' <?php echo !empty($poster) ? "poster=".$poster : ""; ?>>
            
            <source src="<?php echo $link; ?>" type='video/mp4'>
            <?php if(!empty($sub)) { ?>
            <track src="<?php echo $sub; ?>" kind="subtitles" srclang="en" label="Subtitle" default>
            <?php } ?>
    </video>
    <?php } ?>
</body>
</html>

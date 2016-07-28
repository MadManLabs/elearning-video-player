<!doctype html>
<html>
    <head>
        <title>Preview Video</title>
        <style>
            html,body{
                width:100%;
                height:100%;
                margin:0;
            }
            body{
                background-color:#2D2D2D;
                display:flex;
                justify-content:center;
                align-items:center;
            }
        </style>
    </head>
    <body>
        <iframe src="video.php?id=<?php echo $_GET['id']?>" allowfullscreen width="720px" height="405px" style="border:none;"></iframe>
    </body>
</html>
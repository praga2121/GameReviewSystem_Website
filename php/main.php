<?php

//Site Header
echo '<!DOCUMENT html>';
echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Game Review</title>';
echo '<link rel = "icon" href="../images/title_icon.png" type="image/x-icon"/>';
echo '<link rel="stylesheet" href="../css/style-main.css"/>';
echo '<link rel="stylesheet" href="../css/newsletter.css"/>';
echo '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> ';
echo '</head>';
//Header End

//Site Body
echo '<body>';

/* Site Navigation bar*/
echo '<!--Navigation bar-->';
echo '<ul>';
echo '<li><a href="main.php">Game Review</a></li>';
echo '<li><a href="gamerank.php">Ranking</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="admin panel/login.php">Admin Log-In</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="login.php">User Login</a></li>';
echo '</ul>';
/* Navigation bar end*/

/*Site Header Page*/
echo '<!--Featured image-->';
echo '<div class="featured-container">';
echo '<div class="overlay">';
echo '<h1 class="top-intro-header">Welcome Gamers <br><br> Ratings | Blogs | News <br> </h1>';
echo '</div>';
echo '</div>';
echo ''; 
/*Header Page end*/

/*Site main page Containers*/
echo '<main>';
// Adding E3 trailer embed yt//
echo '<br> <h2> Watch the Latest E3 2021 Trailer Here </h2><br>';
echo '<iframe width="800" height="420"';
echo 'src="https://www.youtube.com/embed/7X4nd5y4W4M">';
echo '</iframe>';
echo '<br>';

echo '<br> <h2> Latest Tweets Newsfeed</h2><br>';

//Adding Twitter News Feed//
echo '<blockquote class="twitter-tweet tw-align-center" data-height="100" data-lang="en" data-theme="dark"><p lang="en" dir="ltr">
    <a href="https://twitter.com/hashtag/PrimeDay2022?src=hash&amp;ref_src=twsrc%5Etfw">#PrimeDay2022</a> 
    may be technically over, but you can still save on select games for Nintendo Switch, PS5, and Xbox Series X|S! 
    <a href="https://t.co/W0z6E8Hezd">https://t.co/W0z6E8Hezd</a> <a href="https://t.co/manHn5AYce">
    pic.twitter.com/manHn5AYce</a></p>&mdash; GameSpot (@GameSpot) 
    <a href="https://twitter.com/GameSpot/status/1547619212440379394?ref_src=twsrc%5Etfw">July 14, 2022</a></blockquote> 
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><br>';
// Twitter News Feed end//

//Website footer//
echo '<footer>';
echo '<link rel="stylesheet" href="../css/style-main.css"/>';
echo '<h3 style="padding: 10px; color: #FFFFFF;"></h3>';
echo '<ul>';
echo '<div id="fb-root"></div>';
echo '<script async defer crossorigin="anonymous" 
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="fiNcyudO"></script>';
    echo '<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" 
    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
    class="fb-xfbml-parse-ignore" style="text-align: center;">Share</a></div>';
    echo '<li style="float: right;"><a href="webform.php">Contact Us</a></li>';
    echo '</ul>';
    echo '</footer>';
//footer ends//
?>

</body>
</html>

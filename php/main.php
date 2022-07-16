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
echo '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> ';
echo '</head>';
//Header End

//Site Body
echo '<body>';

/* Site Navigation bar*/
echo '<link rel="stylesheet" href="css/style-main.css"/>';
echo '<!--Navigation bar-->';
echo '<ul>';
echo '<li><a href="main.php">Game Review</a></li>';
echo '<li><a href="search.php">Ranking</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="admin panel/login.php">Admin Log-In</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="login.php">User Login</a></li>';
echo '</ul>';
/* Navigation bar end*/

/*Site Header Page*/
echo '<!--Featured image-->';
echo '<div class="featured-container">';
echo '<div class="overlay">';
echo '<h1 class="top-intro-header">Game Review Blog </h1>';
echo '</div>';
echo '</div>';
echo ''; 
/*Header Page end*/

/*Site main page Containers*/
echo '<main>';
// Adding E3 trailer embed yt//
echo '<br> <h2> Watch the Latest E3 2021 Trailer Here </h2><br>';
echo '<iframe width="800" height="420"';
echo 'src="https://www.youtube.com/embed/7X4nd5y4W4M?autoplay=1">';
echo '</iframe>';
echo '<br>';

echo '<br> <h2> Twitter News Feed For Year 2022 </h2><br>';
//Adding Twitter News Feed//
echo '<blockquote class="twitter-tweet tw-align-center" data-height="100" data-lang="en" data-theme="dark"><p lang="en" dir="ltr">
    <a href="https://twitter.com/hashtag/PrimeDay2022?src=hash&amp;ref_src=twsrc%5Etfw">#PrimeDay2022</a> 
    may be technically over, but you can still save on select games for Nintendo Switch, PS5, and Xbox Series X|S! 
    <a href="https://t.co/W0z6E8Hezd">https://t.co/W0z6E8Hezd</a> <a href="https://t.co/manHn5AYce">
    pic.twitter.com/manHn5AYce</a></p>&mdash; GameSpot (@GameSpot) 
    <a href="https://twitter.com/GameSpot/status/1547619212440379394?ref_src=twsrc%5Etfw">July 14, 2022</a></blockquote> 
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><br>';
// Twitter News Feed end//


echo '</main>';

/* Website Footer*/
include 'support elements/footer.php';
/* End Of footer*/
?>

</body>
</html>

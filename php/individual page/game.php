<?php

require '../config.php';

$game_name = $_GET['game_name'];

$sql = 'SELECT game_id, name, game_description, url FROM game_website.games WHERE name="'.$game_name.'"';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$game_id = $row['game_id'];

?>

<!DOCUMENT html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo'<title>'.$row["name"].'</title>';?>
<link rel="stylesheet" href="../../css/style-main.css"/>
<link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/reviews.css" rel="stylesheet" type="text/css">

<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>

<?php
/* Site Navigation bar*/
echo '<link rel="stylesheet" href="css/style-main.css"/>';
echo '<!--Navigation bar-->';
echo '<ul>';
echo '<li><a href="../main.php">Game Review</a></li>';
echo '<li><a href="../gamerank.php">Ranking</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="../admin panel/login.php">Admin Log-In</a></li>';
echo '<li style="float: right;"><a class="nav-menu" href="../login.php">User Login</a></li>';
echo '</ul>';
/* Navigation bar end*/

echo '<div class="featured-container-games" style="background-image: url(\'../../images/' . $row["name"] . '.jpg\')">';
echo ' <div class="overlay">';
echo '<h1 style="padding-top: 250px; padding-bottom: 250px; color: #FFFFFF; left:20px">' . $row["name"] . '</h1>';
echo '  </div>';
echo '</div>';
echo '<main>';
echo '<h2 class="subject-header">Official Game Site</h2>';
echo '<a class="link" href="'.$row['url'].'">' . $row["url"] . '</a>';
echo '<h2 class="subject-header">Game Description</h2>';
echo '<p class="game-description">' . $row["game_description"] . '</p>';

echo '<div class="subject-container">';
echo '<h2 class="subject-header-2">Game Genre & Pricing</h2>';

$sql_subject = 
"SELECT `subjects`.`name`, `price` , `duration`
FROM `gamedetails` 
LEFT JOIN `subjects` ON `gamedetails`.`subject_id` = `subjects`.`subject_id` 
WHERE `gamedetails`.`game_id` = '.$game_id.' AND `subjects`.`subject_id` = `gamedetails`.`subject_id` 
";

$result_subject = mysqli_query($conn, $sql_subject);
$row_number = mysqli_num_rows($result_subject);


echo '<div class="subject-table-container">';

if ($row_number > 0) {
    while ($row_subject = mysqli_fetch_assoc($result_subject)) {
        echo '<table class="subject-table">';
        echo '<tr>';
        echo '<th style="width: 70%;background-color: rgb(79, 17, 86); color:white">' . $row_subject["name"] . '</th>';
        echo '</tr>';

		echo '<tr>';
        echo '<td style="font-weight:bold">'."Approximate Price ".'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '    <td>'."RM ". $row_subject["price"].'</td>';
        echo '</tr>';

		echo '<tr>';
        echo '<td style="font-weight:bold">'."Released Since".'</td>';
        echo '</tr>';

		echo '<tr>';
        echo '<td>'.$row_subject["duration"]." Year(s)".'</td>';
        echo '</tr>';
        echo '</table>';
    }
}
?>
</div>
</div>
<div class="w3-container w3-padding-64 w3-theme-l5 w3-center" id="contact">
<div class="w3-padding-16"></div>
</main>

<div class="content home">
		<h2 style="font-family: 'Montserrat'">Reviews</h2>
		<p style="font-family: 'Montserrat'; color:white">Check out the below reviews for this game.</p>
		<div class="reviews"></div>


		<script>
		const game_id = <?= $game_id?>;
        console.log(game_id);

		fetch("../review/reviews.php?game_id=" + game_id).then(response => response.text()).then(data => {
			document.querySelector(".reviews").innerHTML = data;
			document.querySelector(".reviews .write_review_btn").onclick = event => {
				event.preventDefault();
				document.querySelector(".reviews .write_review").style.display = 'block';
				document.querySelector(".reviews .write_review input[name='name']").focus();
			};
			document.querySelector(".reviews .write_review form").onsubmit = event => {
				event.preventDefault();
				fetch("../review/reviews.php?game_id=" + game_id, {
					method: 'POST',
					body: new FormData(document.querySelector(".reviews .write_review form"))
				}).then(response => response.text()).then(data => {
					document.querySelector(".reviews .write_review").innerHTML = data;
				});
			};
		});
		</script>
	</div>

<?php include '../support elements/footer.php'; ?>

</div>
</div>

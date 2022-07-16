<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Reviews</title>
	<link href="../../css/style.css" rel="stylesheet" type="text/css">
	<link href="../../css/reviews.css" rel="stylesheet" type="text/css"> 
</head>

<body>
	<link rel="stylesheet" href="css/style-main.css"/>
	<!--Navigation bar-->'
	<ul>
	<li><a href="../main.php">Game Review</a></li>
	<li style="float: right;"><a class="nav-menu" href="/php/admin panel/login.php">Admin Log-In</a></li>
	</ul>

	<nav class="navtop">
		<div>
			<h1>How did you feel about this game?</h1> </div>
	</nav>
	<div class="content home">

		<h2>Reviews</h2>
		<p>Check the Game Reviews and Ratings Here!</p>
		<div class="reviews"></div>


		<script>
		const reviews_page_id = 1;
		
		// Retrieve game-id codes from review.php
		fetch("reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {

			// Search reviews element
			document.querySelector(".reviews").innerHTML = data;
			document.querySelector(".reviews .write_review_btn").onclick = event => {

				// To avoid Write Button Default.
				event.preventDefault();

				// change display of "Write Review" 
				document.querySelector(".reviews .write_review").style.display = 'block';

				// when "write review" pressed the focus shift to "Your name" field. So we can start typing immediately 
				document.querySelector(".reviews .write_review input[name='name']").focus();
			};
			// When "submit review" is pressed this event is activated
			document.querySelector(".reviews .write_review form").onsubmit = event => {
				// we prevent the form from submitting cause, we want to do it ourselves
				event.preventDefault();
				// send values of the form to the review.php with `game_id`
				fetch("reviews.php?page_id=" + reviews_page_id, {
					method: 'POST',
					body: new FormData(document.querySelector(".reviews .write_review form"))
				}).then(response => response.text()).then(data => {
					// return the review form to the closed state by changing
					document.querySelector(".reviews .write_review").innerHTML = data;
				});
			};
		});
		</script>
	</div>
</body>

</html>

<?php

require_once 'config.php';
/** @var TYPE_NAME $conn */

$sql = 
"SELECT *  
FROM game_website.games 
ORDER BY overall_rating DESC";

//Getting Results from the 'games' table
$result = mysqli_query($conn, $sql);

//Specify the rows in game table
$resultsCheck = mysqli_num_rows($result);

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
//Header End//

//Site Body
echo '<body>';

/* Site Navigation bar*/
echo '<link rel="stylesheet" href="css/style-main.css"/>';
echo '<!--Navigation bar-->';
echo '<ul>';
echo '<li><a href="main.php">Game Review</a></li>';
echo '<li><a href="gamerank.php">Ranking</a></li>';
echo '<li><a href="admin panel/login.php">Admin Log-In</a></li>';
echo '<li><a href="login.php">User Login</a></li>';
echo '</ul>';
/* Navigation bar end*/

/*Site Header Page*/
echo '<!--Featured image-->';
echo '<div class="featured-container-search">';
echo '<div class="overlay">';
echo '<h1 class="top-intro-header">Game Review Blog </h1>';
echo '</div>';
echo '</div>';
echo ''; 
/*Header Page end*/


/*Site main page Containers*/
echo '<main>';
echo '<div class="search">';  
echo '<input type="search" class="search-box" id="searchInput" onkeyup="tableSearch()" placeholder="Enter Game Name" title="Enter a keyword or number">';
echo '<span class="search-button">';
echo '<span class="search-icon"></span>';
echo '</span>';
echo '</div>';


/* Search and Sorting Feature*/
echo '<table id="table-search" class="table-sort">';

/* Table Headers*/
echo '<thead>';
echo '<tr>';
echo '<th>Game Name</th>';
echo '<th>Overall Rating</th>';
echo '</tr>';
echo '</thead>';
/*Table headers end*/

echo '<tbody>';

//Checking / searching for a specific item. 
if ($resultsCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td><a class =\"table-row-link\" href=\"individual%20page/game.php?game_name=" . $row['name'] ."\"> " . $row['name'] . "</a></td>";
    echo "<td>" . $row['overall_rating'] . "</td>";
  }
}
echo '</tbody>';
echo '</table>';

echo '</main>';

/* Website Footer*/
include 'support elements/footer.php';
/* End Of footer*/
?>

<script src="../js/tableSorter.js"></script>
<script src="../js/tableSearch.js"> </script>
<script src="../js/checkBoxSelect.js"> </script>
<script src="../js/searchBarToggle.js"></script>

</body>
</html>

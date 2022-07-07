<?php

require_once 'config.php';
/** @var TYPE_NAME $conn */

$sql = 
"SELECT *  
FROM game_website.games 
ORDER BY overall_rating DESC";

//associative array of 'games' table
$result = mysqli_query($conn, $sql);

//number of row in "games" table
$resultsCheck = mysqli_num_rows($result);

//START OF THE PAGE
//HEAD
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
//HEAD-END

//BODY START
echo '<body>';

/* NAV BAR*/
include 'support elements/nav_wide.php';
/* NAV BAR-END*/

/*HEADER PAGE*/
echo '<!--Featured image-->';
echo '<div class="featured-container">';
echo '<div class="overlay">';
echo '<h1 class="top-intro-header">Discover Game Reviews</h1>';
echo '</div>';
echo '</div>';
echo ''; 

/*HEADER PAGE - END*/

/*MAIN PAGE CONTAINER*/
echo '<main>';

echo '<div class="search">';  
echo '<input type="search" class="search-box" id="searchInput" onkeyup="tableSearch()" placeholder="Enter Game Name" title="Enter a keyword or number">';
echo '<span class="search-button">';
echo '<span class="search-icon"></span>';
echo '</span>';
echo '</div>';


/* TABLE with search and sort function*/
echo '<table id="table-search" class="table-sort">';
/* TABLE HEADINGs*/
echo '<thead>';
echo '<tr>';
echo '<th>Game Name</th>';
echo '<th>Overall Rating</th>';
echo '</tr>';
echo '</thead>';
/* TABLE HEADING - ENDs*/
echo '<tbody>';

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

/* FOOTER */
include 'support elements/footer.php';
/* FOOTER - END*/
?>

<script src="../js/tableSorter.js"></script>
<script src="../js/tableSearch.js"> </script>
<script src="../js/checkBoxSelect.js"> </script>
<script src="../js/searchBarToggle.js"></script>

</body>
</html>

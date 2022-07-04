<?php
require '../config.php';
include '../support elements/admin-nav.php';

/** @var TYPE_NAME $conn */
$sql = "SELECT * FROM game_website.games";
$result = mysqli_query($conn, $sql);
$resultsCheck = mysqli_num_rows($result);
if (isset($_POST['added'])) {
    $gamename = $_POST["gamename"];
    $overall = $_POST["overall"];
    $game_description = $_POST["game_description"];
  if (!empty($gamename) && !empty($overall) && !empty($game_description)) {
    $query = "INSERT INTO games (name, overall, price, game_description) VALUES ('$gamename', '$overall', '$price', '$game_description')";
    if (@mysqli_query($conn, $query)) {
      print "Records added successfully";
    } else {
      print mysqli_error($conn);
    }
  }
} else {
  echo '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">';
  echo '<link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>';
  echo '<link rel="stylesheet" href="../../css/style-admin.css">';
  echo '<title>Game Listings | Admin Panel</title>';
  echo '</head>';
  echo '<body>';
  echo '<div class="main-container">';
  echo '<h1 align="center">Admin Dashboard</h1>';
  echo '<a class = "add-button" href="add-game.php" >Add Game</a>';
  echo '<table class="listing" width="500">';
  echo '<tr>';
  echo '<th>Name</th>';
  echo '<th colspan="2">Action</th>';
  echo '</tr>';
  if ($resultsCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <td><?= $row['name'] ?></td>
      <td>
        <div>
          <a class='edit-button' href='edit-game.php?id=<?= $row['game_id']?>'>Edit</a>
          <a 
            class='delete-button' 
            href='delete-game.php?id=<?= $row['game_id']?>'
            onClick="return confirm('Are you sure you want to delete this item');">
            Delete
          </a>
        </div>
      </td>
    </tr>
    <?php
    }
  }
  ?>
  </table>
  </div>
  </body>
  </html>
  <?php
}
?>

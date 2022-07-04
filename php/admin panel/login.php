<?php
require '../config.php';
include '../support elements/nav_wide.php';

if (isset($_POST['submitted'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT email, password from game_website.admin WHERE email = " . "'" . $email . "'" . " AND password = " . "'" . $password . "'";
  $result = mysqli_query($conn, $query);
  if (@mysqli_num_rows(mysqli_query($conn, $query)) > 0) {
    header("Location: listing.php");
  } else {
    header("Location: login.php?error=true");
  }
} else {
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  echo '<!DOCUMENT html>';
  echo '<html>';
  echo '<head>';
  echo '<title>Login | Admin Panel</title>';
  echo '<link rel="stylesheet" href="../../css/style-admin.css"/>';
  echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
  echo '<link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>';
  echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" >';
  echo '</head>';
  echo '<body>';
  echo '<div class="login-container">';
  echo '<div class="form">';
  echo '<h2>Please Login</h2>';
  echo '<form action="login.php" method="POST">';
  if (strpos($actual_link, "error=true") == true) {
    echo '<span class = "error" style="color: red;">Wrong email or password</span>';
  }
  echo '<br/>';
  echo '<br/>';
  echo '<label for="email" class="login-label"><b>Email</b></label>';
  echo '<p><input type="text" name="email" value="" placeholder="Enter Email"></p>';
  echo '<label for="password" class="login-label"><b>Password</b></label>';
  echo '<p><input type="password" name="password" value="" placeholder="Enter Password"></p>';
  echo '<p class="submit.button"><input type="submit" name="Submit" value="Log-In"></p>';
  echo '<input type=\'hidden\' name=\'submitted\' value=\'true\'/>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
}
?>

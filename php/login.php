<?php
if (isset($_POST['submitted'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  //connect to db api for data fetching, pass the assigned data into link for api function
  $api_url = 'http://localhost:8080/GameReview/api/user/search.php?email='. urlencode($email) ;

  //fetched the data, make it into php array from json array
  $login_details = file_get_contents($api_url);
  $login_array = json_decode($login_details, true);

  //store the data in variables
  $login_userID = $login_array['records'][0]['userID'];
  $login_email = $login_array['records'][0]['email'];
  $login_password = $login_array['records'][0]['password'];

  //if there's any one of them empty
  if(!isset($email) || !isset($password)){
    //calling the javascript for alert box printing and page redirecting
    echo '<script type="text/javascript">alert("Please insert required fields!");</script>';
  }
  //validating credentials and login or prompt error messages if no empty data
  else if($email==$login_email && $password==$login_password){
      //redirect to home page after login successful
      header("Location: main.php");
  }
  else{
      //display error message if email and password do not match data in the database
      echo '<script type="text/javascript">alert("Worng email or password!");</script>';
  } 

} else {
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; //uh idk if i should remove this cos idk what u do with it-

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

  echo '<!DOCUMENT html>';
  echo '<html>';
  echo '<head>';
  echo '<link rel="stylesheet" href="css/style-main.css"/>';
 

  echo '<title>Login | Admin Panel</title>';
  echo '<link rel="stylesheet" href="../../css/style-admin.css"/>';
  echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
  echo '<link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>';
  echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" >';
  echo '</head>';
  echo '<body>';
  echo '<div class="login-container">';
  echo '<div class="form">';
  echo '<br> <h2>User Login | Please Enter Your Email Address</h2><br>';
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

/* Website Footer*/
include 'support elements/footer.php';
/* End Of footer*/
?>
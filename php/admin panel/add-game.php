<?php
require '../config.php';
include '../support elements/admin-nav-listing.php';

try {
    $pdo = new PDO('mysql:host=' . $dbServername . ';dbname=' . $dbName . ';charset=utf8', $dbUsername);
  } catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
  }

if (isset($_POST['added'])) {
    $game_name = $_POST["name"];
    $url =  $_POST["url"];
    $game_description = $_POST["description"];
    $subjects = $_POST["subject"];
    $subjects = array_values(array_filter($subjects, 'array_filter'));

    if (!empty($game_name)) {
      $stmt_game = $pdo->prepare("INSERT INTO games 
                        (name, game_description,url) 
                        VALUES (
                              :game_name, :game_description, :game_url
                        )");
      $stmt_game->bindParam(':game_name', $game_name);
      $stmt_game->bindParam(':game_description', $game_description);
      $stmt_game->bindParam(':game_url', $url);
      $stmt_game->execute();
      $stmt_subject = $pdo->prepare("INSERT INTO gamedetails
                        (game_id, subject_id, price, duration)
                        VALUES (
                          (SELECT game_id 
                            FROM games 
                            WHERE name=? 
                            LIMIT 1
                          ), 
                          ?, 
                          ?,
                          ?
                        )");
 // subjects query loop can instead be done as one combined string insert where concatenate each insert subject query into one string and then ->query() it
 foreach ($subjects as $subject) {
  $stmt_subject->execute(array(
    $game_name,
    $subject["name"],
    $subject["price"],
    $subject["duration"]
    )
  ); 
}
if ($stmt_game && $stmt_subject) {

  echo '<!DOCUMENT html>';
  echo '<html>';
  echo '<link rel="stylesheet" href="css/style-main.css"/>';

  echo '<link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>';
  echo '<title>Add Game | Admin Panel</title>';
  echo '<link rel="stylesheet" href="../../css/style-admin.css">';
  echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
  echo '<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">';
  echo '</head>';
  echo '<body>';

  echo '<div id="main-container">';
  echo '<h1>Database Updated Successfully</h1>';
  echo '<a style="color:black" href = "listing.php">Back to game listings</a>';
  echo '</div>';
  echo '</body>';
  echo '</html>';
} else {
  print mysqli_error($conn);
}
}
} else {


  $query_select_all_subject = "SELECT * FROM game_website.subjects";
  
  $subjects = $pdo->query($query_select_all_subject)->fetchAll();

  ?>

<!DOCUMENT html>
  <html>
  
    <head>
      <link rel = "icon" href="../../images/title_icon.png" type="image/x-icon"/>
    	<title>Add Game | Admin Panel</title>
      <link rel="stylesheet" href="../../css/style-admin.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
    	<div class="main-container">
    		<h1 align="center">New Game</h1>
    		<div class="form-center">
    			<form action="add-game.php" method="POST">
    				<label for="name">Game Name: </label>
    				<input type="text" name="name" id="name" />
    				<br/>
    				<br/>
            <label for="url">Website Link: </label>
    				<input type="text" name="url" id="url" />
    				<br/>
    				<br/>
    				<textarea rows="4" cols="104" name="description" id="description" placeholder="Game Description"></textarea>
    				<br/>
    				<br/>
    				<br/>
            
            <div style="display: flex; flex-direction: column;">
            <?php 
            $increment = 0;
            foreach ($subjects as $subject) : ?>
              <div>
                <!-- input's name has '[]' in the end to signify that post will be a 2 dimensional array where items are grouped by subject_id and have -->
                <input type="checkbox" name="subject[<?= $increment?>][name]" value="<?= $subject["subject_id"]?>" />
                <label class="price-label"for="subjects" ><?= $subject["name"] ?></label>

                <input type="number" name="subject[<?= $increment?>][price]" min="1" disabled placeholder="Enter Price"/>
                <input type="number" name="subject[<?= $increment?>][duration]" min="1" step=".1" disabled placeholder="Enter Released Since"/>
              </div>
            <?php
            $increment = $increment + 1; 
            endforeach ?>
            </div>

            <input class="save-button" type="submit" name="submit" value="Add Game" />
    				<input type='hidden' name='added' value='true' /> 
          </form>
    		</div>
    	</div>
      <script src="../../js/disableCheckbox.js"></script>
    </body>

</html>

  <?php
}
?>
<?php
require '../config.php';
include '../support elements/admin-nav.php';

function isValueInKeyOfArray($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

function array_filter_recursive($input){
    foreach ($input as &$value){
        if (is_array($value)){
            $value = array_filter_recursive($value);
        }
    }
    return array_filter($input);
}

try {
  $pdo = new PDO('mysql:host=' . $dbServername . ';dbname=' . $dbName . ';charset=utf8', $dbUsername);
} catch (PDOException $exception) {
  // If there is an error with the connection, stop the script and display the error.
  exit('Failed to connect to database!');
}

if (isset($_POST['edited'])) {
  $gamename = $_POST["gamename"];
  $game_description = $_POST["game_description"];
  $id = $_POST["id"];
  $url =  $_POST["websitelink"];
  $subjects = $_POST["subject"];
  $subjects = array_values(array_filter($subjects, 'array_filter'));
  $subjects = array_filter_recursive($subjects);

  $stmt_edit_game = $pdo->prepare("UPDATE games 
            SET name = :gamename, 
                game_description = :game_description, 
                url = :url
            WHERE game_id=:id");
  $stmt_edit_game->bindParam(':gamename', $gamename);
  $stmt_edit_game->bindParam(':game_description', $game_description);
  $stmt_edit_game->bindParam(':url', $url);
  $stmt_edit_game->bindParam(':id', $id);
  $stmt_edit_game->execute();
  
  $stmt_delete = $pdo->prepare("DELETE  FROM gamedetails WHERE game_id = :id");
  $stmt_delete->bindParam(':id', $id);
  $stmt_delete->execute();

  $stmt_subject = $pdo->prepare("INSERT INTO gamedetails 
                    (game_id, subject_id, price, duration)
                    VALUES (
                      ?, 
                      ?, 
                      ?,
                      ?
                    )");
  // subjects query loop can instead be done as one combined string insert where concatenate each insert subject query into one string and then ->query() it
  foreach ($subjects as $subject) {
    $stmt_subject->execute(array(
      $id,
      $subject["name"],
      $subject["price"],
      $subject["duration"]
      )
    );
  }

  if ($stmt_edit_game && $stmt_subject) {

      echo '<!DOCUMENT html>';
      echo '<html>';
      echo '<head>';
      echo '<link rel = "icon" href="images/title_icon.png" type="image/x-icon"/>';
      echo '<title>Edit Game | Admin Panel</title>';
      echo '<link rel="stylesheet" href="css/style-admin.css">';
      echo '<link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">';
      echo '</head>';
      echo '<body>';

      echo '<div id="main-container">';
      echo '<h1>Database Updated Successfully</h1>';
      echo '<a style="color:black" href = "listing.php">Back to Game listings</a>';
      echo '</div>';
      echo '</body>';
      echo '</html>';
    } else {
      print mysqli_error($conn);
    }
  
  } else {
    $id = $_REQUEST['id'];
    $sql_game = "SELECT * FROM games WHERE game_id = '" . $id . "'";
    $result = mysqli_query($conn, $sql_game);
    $results = mysqli_fetch_assoc($result);
  
    $query_select_all_subject = "SELECT * FROM game_website.subjects";
    $subjects = $pdo->query($query_select_all_subject)->fetchAll();
  
    $game_subjects = $pdo->query("SELECT `subjects`.`name`, `gamedetails `.`price` , `duration`
      FROM `gamedetails ` 
      LEFT JOIN `subjects` 
        ON `gamedetails `.`subject_id` = `subjects`.`subject_id` 
      WHERE `gamedetails`.`game_id` = '.$id.' 
        AND `subjects`.`subject_id` = `gamedetails `.`subject_id`")->fetchAll(PDO::FETCH_ASSOC);
?>

  <!DOCUMENT html>
  <html>
  <head>
  <title>Edit Game | Admin Panel</title>
  <link rel = "icon" href="images/title_icon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="css/style-admin.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="main-container">
      <h1 align="center">Edit Game</h1>
      <div class="form-center">
        <form id="edit-form" action = "edit-game.php" method="POST">
          <input 
            type="hidden" 
            name="id" 
            value="<?=$results["game_id"]?>" 
          />
          
          <label 
            for="gamename">
            Game Name: 
          </label>
          
          <input 
            type="text" 
            name="gamename" 
            id="gamename" 
            value="<?= $results["name"]?>"
          />
          <br/>
          <br/>
          <label 
            for="websitelink">
            Website Link: 
          </label>
    			<input 
            type="text" 
            name="websitelink" 
            id="websitelink" 
            value="<?=$results["url"]?>"
          />
    			<br/>
    			<br/>
          <textarea 
            rows="4"
            cols="104" 
            name="game_description" 
            id="game_description" 
            form="edit-form" 
            placeholder=""><?=$results["game_description"] ?>
          </textarea>
          <br/>
          <br/>
          <div style="display: flex; flex-direction: column;">
            <?php 
            $increment = 0;
            $i = 0;
            $j = 0;
            foreach ($subjects as $subject) : ?>
              <div>
                
                <input 
                  type="checkbox" 
                  name="subject[<?= $increment?>][name]" 
                  value="<?= $subject["subject_id"]?>" 
                  <?php echo (isValueInKeyOfArray($game_subjects, "name", $subject["name"]) ? 'checked' : '');?>
                />
                <label
                  class="price-label"for="subjects"><?= $subject["name"] ?>
                </label>

                <input 
                  type="number" 
                  name="subject[<?= $increment?>][price]" 
                  min="1"
                  placeholder="Enter Price"
                  <?php echo (isValueInKeyOfArray($game_subjects, "name", $subject["name"]) ? "value={$game_subjects[$i++]['price']}" : " disabled");?>
                />

                <input 
                  type="number" 
                  name="subject[<?= $increment?>][duration]" 
                  min="1" 
                  step="0.1"
                  placeholder="Enter Duration"
                  <?php echo (isValueInKeyOfArray($game_subjects, "name", $subject["name"]) ? "value={$game_subjects[$j++]['duration']}" : " disabled");?>
                />
              </div>
              
            <?php
            $increment = $increment + 1; 
            endforeach ?>
          </div>
          <br/>

          <input 
            class="save-button" 
            type="submit" 
            name="submit" 
            value="Save Changes"
          />

          <input 
            type='hidden' 
            name='edited' 
            value='true'/>
        </form>
      </div>
    </div>
      <script src="js/disableCheckbox.js"></script>
  </body>
  </html>
 <?php 
}
?>
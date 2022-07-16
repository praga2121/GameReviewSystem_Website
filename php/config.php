<?php
$dbServername = "localhost:3306"; //Follow MySQL Port number from your machine. 
$dbUsername = "root";
$dbPassword = "";
$dbName = "game_website";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "<script>console.log('Connection established');</script>";
}
?>
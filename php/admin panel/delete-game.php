<?php
require '../config.php';

try{
    $pdo = new PDO('mysql:host=' . $dbServername . ';dbname=' . $dbName . ';charset=utf8', $dbUsername);
} catch(PDOException $exception){
    exit('Failed to connect to database');
}

$game_id = $_GET['id'];

$delete_query = 'DELETE FROM game_website.games WHERE game_id=?';

$stmt = $pdo->prepare($delete_query);
$delete_success = $stmt->execute([$game_id]);

if($delete_success){
    header("location:listing.php");
}else{
    echo "Error deleting record";
}
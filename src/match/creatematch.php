<?php

require_once "../../config.php";
session_start();

$pid = $_SESSION["pid"];
$display = $_SESSION["display"];

$sql_find_match = "SELECT * FROM matches WHERE pet_id_key = '$pid' AND pet_id_matched = '$display'";
$result = mysqli_query($conn, $sql_find_match);
$numrows = mysqli_num_rows($result);
if($numrows < 1){
  $sql_add = "INSERT INTO matches (pet_id_key, pet_id_matched) VALUES ('$pid', '$display')";
  $res = mysqli_query($conn, $sql_add);
}

header("Location: match.php");

 ?>

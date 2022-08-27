<?php

session_start();

//check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  session_destroy();
  header("Location: index.html");
}

 ?>

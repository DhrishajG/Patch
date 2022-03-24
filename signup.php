<?php

require_once "config.php";

$user=$_GET['username'];
$password=$_GET['password'];
$repwd=$_GET['repassword'];

$sql = "SELECT * FROM owner_info WHERE owner_email = '$user'";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);

if($numrows !== 0){
  echo("You already have an account");
}
else if($pwd !== ){
  echo("Passwords don't match");
}
else{
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql_insert = "INSERT INTO owner_info (owner_email, owner_password) VALUES ('$username', '$hashed_password')"
}

?>

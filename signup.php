<?php

require_once "config.php";

$user=$_POST['username'];
$password=$_POST['password'];
$repwd=$_POST['repassword'];

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
  $sql_insert = "INSERT INTO owner_info (owner_email, owner_password) VALUES ('$username', '$hashed_password')";
  $sql=mysqli_query($conn,$sql_insert);
  header ("Location: login.php");
}

?>

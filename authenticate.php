<?php
//Initialising the session
session_start();

//check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
  header("location: welcome.html");
  exit();
}

// Include config file
require_once "config.php";

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

$username = $password = "";
$err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    //Validate credentials
    if(empty($err)){
      $sql = "SELECT * FROM owner_info WHERE owner_email = '$username' AND owner_password = '$password'";
      $result = mysqli_query($conn,$sql);
      $numrows = mysqli_num_rows($result);
      if($numrows == 1){
        $row = mysqli_fetch_assoc($result);
    		//if(password_verify($password,$row['owner_password'])){
          session_start();
          // Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $row['owner_id'];
          $_SESSION["username"] = $username;
          // Redirect user to welcome page
          header("location: welcome.html");
    		//}
    		//else{
    		//	$err = "Invalid username or password.";
    		//}
    	}
    	else{
    		$err = "Invalid username or password.";
    	}
    }
    if(empty($err) == false){
      alert($err);
    }
}
?>

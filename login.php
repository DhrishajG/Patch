<?php
//Initialising the session
session_start();

//check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("Location: welcome.html");
}

// Include config file
require_once "config.php";

function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
  header("Location: login.php");
}

echo($_POST["username"]);
echo($_POST["password"]);

$username = $password = "";
$err = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(empty($_POST["username"]) || empty($_POST["password"])){
        $err = "Username or Password Not Entered.";
    } else{
        $username = trim($_POST["username"]);
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
          header("Location: welcome.html");
    		//}
    		//else{
    		//	$err = "Invalid username or password.";
    		//}
    	}
    	else{
    		$err = "Invalid username or password.";
    	}
    }
    if(empty($err) === false){
      alert($err);
    }
}
?>



<!DOCTYPE html>
<head>
    <title>Patch - Login</title>
    <link rel="icon" type="image/x-ico" href="images/favicon.ico"/>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/login-styles.css">

</head>
<body class="gradient" onload="load(showMain, 500)">

    <br><br>

    <div id="loader" class="centre">
        <center>
            <img src="images/logo_w.png" alt="Patch" style="width:200px;height:200px;">
            <div class="loader"></div>
        </center>
    </div>

    <div id="main" class="centre" style="background-color:white;">
        <center>
            <img src="images/logo.png" alt="Patch" style="width:200px;height:200px;">
            <br><br>

            <form action=" " method="post">
                <input type="text" id="username" name="username" placeholder="Username"><br><br>
                <input type="password" id="password" name="password" placeholder="Password">
                <p><u><a onclick="showRecover()">Forgotten password?</a></u></p><br><br><br>
                <p id="errMsg" style="color:white">Invalid username or password.</p>
                <input class="btn" type="submit" value="Login">
            </form>

            <p>Don't have an account yet? <b><u><a onclick="showCreate()">Create an account.</a></u></b></p>
        </center>
    </div>

    <div id="recovery" class="centre" style="background-color:white;">
        <a onclick="showMain()"><u>Back</u></a>
        <center>
            <img src="images/logo.png" alt="Patch" style="width:200px;height:200px;">
            <br><br><br>

            <p>Enter your email address to reset password.</p>
            <form action=" " method="post">
                <input type="text" id="email" name="email" placeholder="Email Address"><br><br><br><br><br><br>
                <input class="btn" type="submit" value="Reset Password">
            </form>

        </center>
    </div>

    <div id="create" class="centre" style="background-color:white;">
        <a onclick="showMain()"><u>Back</u></a>
        <center>
            <img src="images/logo.png" alt="Patch" style="width:200px;height:200px;">
            <br><br>

            <form action="" onsubmit="return false">
                <label>Username</label>
                <input type="text" id="username" name="username"><br><br>
                <label>Email Address</label>
                <input type="text" id="email" name="email"><br><br>
                <label>Password</label>
                <input type="password" id="password1" name="password1"><br><br>
                <label>Confirm Password</label>
                <input type="password" id="password2" name="password2"><br><br>
                <p id="errC" style="color:white">.</p>
                <input class="btn" type="submit" value="Create Account">
            </form>

        </center>
    </div>

    <script type="text/javascript">
        function load(toExecute, n) {
            document.getElementById("loader").style.display = "block";
            document.getElementById("main").style.display = "none";
            document.getElementById("recovery").style.display = "none";
            document.getElementById("create").style.display = "none";
            var delay = n + Math.floor(Math.random() * 1500);
            setTimeout(toExecute, delay);
        }

        function showMain() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("main").style.display = "block";
            document.getElementById("recovery").style.display = "none";
            document.getElementById("create").style.display = "none";
            document.getElementById("errMsg").style.color = "white";
        }

        function showRecover() {
            document.getElementById("main").style.display = "none";
            document.getElementById("recovery").style.display = "block";
        }

        function showCreate() {
            document.getElementById("main").style.display = "none";
            document.getElementById("create").style.display = "block";
        }

        function toMain() {
            window.location.href = "welcome.html";
        }
    </script>
</body>

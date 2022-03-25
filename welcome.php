<?php

require_once "config.php";

session_start();

//to get the information to show the matched pets
function getPetInfo($pid){
  $sql_pifo = "SELECT pet_name FROM pet_base_info WHERE pet_id = '$pid'";
  $r1 = mysqli_query($conn,$sql_pifo);
  $row1 = mysqli_fetch_assoc($r1);
  $sql_pimg = "SELECT image FROM pet_profile WHERE pet_id = '$pid'";
  $r2 = mysqli_query($conn, $sql_pimg);
  $row2 = mysqli_fetch_assoc($r2);
  $pname = $r1['pet_name'];
  $pimg = $r2["image"];
  $pet_info = array($pname, $pimg);
  return $pet_info;
//}

$uid = $_SESSION["id"];
$o_name = "";

$sql_name = "SELECT owner_name FROM owner_info WHERE owner_id = '$uid'";
$res1 = mysqli_query($conn,$sql_name);
$row1 = mysqli_fetch_assoc($res1);
$o_name = $row1['owner_name'];


$sql_pet_id = "SELECT pet_id FROM main WHERE owner_id = '$uid'";
$res2 = mysqli_query($conn, $sql_pet_id);
$row2 = mysqli_fetch_assoc($res2);
$pet_id = $row2['pet_id'];

$matches = NULL;

$romantic =  "<script>document.write(romantic)</script>";

if($romantic){
  $sql_matches = "SELECT pet_id_matched FROM matches WHERE pet_id_key = '$pet_id'";
  $result = mysqli_query($conn,$sql_matches);
  $matches = mysqli_fetch_assoc($result);
}
else{
  $sql_matches = "SELECT pet_id_matched FROM matches_friendly WHERE pet_id_key = '$pet_id'";
  $result = mysqli_query($conn,$sql_matches);
  $matches = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<head>
    <title>Patch - Welcome</title>
    <link rel="icon" type="image/x-ico" href="images/favicon.ico"/>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/welcome-styles.css">

</head>
<body style="background-color:#E5E5E5;" onload="showHomepage()">
    <div class="column left" >
        <header class ="gradientside">
            <div style="display:inline-block;vertical-align:middle;">
                <img id="toProfile" style= "float :left; cursor: pointer;" src="images/user.png" width="70" height="70">
            </div>
            <div class = "textblock">Hi Name!</div>
            <label class="switch">
                <input type="checkbox">
                <span class="slider" onclick="toggleMode()"></span>
            </label>
        </header>
        <center>
            <p>MESSAGES</p>
        </center>
    </div>

    <div id="homepage" class="column right">
        <center>
            <div class = "textblockbold animated">WELCOME!</div>
        </center>
        <div class = "textblocksemibold animated">MATCHES</div>
        <button id="toMatchBtn" class="gradientside btn" onclick="showMatch()">Find more matches</button>
        <section>

        </section>
    </div>

    <div id="match" class="column right">
        <center>
            <div class = "textblockbold animated">MATCH</div>
        </center>
        <button id="toHomeBtn" class="gradientside btn" onclick="showHomepage()">Homepage</button>
            <div style = "position: absolute;left: 11%;top: 45%; ">
                <img id="yesButton" class="animated" src="images/yes.png" width=100 height=100 style= "float :left; cursor: pointer;"/>
            </div>
            <div class ="center">
                <img id="noButton" class="animated" src="images/no.png" width=100 height=100 style= "float : right; cursor: pointer;"/>
            </div>
            <section>
            </section>
    </div>

    <script>
        var romantic = true;

        document.getElementById("toProfile").onclick = function() {
            location.href = "profile.php";
        };

        function showHomepage() {
            document.getElementById("match").style.display = "none";
            document.getElementById("homepage").style.display = "block";
            document.title = "Patch - Home";
        }

        function showMatch() {
            document.getElementById("homepage").style.display = "none";
            document.getElementById("match").style.display = "block";
            document.title = "Patch - Match";
        }

        function toggleMode() {
            romantic = !romantic;
            if (romantic) {
                document.getElementById("yesButton").src="images/yes.png";
            }
            else {
                document.getElementById("yesButton").src="images/yes_alt.png";
            }
        }
    </script>

</body>
<!-- /* need to ID some of the objects that need data from database */
/* need to set min and max height and width of window */ -->

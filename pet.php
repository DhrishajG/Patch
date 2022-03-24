<?php

require_once "config.php";
session_start();

$uid = $_SESSION["id"];

$sql_pet_id = "SELECT pet_id FROM main WHERE owner_id = '$uid'";
$pet_id = mysqli_query($conn, $sql_pet_id);
/*
$sql_pname = "SELECT pet_name FROM pet_base_info WHERE pet_id = '$pet_id'";
$pname = mysqli_query($conn,$sql_pname);

$sql_pdimension = "SELECT * FROM pet_dimensions WHERE pet_id = '$pet_id'";
$result = mysqli_query($conn,$sql_pname);
$dimensions = mysqli_fetch_assoc($result);

$sql_plooks = "SELECT * FROM pet_looks WHERE pet_id = '$pet_id'";
$result_looks = mysqli_query($conn, $sql_plooks);
$looks = mysqli_fetch_assoc($result_looks);

$sql_des = "SELECT * FROM pet_profile WHERE pet_id = '$pet_id'";
$result_des = mysqli_query($conn, $sql_des);
$des = mysqli_fetch_assoc($result_des);

$age = $dimensions['age'];
$weight = $dimensions['weight'];
$height = $dimensions['height'];
$breed = $looks['breed'];
$pedigreed = $looks['pedigreed'];
$text = $des['description'];
$img = $des['img'];
*/
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Patch - Pets</title>
        <link rel="icon" type="image/x-ico" href="images/favicon.ico"/>
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/pet-styles.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>

<body>
    <header style="position:relative; padding: 0.5rem; ">

        <nav  >
            <img src="images/logo_w.png" style="width:3.5rem;height:3.5rem; position:relative; left: 1rem;" alt="PATCH">
            <div class="navbar">
                <div class="dropdown" >
                    <span style="position:relative; right:1rem; color: white; ">MENU</span>

                    <div class="dropdown-content">
                        <a href="welcome.html">HOME</a>
                        <a href="profile.html">PROFILE</a>
                    </div>
                </div>
            </div>


        </nav>

    </header>
    <div class="container ">
        <div class="card " style=" display: flex;  position: relative;">
            <img class="card-img-top" src="images/profile.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title" style="text-align: left;"><strong>Charlie</strong></h5>
                <p class="card-text"><strong>Breed:</strong> .....
                    <br><strong></strong>Color:</p>
                    <a href="#" class="btn btn-primary">EDIT</a>
                </div>
            </div>

            <div class="plus radius">
            </div>
        </div>



    </body>
    </html>

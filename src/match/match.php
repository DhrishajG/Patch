<?php

require_once "../../config.php";
session_start();

$display = rand(1,5);
$c = false;
while($c === true){
  $display = rand(1,5);
  if(array_search($display, $_SESSION["matched"]) === false){
    $c = true;
  }
}

array_push($_SESSION["matched"], $display);

$_SESSION["display"] = $display;

$sql_get_pet = "SELECT * FROM pet_base_info WHERE pet_id = '$display'";
$result = mysqli_query($conn,$sql_get_pet);
$pet = mysqli_fetch_assoc($result);
$pet_name = $pet["pet_name"];
$pet_weight = $pet["weight"];
$pet_height = $pet["height"];
$pet_age = $pet["age"];
$pet_breed = $pet["breed"];
$pet_colour = $pet["colour"];
$pedigreed = $pet["pedigreed"];
$pet_pedigreed = "";
if($pedigreed===1){
  $pet_pedigreed = "Yes";
}
else{
  $pet_pedigreed = "No";
}

$sql_pet_des = "SELECT * FROM pet_profile WHERE pet_id = '$display'";
$res = mysqli_query($conn, $sql_pet_des);
$des = mysqli_fetch_assoc($res);
$pet_about = $des["description"];
$pet_img = $des["image"];

 ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="statstyles.css">
        <link rel="stylesheet" href="../sidebar/assets/css/styles.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!--========== MATCH STYLE ==========-->
        <link rel="stylesheet" href="../match-card/card-styles.css">
        <link rel='stylesheet' href='../../fonts/Montserrat-Bold.ttf'>
        <script src="https://kit.fontawesome.com/fa609a8dad.js" crossorigin="anonymous"></script>

    </head>
    <body style="margin-top: 0px !important; padding-right: 0px !important; padding-top: 0px !important;">

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">Patch</span>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>

                            <a href="../home/index.html" class="nav__link">
                                <i class='bx bx-home nav__icon' ></i>
                                <span class="nav__name">Home</span>
                            </a>

                            <a href="../chat/index.html" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Messages</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name">Profile</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="../profile/profile.php" class="nav__dropdown-item">My personal</a>
                                        <a href="../profile/profile.php" class="nav__dropdown-item">My pets</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="nav__items">
                            <h3 class="nav__subtitle">Match</h3>

                            <a href="#" class="nav__link">
                                <i class='bx bx-compass nav__icon active' ></i>
                                <span class="nav__name active">Explore patchs</span>
                            </a>


                            </div>

                        </div>
                    </div>
                </div>

                <a href="../home/logout.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <!--========== CONTENTS ==========-->

        <div class="row">

            <div class="column col-70" style="padding-left: 12%; padding-top: 3em;">
                <h1 style="color: rgba(82, 95, 127, 0.5); text-align: center;">Find your best matches, and PATCH!</h1>
                <div id="matching" style="padding-left: 14em; padding-top: 3em;">
                    <div class="card">
                        <div class="image">
                            <img src="<?php echo $pet_img; ?>" class="image" />
                        </div>
                        <div style="margin-left: 1.5em;">
                            <div class="title">
                                <h2 class="name"><?php echo $pet_name; ?></h2>
                                <h4 class="additional-info"><?php echo ($pet_breed.",".$pet_age."yo"); ?></h2>
                            </div>
                            <p class="description"><?php echo $pet_about; ?></p>
                            <p class="description" style="color: #626262; font-weight: 400;"></p>
                        </div>
                    </div>
                    <div class="match-buttons">
                        <button class="match" onclick="window.location.href='match.php'"><i class="fa-solid fa-xmark fa-3x"></i></button>
                        <button class="pass" onclick="window.location.href='creatematch.php'"><i class="fa-solid fa-heart fa-3x fa-beat" style="--fa-animation-duration: 1.3s;"></i></button>
                    </div>
                </div>

            </div>

            <!-- Make the PASS animation for this part too -->
            <div class="column col-30" style="border-left: solid 1px #e9e9e9; height: 100vh; background-color: #fcfcfc40; box-shadow: rgba(0, 0, 0, .05) 1em 0em 1em 1em;">
                <div class="profile-picture">
                    <img class="dog-picture" src="<?php echo $_SESSION["pet_img"]; ?>" />
                    <img class="owner-picture" src="<?php echo $_SESSION["owner_img"]; ?>" />
                    <div class="owner-description">
                        <h2 id="name"><?php echo $_SESSION["pet_name"]; ?></h2>
                        <h4 id="age-and-distance"><i class="fa fa-location-dot" style="margin-right: 0.2em;"></i></h4>
                    </div>
                </div>
                <div class="3-statistics">
                    <div class="row">
                        <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                        </div>
                        </div>
                    </div>
                </div>
                <div class="dog-section" style="padding-top: 0.5em;">

                    <div class="row-3" style="padding-top: 3em;">

                        <div class="col-3">
                            <div class="section" style="padding-left: 1em">
                                <div class="section-description right" style="margin-right: 0.4em;">
                                    <h5 class="section-title">Breed</h5>
                                    <h6 class="section-var"><?php echo $_SESSION["pet_breed"]; ?></h6>
                                </div>
                                <div class="squared-icon"><i class="fa fa-paw"></i></div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="section">
                                <div class="squared-icon"><i class="fa fa-weight-hanging"></i></div>
                                <div class="section-description">
                                    <h5 class="section-title">Weight</h5>
                                    <h6 class="section-var">3kg</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row-3" style="padding-top: 3em;">

                        <div class="col-3">
                            <div class="section" style="padding-left: 1em">
                                <div class="section-description right" style="margin-right: 1em;">
                                    <h5 class="section-title">Color</h5>
                                    <h6 class="section-var"><?php echo $_SESSION["pet_colour"]; ?></h6>
                                </div>
                                <div class="squared-icon"><i class="fa fa-eye-dropper"></i></div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="section">
                                <div class="squared-icon"><i class="fa fa-file-signature"></i></div>
                                <div class="section-description">
                                    <h5 class="section-title">Pedigree</h5>
                                    <h6 class="section-var"><?php echo $_SESSION["pet_pedigreed"]; ?></h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row-3" style="padding-top: 3em;">

                        <div class="col-3">
                            <div class="section" style="padding-left: 1em">
                                <div class="section-description right" style="margin-right: 0.5em;">
                                    <h5 class="section-title">Height(cm)</h5>
                                    <h6 class="section-var"><?php echo $_SESSION["pet_height"]; ?></h6>
                                </div>
                                <div class="squared-icon"><i class="fa fa-ruler-vertical"></i></div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="section">
                                <div class="squared-icon"><i class="fa fa-location-dot"></i></div>
                                <div class="section-description">
                                    <h5 class="section-title">Location</h5>
                                    <h6 class="section-var">Manchester</h6>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>

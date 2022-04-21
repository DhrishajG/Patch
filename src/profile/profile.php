<?php

require_once "../../config.php";

session_start();

$uid = $_SESSION["id"];
$name = "";
$img = "";

$sql_owner = "SELECT * FROM owner_info WHERE owner_id = '$uid'";
$res1 = mysqli_query($conn,$sql_owner);
$owner = mysqli_fetch_assoc($res1);
$owner_name = $owner["owner_name"];
$owner_lastname = $owner["owner_surname"];
$owner_email = $owner["owner_email"];
$owner_add = $owner["address"];
$owner_postcode = $owner["postcode"];
$owner_city = $owner["city"];
$owner_des = $owner["about"];

$sql_pet_id = "SELECT * FROM main WHERE owner_id = '$uid'";
$res2 = mysqli_query($conn, $sql_pet_id);
$r = mysqli_fetch_assoc($res2);
$pid = $r["pet_id"];

$sql_pet = "SELECT * FROM pet_base_info WHERE pet_id = '$pid'";
$res3 = mysqli_query($conn, $sql_pet);
$pet = mysqli_fetch_assoc($res3);
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

$sql_pet_des = "SELECT * FROM pet_profile WHERE pet_id = '$pid'";
$res4 = mysqli_query($conn, $sql_pet_des);
$des = mysqli_fetch_assoc($res4);
$pet_about = $des["description"];
$pet_img = $des["image"];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile - Patch</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://kit.fontawesome.com/fa609a8dad.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="main-content">
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 470px; background-image: url(dog-park.jpg); background-size: cover; background-position: center bottom;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <h1 style="position: absolute; top: 1em; color: white;">My profile</h1>
            <a class="go-back" href="">
                <span class="fa fa-arrow-left" style="margin-right: .7em;"></span>Go to homepage
            </a>
            <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white"><?php echo $owner_name; ?></h1>
                <p class="text-white mt-0 mb-5">This is your profile page. Here, you can see and edit everything that people can know about you and your pet</p>
            </div>
            </div>
        </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                    <a href="#">
                        <img src="<?php echo $pet_img; ?>" class="rounded-circle" />
                    </a>
                    </div>
                </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <a class="card-text text-white"></a>
                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                      <div class="col">
                      <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      </div>
                      </div>
                  </div>
                <div class="text-center">
                    <h3>
                    <?php echo $pet_name; ?><span class="font-weight-light">, <?php echo $pet_age; ?> yo</span>
                    </h3>
                    <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo $owner_city; ?>, UK
                    </div>
                    <hr class="my-4">
                    <div class="dog-row">
                        <div class="form-group dog-col">
                            <label class="form-control-label" for="">Name</label>
                            <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Pet's nickname", value="<?php echo $pet_name; ?>">
                        </div>
                        <div class="form-group dog-col">
                            <label class="form-control-label" for="">Age (years)</label>
                            <input type="number" id="input-age" class="form-control form-control-alternative" placeholder="Pet's age", value="<?php echo $pet_age; ?>">
                        </div>
                    </div>
                    <div class="dog-row">
                        <div class="form-group dog-col">
                            <label class="form-control-label" for="">Size (cm)</label>
                            <input type="number" id="input-size" class="form-control form-control-alternative" placeholder="Pet's size", value="<?php echo $pet_height; ?>">
                        </div>
                        <div class="form-group dog-col">
                            <label class="form-control-label" for="">Weight (kg)</label>
                            <input type="number" id="input-weight" class="form-control form-control-alternative" placeholder="Pet's weight",, value="<?php echo $pet_weight; ?>">
                        </div>
                    </div>
                    <div class="form-group" style="padding: 0 0.4em 0 0.4em;">
                      <label class="form-control-label" for="">Breed</label>
                      <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Pet's breed", value="<?php echo $pet_breed; ?>">

                        </select>
                    </div>
                    <div class="dog-row">
                        <div class="form-group dog-col">
                          <label class="form-control-label" for="">Colour</label>
                          <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Pet's colour", value="<?php echo $pet_colour; ?>">

                            </select>
                        </div>
                        <div class="form-group dog-col">
                          <label class="form-control-label" for="">Pedigree</label>
                          <input type="text" id="input-name" class="form-control form-control-alternative" placeholder="Pedigreed?", value="<?php echo $pet_pedigreed; ?>">

                            </select>
                        </div>
                    </div>
                    <div class="form-group focused">
                        <label>About Him</label>
                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about them ..."><?php echo $pet_about; ?></textarea>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                    </div>
                    <div class="col-4 text-right">
                    </div>
                </div>
                </div>
                <div class="card-body">
                <form>
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="name@example.com", value="<?php echo $owner_email; ?>">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-first-name">First name</label>
                            <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name", value="<?php echo $owner_name; ?>">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Last name</label>
                            <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name", value="<?php echo $owner_lastname; ?>">
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-address">Address</label>
                            <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" type="text", value="<?php echo $owner_add; ?>">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-city">City</label>
                            <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City", value="<?php echo $owner_city; ?>">
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-country">Country</label>
                            <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United Kingdom">
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-country">Postal code</label>
                            <input type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code", value="<?php echo $owner_postcode; ?>">
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">About me</h6>
                    <div class="pl-lg-4">
                    <div class="form-group focused">
                        <label>About Me</label>
                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."><?php echo $owner_des; ?></textarea>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    <footer class="footer">
    </footer>

    </body>
</html>

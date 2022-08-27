<?php

require_once "../../config.php";
session_start();

echo "It redirected";

$_SESSION["owner_name"] = $owner_name;
$_SESSION["owner_lastname"] = $owner_lastname;
$_SESSION["owner_email"] = $owner_email;
$_SESSION["owner_add"] = $_POST["address"];
$_SESSION["owner_city"] = $_POST["city"];
$_SESSION["owner_postcode"] = $_POST["postcode"];
$_SESSION["owner_des"] = $_POST["owner_des"];

$_SESSION["pid"] = $pid;
$_SESSION["pet_name"] = $pet_name;
$_SESSION["weight"] = $_POST["weight"];
$_SESSION["height"] = $_POST["height"];
$_SESSION["age"] = $_POST["age"];
$_SESSION["breed"] = $pet_breed;
$_SESSION["colour"] = $pet_colour;
$_SESSION["pedigreed"] = $pet_pedigreed;
$_SESSION["image"] = $pet_img;
$_SESSION["pet_des"] = $_POST["pet_des"];

echo $_SESSION["owner_add"];

 ?>

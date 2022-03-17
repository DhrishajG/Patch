<?php

$database_host = "dbhost.cs.man.ac.uk";
$database_user = "d66835dg";
$database_pass = "KillBurn";
$database_name = "2021_comp10120_z6";

try
{
  $conn = new PDO("mysql:host=$database_host", $database_user, $database_pass);
}
catch(PDOException $pe)
{
  die("Could not connet to $database_host :" . $pe->getMessage());
}
}
?>

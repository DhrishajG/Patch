<?php

define('DB_SERVER', 'dbhost.cs.man.ac.uk');
define('DB_USERNAME', 'd66835dg');
define('DB_PASSWORD', 'KillBurn');
define('DB_NAME', '2021_comp10120_z6');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'csepwp_sql');

/* Attempt to connect to MySQL database */
$link_cs = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link_cs === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$gmailid = 'wkabango@gmail.com'; // YOUR gmail email
$gmailpassword = ''; // YOUR gmail password
$gmailusername = 'wkabango'; // YOUR gmail User name

?>

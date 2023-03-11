<?php

define('DB_SERVER', 'mysql5037.site4now.net');
define('DB_USERNAME', 'a793dc_cimis');
define('DB_PASSWORD', 'mysql-123');
define('DB_NAME', 'db_a793dc_cimis');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$gmailid = 'wkabango@gmail.com'; // YOUR gmail email
$gmailpassword = ''; // YOUR gmail password
$gmailusername = 'wkabango'; // YOUR gmail User name

?>

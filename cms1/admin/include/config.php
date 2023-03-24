<?php
define('DB_SERVER','mysql5047.site4now.net:3306');
define('DB_USER','a793dc_cms');
define('DB_PASS' ,'mysql-123');
define('DB_NAME', 'db_a793dc_cms');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "Musical+1937";
$db_name = "guest-tracking";

$db_connect = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if(!$db_connect)
{
    die("Failed to connect server!" . mysqli_connect_error());
}
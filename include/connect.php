<?php

include 'user.php';

$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

if ($mysqli->connect_error){
    die("Connection error:" . $mysqli->connect_error);
    }

?>

<?php session_start()?>
<?php
include 'connect.php';
$post_no = $_POST["name"];
$sqlE ="SELECT post from app where post_no='$post_no'";
$display=$mysqli->query($sqlE);
$showE =$display->fetch_assoc();
$displayE = $showE['post'];



echo $displayE;









?>
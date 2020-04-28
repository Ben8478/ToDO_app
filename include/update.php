<?php session_start()?>
<?php
include 'connect.php';
$no =$_SESSION['post_no'];
$new = $_POST['content'];
$date = $_POST['date'];
echo $new. $date;

?>
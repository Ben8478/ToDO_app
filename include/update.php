<?php session_start()?>
<?php
include 'connect.php';
$no =$_SESSION['post_no'];
$new = $_POST['content'];
$date = $_POST['date'];

$sqlU =$mysqli->prepare("UPDATE app SET post =? WHERE post_no = ? ");
$sqlU->bind_param('si',$new,$no);
$sqlU->execute();




echo "<hr class=\"list_hr\"><p>".$new."</p>";

?>
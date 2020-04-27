<?php 
session_start();
?>


<?php 
include "connect.php";
$listno =$_POST['list_no'];
$user = $_SESSION['id'];
$sqlD = "DELETE FROM app WHERE li_no = '$listono' and UserId = '$user'";
$delete =$mysqli->query($sqlD);

?>
<?php 
session_start()

?>


<?php 
include 'connect.php';


$user = $_SESSION['id'];
 $listno=$_POST['list'];
$sqlD = "DELETE FROM app WHERE post_no = '$listno' and UserId = '$user'";
$delete =$mysqli->query($sqlD);


?>
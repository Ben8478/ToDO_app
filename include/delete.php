<?php 
session_start()

?>


<?php 
include 'connect.php';

$user = $_SESSION['user'];
$user = $_SESSION['id'];
$list =$_POST['name'];

 $sqlC = "UPDATE app SET delete_item = '1' WHERE post_no ='$list'";
 $mysqli->query($sqlC);
 
//  $sqlS = "SELECT delete_item FROM app WHERE UserId = '$user'";
//  $select =$mysqli->query($sqlS);
//  if($select ->num_rows > 0){
//      $count = 0;
//      $lists=array();
//  while($row = $select->fetch_assoc()){
//  $lists[$count] = $row['delete_item'];
//  $count++;
// }
//  echo json_encode($lists);
//  }
 ?>



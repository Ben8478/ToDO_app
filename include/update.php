<?php session_start()?>
<?php
include 'connect.php';
$no =$_SESSION['post_no'];
$new = $_POST['content'];
$date = $_POST['date'];

$sqlU ="UPDATE app SET post ='$new' WHERE post_no = '$no' ";

$executeU =$mysqli->query($sqlU);




echo $new."<br>". $date."<br><button id = \"$no\" onclick=\"edit(this)\" class = \"edit_button\"><img src=\"images/edit.png\"></button><button id =\"$no\"name =\"submit\" class=\"dlt_button\" onclick=\"deleteA(this)\"><img src=\"images/delete.png\"></button>";

?>
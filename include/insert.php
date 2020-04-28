
<?php session_start()?>
<?php
include 'connect.php';

$content = $_POST['content'];
$id = $_SESSION['id'];
$date = $_POST['date'];
$highestvalue = "SELECT MAX(list_no) from app where UserId='$id'";
$maxid = $mysqli->query($highestvalue); 
$show =$maxid->fetch_assoc();
$mId = $show['MAX(list_no)'] +1;

$sqlcheck = " SELECT post FROM app where UserId ='$id' and post = '$content'";
$sqlAdd = "INSERT INTO app (`UserId`, `post`, `date`, `post_no`, `list_no`,`delete_item`) VALUES ('$id', '$content', '$date', NULL,'$mId',null); ";
$result = $mysqli->query($sqlcheck);

 if ($result->num_rows > 0) {
    echo '<script language ="javascript">';
    echo 'alert("This note already exists")';
    echo '</script>';
} else {
     $mysqli->query($sqlAdd);
     $append = "SELECT post from app where UserId='$id' and list_no = '$mId'";
     $appendto = $mysqli->query($append);
     $show_append = $appendto->fetch_assoc();
     $final_append = $show_append['post'];
     $sqlM ="SELECT MAX(post_no) from app where UserId='$id'";
     $display=$mysqli->query($sqlM);
     $showM =$display->fetch_assoc();
     $displayM = $showM['MAX(post_no)'];
     echo "<li id = \"$displayM\">".$final_append."<br>Due on ".$date."<button id =\"$displayM\"name =\"submit\" class=\"dlt_button\" onclick=\"deleteA(this)\"><img src=\"images/delete.png\"></button></li>";
    }
   
 
     
 


?>

<?php session_start()?>

<?php 
$id = $_SESSION['id'];
include 'connect.php';
$user= $_SESSION['id'];
$sqlO = "SELECT post FROM app WHERE UserId = '$user' ORDER BY app.post ASC ";
$sort = $mysqli->query($sqlO);
$sqlM ="SELECT post_no from app where UserId='$id'";
$display=$mysqli->query($sqlM);
$showM =$display->fetch_assoc();
$displayM = $showM['post_no'];
if($sort->num_rows > 0){
    while($row = $sort->fetch_assoc()){
        
        
        echo "<div class=\"list_items\"><li style=\"width:50%;\" id =\"$displayM\"><button id = \"$displayM\" onclick=\"edit(this)\" class = \"edit_button\"><img src=\"images/edit.png\"></button><button name =\"list\" id =\"$displayM\" type=\"submit\" class=\"dlt_button\" onclick=\"deleteA(this)\"><img src=\"images/delete.png\"></button>".$row['post']."</li></div>";
        $displayM++;
    }

}
?>
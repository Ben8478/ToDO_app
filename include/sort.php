<?php session_start() ?>

<?php
$id = $_SESSION['id'];
include 'connect.php';
$user = $_SESSION['id'];
$sqlO = "SELECT * FROM app WHERE UserId = '$user' ORDER BY app.post ASC ";
$sort = $mysqli->query($sqlO);
$sqlM = "SELECT post_no from app where UserId='$id'";
$display = $mysqli->query($sqlM);
$showM = $display->fetch_assoc();
$displayM = $showM['post_no'];
if ($sort->num_rows > 0) {
    while ($row = $sort->fetch_assoc()) {

        echo"<div class=\"due_date\">".$row['date']."</div><hr class=\"list_hr\">
        <div class=\"list_div\"><li class =\"list_items\" id=\"$displayM\">".$row['post']."</li><div class =\"button_content\"><div class = \"button_position\"><button id=\"$displayM\" onclick=\"edit(this)\" class=\"edit_button\"><img src=\"images/edit.png\"></button><button name=\"submit\" id=\"$displayM\" class=\"dlt_button\" onclick=\"deleteA(this)\"><img src=\"images/delete.png\"></button></div></div>
        </div>
        </div><hr class=\"list_hr\">";
 $displayM++;
    }
}
?>
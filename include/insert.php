
<?php session_start() ?>
<?php
include 'connect.php';

$content = $_POST['content'];
$id = $_SESSION['id'];
$date = $_POST['date'];
$highestvalue = "SELECT MAX(list_no) from app where UserId='$id'";
$maxid = $mysqli->query($highestvalue);
$show = $maxid->fetch_assoc();
$mId = $show['MAX(list_no)'] + 1;
$value = NUll;
$delete = 0;
$sqlcheck = " SELECT post FROM app where UserId ='$id' and post = '$content'";
$stmt = $mysqli->prepare("INSERT INTO app (`UserId`, `post`, `date`, `post_no`, `list_no`,`delete_item`) VALUES (?, ?, ?,?,?,?); ");
$stmt->bind_param('issiii',$id,$content, $date, $value,$mId,$delete); 
$result = $mysqli->query($sqlcheck);

if ($result->num_rows > 0) {
    echo '<script language ="javascript">';
    echo 'alert("This note already exists")';
    echo '</script>';
} else {
    $stmt->execute();
    $append = $mysqli->prepare("SELECT * FROM app WHERE UserId= ? AND list_no = ?");
    $append->bind_param('ii',$id, $mId);
    $append->execute();
    $row1 =$append->get_result();
    $appendto = $row1->fetch_assoc();
    $show_append = $appendto;
    $final_append = $show_append['post'];
    $date=$show_append['date'];
    $sqlM = $mysqli->prepare("SELECT MAX(post_no) from app where UserId=? ");
    $sqlM->bind_param('i',$id);
    $sqlM->execute();
    $row2 =$sqlM->get_result();
    $display = $row2->fetch_assoc();
    $displayM = $display['MAX(post_no)'];



  
echo"<div class=\"due_date\">$date</div><hr class=\"list_hr\">
     <div class=\"list_div\"><li class =\"list_items\" id=\"$displayM\">$final_append</li><div class =\"button_content\"><div class = \"button_position\"><button id=\"$displayM\" onclick=\"edit(this)\" class=\"edit_button\"><img src=\"images/edit.png\"></button><button name=\"submit\" id=\"$displayM\" class=\"dlt_button\" onclick=\"deleteA(this)\"><img src=\"images/delete.png\"></button></div></div>
     </div>
     </div><hr class=\"list_hr\">";
   
}






?>

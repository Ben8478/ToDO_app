<?php session_start()?>

<?php 
include 'connect.php';
$user= $_SESSION['id'];
$sqlO = "SELECT post FROM app WHERE UserId = '7' ORDER BY app.post ASC ";
$sort = $mysqli->query($sqlO);
if($sort->num_rows > 0){
    while($row = $sort->fetch_assoc()){
        
        echo "<div class=\"list_items\">" ;
        echo "<li><button name =\"list\"  type=\"submit\" class=\"dlt_button\" onclick=\"deleteA()\"><img src=\"images/delete.png\"></button></li>".$row['post']."</li></div>";
    }

}
?>
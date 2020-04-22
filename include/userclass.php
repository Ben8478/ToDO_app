<?php 
include "include/connect.php";
?>
<?php
class login{

    

function check(){
    $email = $_POST['email'];
    $sqlC = "SELECT pw  FROM  app where email = \"$email\"";
if ($mysqli->query($sqlC) === true){
    header('location:index.php');
}
else{
    header('location:register.php');
}
}
}



?>
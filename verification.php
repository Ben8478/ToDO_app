
<?php
if (isset($_POST['submitL'])){
    $email = $_POST['email'];
    $password = trim($_POST['password']);

    $sqlL = "SELECT password FROM users where email ='$email' ";
    $resultL = $mysqli->query($sqlL);
    if( $resultL->num_rows > 0){
       $row =$resultL->fetch_assoc();
       $hash = trim($row['password']);
       

    
       if(password_verify($password,$hash )){
      
       }
    $_SESSION['loggedin'] === true;
  header('location:index.php');

    }

}




?>
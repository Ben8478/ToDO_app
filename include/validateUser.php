
<?php
if(isset($_POST['submitR'])){
$firstname= $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password =$_POST['password'];

  $sqlR = "SELECT email FROM users WHERE email = '$email' ";
  $resultR = $mysqli->query($sqlR);
  if( $resultR->num_rows > 0){
     $row =$resultR->fetch_assoc();
echo "<script>";
echo "alert('This email already exists')";
echo "</script>" ;
  }
  else {
    $value = NULL;

      $password_E= password_hash($password, PASSWORD_DEFAULT);
      $stmt = $mysqli->prepare("INSERT INTO users (`id`, `firstname`, `lastname`, `email`, `password`)
      values(?,?,?,?,?)");
      $stmt->bind_param('issss',$value,$firstname,$surname,$email,$password_E);
      $stmt->execute();
  }
}
?>
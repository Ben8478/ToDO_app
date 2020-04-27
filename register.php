<!doctype html>
<html lang="en">
  <head>
  <?php 
include "include/connect.php";
include "include/validateUser.php";
?>
    
    <title>Endeavor Inventory</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class ="body_main" id="body_main_id">
  <div class = "header_main">
    <h1>Endeavor Inventory</h1>
    <h6>A place to organize all your endeavors</h6>
   

    </div>
<div class="sign_in" id = "sign_in_id">
<strong><p class="sign_in_text">Get organized! </p></strong>
<button class="sign_in_button" onclick="show_pop()">sign up</button>
</div>
<div class="sign_in_pop-up" id = "sign_in_pop-up_id">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-group">
    <label for="exampleInputPassword1">Firstname: </label>
    <input type="text" class="form-control" name ="firstname" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Surname:</label>
    <input type="text" class="form-control" name ="surname" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
<div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" name ="password" id="PW">
  </div>  

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm password:</label>
    <input  type="password" class="form-control" name ="passwordC" id="PWC">
    <p id = 'PWC_check'>DO match</p>
  </div>


  <button value ="submitR"name ="submitR" type="submit" class="sign_in_pop-up_button">Submit</button>


</form>

</div>
<?php if (isset($_POST['submitR'])){
header('location:login.php');
}
?>
    </body>

    <script>
      function show_pop(){
 var x = 1;
 if (x =1){   

document.getElementById('sign_in_pop-up_id').style.display ="block";
x = 2;
document.getElementById('sign_in_id').style.display='none';
}
else{
  document.getElementById('sign_in_pop-up_id').style.display ="none";
}

}
function PW_check(){
  


}
      </script>
</html>





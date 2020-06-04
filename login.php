<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <?php include "include/connect.php";
  include "include/verification.php";
  include "include/validateUser.php";?>
  <title>Endeavor Inventory</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="body_main_login" id="body_main_id">
  <div class="login_header">


   </div>
   <div id = "login_text">
     <h1>Welcome to Endeavor Inventory</h1>
     <h5>Organize your thoughts</h5>
</div>
   <div class="sign_in">
     <h3>Already have an account?</h3>
    <button id='sign_in_button' class="btn btn-primary btn-lg btn-block" onclick="show_pop_2()">Sign up</button>
    <h3>Need an account?</h3>
    <button id='sign_in_button' class="btn btn-primary btn-lg btn-block" onclick="show_pop()">Sign in</button>
</div>
<div id="modal_2">
  <div class="sign_in_pop-up" id="sign_in_pop-up_id">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <button value="submitL" name="submitL" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
  </div>
  </form>
  </div>
  <div id="modal_3">
  <div class="sign_in_pop-up_2" id="sign_in_pop-up_id">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="exampleInputPassword1">Firstname: </label>
        <input type="text" class="form-control" name="firstname" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Surname:</label>
        <input type="text" class="form-control" name="surname" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password:</label>
        <input type="password" class="form-control" name="password" id="PW">
      </div>

      <button value="submitR" name="submitR" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
      </div>
    </form>
</div>
<?php if (isset($_POST['submitR'])) {
    header('location:login.php');
  }
  ?>
</body>
<script>
  function show_pop() {
    var x = 1;
    if (x = 1) {

      document.getElementById('modal_2').style.display = "block";
      x = 2;
      document.getElementById('sign_in_id').style.display = 'none';
    } else {
      document.getElementById('sign_in_pop-up_id').style.display = "none";
    }

  }
</script>
<script>
  function show_pop_2() {

      document.getElementById('modal_3').style.display = "block";

  }
</script>
<script>
 // Once the mouse leaves the div the color changes back to the original color



  $(".sign_in_pop-up_button").mouseenter(function() {
    $(this).css('background-color', '#ff758e');
    
  });
  $(".sign_in_pop-up_button").mouseleave(function() { //answers is selected once again and the mouseleave event is selected.
    $(this).css("background-color", "transparent");
   
  }); // Once the mouse leaves the div the color changes back to the original color
</script>

</html>
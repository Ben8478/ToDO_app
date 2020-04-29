<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <?php include "include/connect.php";
  include "include/verification.php" ?>
  <title>Endeavor Inventory</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="body_main" id="body_main_id">
  <div class="header_main">
    <h1>Endeavor Inventory</h1>
    <h6>A place to organize all your endeavors</h6>
    <p> Not yet organized ? </p>
    <a href="register.php">Sign up</a>
  </div>
  <div class="sign_in" id="sign_in_id">
    <strong>
      <p class="sign_in_text">Already organized? </p>
    </strong>
    <button id='sign_in_button' class="sign_in_button" onclick="show_pop()">Sign in</button>
  </div>
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
      <button value="submitL" name="submitL" type="submit" class="sign_in_pop-up_button">Submit</button>
  </div>
  </form>
</body>
<script>
  function show_pop() {
    var x = 1;
    if (x = 1) {

      document.getElementById('sign_in_pop-up_id').style.display = "block";
      x = 2;
      document.getElementById('sign_in_id').style.display = 'none';
    } else {
      document.getElementById('sign_in_pop-up_id').style.display = "none";
    }

  }
</script>
<script>
  $("#sign_in_button").mouseenter(function() {
    $(this).css('background-color', '#75a8ff');
    $(this).css('opacity', '0.5')
  });
  $("#sign_in_button").mouseleave(function() { //answers is selected once again and the mouseleave event is selected.
    $(this).css("background-color", "transparent");
    $(this).css('opacity', '1')
  }); // Once the mouse leaves the div the color changes back to the original color



  $(".sign_in_pop-up_button").mouseenter(function() {
    $(this).css('background-color', '#75a8ff');
    $(this).css('opacity', '0.5')
  });
  $(".sign_in_pop-up_button").mouseleave(function() { //answers is selected once again and the mouseleave event is selected.
    $(this).css("background-color", "transparent");
    $(this).css('opacity', '1')
  }); // Once the mouse leaves the div the color changes back to the original color
</script>

</html>
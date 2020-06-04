<?php session_start(); ?>

<?php

if (!isset($_SESSION['log'])) {
    header('location:login.php');
}
$id = $_SESSION['id'];
?>
<!doctype html>
<html lang="en"><?php

                ?>

<head>
    <title>Endeavor Inventory</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
include "include/connect.php";

?>
<!-----------------------------------------Start of navbar section ----------------------------------------------->

<body class="body_main" id="body_main_id">


    <div class="side_bar">

        <img id="logo" class="logo" src="images/logo.png">

        <hr class="HL">
        
        <p id="start" class="side_bar_content"><a href="#" onclick="home()">Home</a></p>
        <!--contains an onclick linked to a javascript function to show all the notes-->
        <hr class="HL">
      
        <p id="start" class="side_bar_content"><a href="#"  onclick="show_All()">Tasks</a></p><!-- onclick that displays the content on the homepage -->
        <hr class="HL">

        <button type="button"onclick="sign_out()" id = "btn" class="btn btn-primary logout">Log out</button>
       
        <!--onclick this button wil sign you out with an ajax function -->
        <!-----------------------------------------End of navbar section----------------------------------------------->

</div>
    <!-----------------------------------------Start of welcoming text----------------------------------------------->
    <div id="add_box">  
    
        <div id="add_postA" class="add_post_content">
        
            <form id='post_add_A'>
            <div class="card">
                <span class="input-group-text">Description</span>
                <textarea id="edit_content_A" rows='5' name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                <input name="date" class="form-control" type="date" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="insert()" name="post_add" value="post_add">Add</button>
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="cancel()" name="post_add" value="post_add">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    
    <div class="welcome" id="welcome">
        <h1>Welcome to Endeavor inventory.</h1>
    </div>
    <div class="mission_text" id="mission_text">
        <p id="mission_paragraph">Dictionary.com describes an Endeavor as something someone does or something someone has an effect on.My hope is that this application
            will be able to help you to organize those do's and effects you have to be as productive in your everyday life as possible.<br> <br>~ Ben (Founder of the Endeavor Inventory)</p>
            <button onclick="show_All()" type="button" class="btn btn-primary btn-lg btn-block">Let's Get Started</button>
       
    </div>
    <!-----------------------------------------End of welcoming text ----------------------------------------------->
    <?php
    $highestvalue = "SELECT MAX(list_no) from app where UserId='$id'";
    $high = $mysqli->query($highestvalue);
    $show = $high->fetch_assoc();
    $maxid = $show['MAX(list_no)'];
    ?>
    <!----------------------------------------- Start of content that will be displayd----------------------------------------------->
    <div class="main_app_thought" id="All_notes">
        <div class="main_app_header">
            <p><strong>Tasks</strong></p>
        </div>
        <div class=post_title id ="post_title">
      
          <button name="submit" value="submit" type="submit" id="post_button" onclick="addendeavorA()"><img src="images/add.png"></button>
             <p id = "add_items">
            <button id="sort_button" onclick="sort()"><img src="images/sort.png"></button></p>
        </div>
        <div class="list_items post_content" id="post_content">
            <form id="all_edit">
                <?php $sqlA = "SELECT all*  FROM  app where UserId = '$id' ORDER BY app.date ASC ";?>
                <!--SQL query to select all content from specific user-->
                <?php $resultA = $mysqli->query($sqlA) ?>
                <?php if ($resultA->num_rows > 0) : ?>
                    <!--if statement is true it will execite the following -->
                    
                    <?php while ($rowA = $resultA->fetch_assoc()) : ?>
                        <!--While rows exist the query will continue to execute -->
                        <!-----------------------------------------This section echoes out each element of the database as li items and gives relevant id to button for functionality----------------------------------------------->
                        <div class="due_date" ><?php echo $rowA['date']; ?></div>
                        <hr class="list_hr">
                      <div class="list_div"><li class ="list_items" id="<?php echo $rowA['post_no'] ?>"><?php echo $rowA['post'] ?></li><div class ="button_content"><div class = "button_position"><button id="<?php echo $rowA['post_no'] ?>" onclick="edit(this)" class="edit_button"><img src="images/edit.png"></button><button name="submit" id="<?php echo $rowA['post_no'] ?>" class="dlt_button" onclick="deleteA(this)"><img src="images/delete.png"></button></div></div>
                      </div>
                 
                      <hr class="list_hr">
                    <?php endwhile ?>
                    <!--Ends the while loop-->
                <?php endif ?>
                <!-- Ends if statement-->
                
            </form>
        
  
        <!-----------------------------------------This section contains forms to received user input from either edit or add queries----------------------------------------------->
    </div>
                    </div>
    <div id="edit_box">
        <div id="edit_post" class="edit_post">
        <div class="card">
            <form id='edit_post_A'>
                <span class="input-group-text">Edit Task</span>
                <textarea id="edit_content" rows='5' name="content" class="form-control" aria-label="With textarea" placeholder="Edit endeavor"></textarea>
                <input name="date" class="form-control" type="date" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="update()"  name="post_add" value="post_add">Update</button>
                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="cancelEdit()" name="post_add" value="post_add">Cancel</button>           
            </form>
        </div>
        </div>
    </div>
    <!-----------------------------------------End of form section----------------------------------------------->
    <!-----------------------------------------Icon footer section----------------------------------------------->
  
        <footer>
        <div class="icons" id ='icons'>
        <div ><p><img src="images/secure.png"><strong>Secure note storage</strong></p> </div><div><p><img src="images/mobile.png"><strong>Mobile Friendly</strong></p> </div><div><p><img src="images/check.png"><strong>Complete your tasks</strong></p> </div>
            </div>
        </footer>
   
    <!-----------------------------------------End of footer section----------------------------------------------->
</body>
<script>
    function show_All() {
        //A function that hides the welcome text and displays the content
        document.getElementById('All_notes').style.display = "flex";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";
        document.getElementById('icons').style.display = "none";
    }

    function home() {
        document.getElementById('All_notes').style.display = "none";
        document.getElementById('welcome').style.display = "inline-block";
        document.getElementById('mission_text').style.display = "block";
        //A function that hides the content and displays the welcome text
    }

    function addendeavor() {
        document.getElementById('add_post').style.display = "block";





    }

    function addendeavort() {
        document.getElementById('add_postt').style.display = "block";





    }

    function addendeavorA() {
        
        document.getElementById('add_postA').style.display = "grid";
        document.getElementById('All_notes').style.display = "none";
        
    }
function cancel(){
    document.getElementById('add_postA').style.display = "none";
        document.getElementById('All_notes').style.display = "flex";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";
}
function cancelEdit(){
    document.getElementById('add_postA').style.display = "none";
        document.getElementById('All_notes').style.display = "flex";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";
        document.getElementById('edit_box').style.display = "none";
}
    function add_today() {
        document.getElementById("add_post_today").style.display = "block";
    }

    function sign_out() {
        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'include/logout.php',

            });
        });
    }
    //this function signs the user out of his session
</script>

<script>
    function insert() {
        $(document).ready(function() {
            var formdata = $("#post_add_A").serialize();
            $.ajax({
                type: 'post',
                url: 'include/insert.php',
                data: formdata,
                success: function(data) {

                    $('#post_content').prepend(data);

                }
            });
        });
        document.getElementById('add_postA').style.display = "none";
        document.getElementById('All_notes').style.display = "flex";

    }
    //this function sends the form data to insert.php with ajax
</script>


<script>
    //this function prevents the form to submit
    $("#post_add_A").submit(function(event) {
        event.preventDefault();
    })
</script>

<script>
    function deleteA(myid) {
        number = myid.id;
        //this function passes an id of the button and sends this id to delete.php and puts a line through the deleted task

        $(document).ready(function() {

            $.ajax({
                type: 'post',
                url: 'include/delete.php',
                data: ({
                    name: number
                }),
                success: function(data) {

                    $('.list_div').prepend(data);
                }
            });
        });
        document.getElementById(number).style.textDecoration = "line-through";

    }
</script>
<script>
    //this function prevents the form to submit
    $("#all_edit").submit(function(event) {
        event.preventDefault();
    })
</script>
<script>
    function sort() {

        $(document).ready(function() {
            $.ajax({
                type: 'post',
                url: 'include/sort.php',
                data: "text/plain",
                success: function(data) {
                    console.log('success');
                    $('#post_content').html(data);

                }
            });
        });
        //this function sends a request with ajax to sort.php and returns the sorted data 
    }

    function edit(myidE) {
        //this function passes the id of the button and sends this data to edit.php to enable the page to run the code on this specific id
        numberE = myidE.id;


        $(document).ready(function() {

            $.ajax({
                type: 'post',
                url: 'include/edit.php',
                data: ({
                    name: numberE
                }),
                success: function(data) {

                    $('#edit_content').html(data);
                }
            });
        });
        document.getElementById('edit_box').style.display = "grid";
        document.getElementById('All_notes').style.display = "none";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";
    }

    function update() {
        $(document).ready(function() {

            var form = $('#edit_post_A').serialize();
            $.ajax({
                type: 'post',
                url: 'include/update.php',
                data: form,
                success: function(data) {

                    document.getElementById(numberE).innerHTML = data;
                }
            });
        });

        document.getElementById('edit_box').style.display = "none";
        document.getElementById('All_notes').style.display = "flex";
        //this function sends form data captured by #edit_post_A and replaces the current value with the updated value    
    }
</script>
<script>
    //this function prevents the form to submit
    $("#edit_post").submit(function(event) {
        event.preventDefault();
    })
</script>

</html>
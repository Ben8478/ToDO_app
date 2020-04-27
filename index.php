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
include "include/userClass.php";

?>

<body class="body_main" id="body_main_id">


    <div class="side_bar">

        <img class="logo" src="images/logo.png">
        <div id="side_bar_timeline">
            <hr class="HL">
            </hr>
            <p id="start" class="side_bar_content"><a href="#" onclick="show_All()">All</a></p>


            <hr class="HL">
            </hr>



            <button class="buttons" value="submit" id="btn" onclick="sign_out()"> Log out </button>


        </div>

    </div>
    <div class="welcome" id="welcome">
        <h1>Welcome to Endeavor inventory.</h1>
    </div>

    <div class="mission_text" id="mission_text">
        <p>Dictionary.com describes an Endeavor as something someone does or something someone has an effect on.My hope is that this application
            will be able to help you to organize those do's and effects you have to be as productive in you'r everyday life as possible.<br> <br>~ Ben (Founder of the Endeavor Inventory)</p>
        <button onclick="show_All()" name="submit" value="submit" type="submit" class="buttons">Let's Get Started!</button>
    </div>




    <?php
    $highestvalue = "SELECT MAX(list_no) from app where UserId='$id'";
    $high = $mysqli->query($highestvalue);
    $show = $high->fetch_assoc();
    $maxid = $show['MAX(list_no)'];




    ?>



    <div class="main_app_thought" id="All_notes">
        <div class="main_app_header">
            <p><strong>All your todo's</strong></p>

        </div>
        <div class=post_title>
            <p><strong>All Endeavors</strong>

            </p>
            <div class="add_post" id="add_post_today">
                    <button name="submit" value="submit" type="submit" id="post_button" onclick="addendeavorA()"><img src="images/add.png"></button>
                </div>
         
        </div>

        <div class="list_items post_content" id="post_content">

            <div style="width:40%;display:inline-block;">

                <div id="add_postA" class="add_post_content">
                    <form id='post_add_A'>
                        <span class="input-group-text">Description</span>
                        <textarea rows='5' name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                        <input name="date" class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>">
                        <button type="submit" onclick="insert()" id="add_post_content_button" name="post_add" value="post_add">Add</button>
                    </form>

                </div>
            </div>




            <form id="all_edit">
                <?php for ($a = 0; $a < $maxid; $a++) : ?>
                    <?php $sqlA = "SELECT all*  FROM  app where UserId = '$id'";

                    $resultA = $mysqli->query($sqlA); ?>
                <?php endfor ?>
                <?php for ($b = 0; $b < $maxid; $b++) : ?>
                    <?php $rowA = $resultA->fetch_assoc() ?>




                    <li id="<?php echo $rowA['post_no'] ?>"><?php echo $rowA['post'] ?><input type="hidden" name="list" value="<?php echo $rowA['post_no'] ?>"><button type="submit" class="dlt_button" onclick="deleteA()"><img src="images/delete.png"></button></li>


                <?php endfor ?>

            </form>

        </div>


        

</body>
<script>
    function show_today() {

        document.getElementById('All_notes').style.display = "none";
        document.getElementById('main_app_today_id').style.display = "inline-block";
        document.getElementById('main_app_tomorrow_id').style.display = "none";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";

    }

    function show_tomorrow() {
        document.getElementById('All_notes').style.display = "none";
        document.getElementById('main_app_today_id').style.display = "none";
        document.getElementById('main_app_tomorrow_id').style.display = "inline-block";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";


    }

    function show_All() {

   
        document.getElementById('All_notes').style.display = "inline-block";
        document.getElementById('welcome').style.display = "none";
        document.getElementById('mission_text').style.display = "none";
    }

    function addendeavor() {
        document.getElementById('add_post').style.display = "block";





    }

    function addendeavort() {
        document.getElementById('add_postt').style.display = "block";





    }

    function addendeavorA() {
        document.getElementById('add_postA').style.display = "block";





    }

    function add_today() {
        document.getElementById("add_post_today").style.display = "block";
    }

    function sign_out() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'include/logout.php');
        xhr.onreadystatechange = function() {
            var done = 4;
            var ok = 200;
            if (xhr.readyState === done) {
                if (xhr.status === ok) {
                    console.log(this.responseText);
                } else {
                    console.log('Error:' + xhr.status);
                }
            }
        };
        xhr.send(null);
    }
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
    }
</script>


<script>
    $("#post_add_A").submit(function(event) {
        event.preventDefault();
    })
</script>

<script>
    function deleteA() {
        $(document).ready(function() {
            var formdelete = $("all_edit").serialize();
            $.ajax({
                type: 'post',
                url: 'include/delete.php',
                data: formdelete,
                success: function(data) {

                    $('#post_content').append(data);

                }
            });
        });

    }
</script>
<script>
    $("#all_edit").submit(function(event) {
        event.preventDefault();
    })
</script>

</html>
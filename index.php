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
            <p class="side_bar_content"><a href="#" onclick="show_today()"> Today</a></p>
            <hr class="HL">
            </hr>
            <p class="side_bar_content"><a href="#" onclick="show_tomorrow() ">Tomorrow</a></p>
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


        <!-----------------------------------------------------Today ----------------------------------------->
        <div class="main_app_today" id="main_app_today_id">
            <div class="main_app_header">
                <p><strong>Today</strong></p>
            </div>














            <?php
            $count = 0;

            $today = date('Y-m-d');

            $dates = array();
            $sqldate = "SELECT date  FROM  app  where UserId = '$id'";

            $result = $mysqli->query($sqldate);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    array_push($dates, $row['date']);
                }
            }


            foreach ($dates as $thedates) {
                if ($thedates == "$today") {
                    $count++;
                }
            }

            ?>
            <div class=post_title>
                <p><strong><?php echo $today; ?></strong></p>

            </div>

            <div class="post_content">

                <?php for ($x = 0; $x < $count; $x++) : ?>
                    <?php $sql = "SELECT all*  FROM  app where date = '$today' and UserId ='$id'";

                    $result = $mysqli->query($sql); ?>
                <?php endfor ?>
                <?php for ($j = 0; $j < $count; $j++) : ?>
                    <?php $row = $result->fetch_assoc() ?>



                    <span>
                        <li><?php echo $row['post'] ?></li><button class="dlt_button"><img src="images/delete.png"></button>
                    </span>

                <?php endfor ?>


                <div class="add_post">

                    <button name="submit" value="submit" type="submit" id="post_button" onclick="add_today()"><img src="images/add.png"></button>

                </div>



                <div>
                    <div id="add_post_today" class="add_post_content">
                        <form id="add_today">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input name="title" type="text" class="form-control" placeholder="Endeavor title" aria-label="Username" aria-describedby="basic-addon1">

                            <span class="input-group-text">Description</span>
                            <textarea rows='5' name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                            <input name="date" class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>">
                            <button onclick="" id="add_post_content_button" name="post_add" value="post_add" type="submit">Add</button>
                        </form>
                    </div>
                </div>

            </div>



            <!-----------------------------------------------------Tomorrow ----------------------------------------->

        </div>
        <div class="main_app_today" id="main_app_tomorrow_id">
            <div class="main_app_header">
                <p><strong> Tomorrow</strong></p>
            </div>







            <?php
            $tomorrow = date('Y-m-d', strtotime('+1day'));
            $countT = 0;
            foreach ($dates as $thedates) {
                if ($thedates == "$tomorrow") {
                    $countT++;
                }
            }


            ?>
            <div class=post_title>
                <p><?php echo $tomorrow ?></p>
            </div>
            <div class="post_content">
                <?php for ($x = 0; $x < $countT; $x++) : ?>
                    <?php $sql = "SELECT all*  FROM  app where date = '$tomorrow' and UserId ='$id'";

                    $result = $mysqli->query($sql); ?>
                <?php endfor ?>
                <?php for ($j = 0; $j < $countT; $j++) : ?>
                    <?php $row = $result->fetch_assoc() ?>




                    <span>
                        <li><?php echo $row['post'] ?></li>
                    </span>
                <?php endfor ?>


                <div id="add_post_tomorrow" class="add_post">

                    <button name="submit" value="submit" type="submit" id="post_button" onclick="addendeavorA()"><img src="images/add.png"></button>

                </div>
            </div>
            <div>
                <div id="add_post_tomorrow" class="add_post_content">
                    <form id="add_tomorrow">
                        <span class="input-group-text" id="basic-addon1">Title</span>
                        <input name="title" type="text" class="form-control" placeholder="Endeavor title" aria-label="Username" aria-describedby="basic-addon1">

                        <span class="input-group-text">Description</span>
                        <textarea rows='5' name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                        <input name="date" class="form-control" type="date" value="<?php echo date("Y-m-d", strtotime('+1day')) ?>" max="<?php echo date("Y-m-d", strtotime('+1day')); ?>">
                        <button id="add_post_content_button" name="post_add" value="post_add" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <!---********************************Next week***************************************************-->
        <div class="icons">

            <footer><img src="images/secure.png"><strong>Secure note storage</strong>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<img src="images/mobile.png"><strong>Mobile Friendly</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<img src="images/check.png"><strong>Complete your tasks</strong></footer>

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

        document.getElementById('main_app_today_id').style.display = "none";
        document.getElementById('main_app_tomorrow_id').style.display = "none";
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
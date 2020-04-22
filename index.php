<?php session_start();?>

<?php 

if (!isset($_SESSION['log'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en"><?php

 ?>
<head>
    <title>Endeavor Inventory</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jquery-3.4.1.min.js"></script>
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
            <p class="side_bar_content"><a href="#" onclick="show_today()"> Today</a></p>
            <hr class="HL">
            </hr>
            <p class="side_bar_content"><a href="#" onclick="show_tomorrow() ">Tomorrow</a></p>
            <hr class="HL">
            </hr>
            <p class="side_bar_content"><a href="#" onclick="show_nextweek()">Next week</a></p>
            <hr class="HL">
            </hr>
            
           
            <button value ="submit" id="btn" onclick="sign_out()"> Log out </button>
            
        
        </div>

    </div>
    <div class="main_app_thought" id="main_app_thought_id">
        <div class="main_app_thought_header">
            <p><strong>Positive thought of the day</strong></p>
        </div>
        <div class=post_title>
        </div>
        <p class="post_content"></p>

    </div>
    <!-----------------------------------------------------Today ----------------------------------------->
    <div class="main_app_today" id="main_app_today_id">
        <div class="main_app_header">
            <p><strong>Today</strong></p>
    </div>




        
<div class="add_post">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <button name="submit" value="submit" type="submit" id="post_button"><img src="images/add_post.png"></button>
            </form>
            </div>

            <?php
                if (isset($_POST['submit']) && $_POST['submit'] == 'submit') :
                ?>
                    <div>
                        <div class="add_post_content">
                            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                                <input name="title" type="text" class="form-control" placeholder="Endeavor title" aria-label="Username" aria-describedby="basic-addon1">
                                
                                    <span class="input-group-text">Description</span>
                                    <textarea rows = '5'name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                                    <input name="date" class="form-control" type="date" value ="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>">
                                    <button id="add_post_content_button" name="post_add" value="post_add" type="submit">Add</button>
                            </form>
                        </div>
                    </div>
        
                    <?php 
                 endif ?>
                         <?php
     $highestvalue = "SELECT MAX(post_no) from app";
     $high = $mysqli->query($highestvalue);
     $show = $high->fetch_assoc();
$maxid = $show['MAX(post_no)'];
  echo "<br>".$maxid;
    
    
   
    ?>
                    <?php if (isset($_POST['post_add']) && $_POST['post_add'] =='post_add') {
              
                $title =$_POST['title'];
                $content =$_POST['content'];
                $date = $_POST['date'];
                $sqlcheck = " SELECT post FROM app where UserId ='4' and post = '$content'";
                $sqlAdd ="INSERT INTO `app` (`UserId`, `post_title`, `post`, `date`, `post_no`) VALUES ('4', '$title', '$content', '$date', NULL); ";
                 $result =$mysqli->query($sqlcheck);
                
                  if($result->num_rows > 0){
                   echo '<script language ="javascript">';
                    echo 'alert("This note already exists")';
                    echo '</script>';
                 }
                 else{
                    $mysqli->query($sqlAdd)
;                    echo "nope";
                    $maxid++;
                 }
               

              
                
                    
                        
                    
                }?>

     
       

        <?php
        $count = 0;

        $today = date('Y-m-d');

        $dates = array();
        $sqldate = "SELECT date  FROM  app where UserId ='4' ";

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



        <?php for ($x = 0; $x < $count; $x++) : ?>
            <?php $sql = "SELECT all*  FROM  app where date = '$today'";

            $result = $mysqli->query($sql); ?>
        <?php endfor ?>
        <?php for ($j = 0; $j < $count; $j++) : ?>
            <?php $row = $result->fetch_assoc() ?>
            <div class=post_title>
                <p><a href="#"> <?php echo $row['post_title'] ?></a></p>

            </div>

            <div>
                <span>
                    <p class="post_content"><?php echo $row['post'] ?></p>
                </span>
            </div>
        <?php endfor ?>









<!-----------------------------------------------------Tomorrow ----------------------------------------->

    </div>
    <div class="main_app_today" id="main_app_tomorrow_id">
        <div class="main_app_header">
            <p><strong> Tomorrow</strong></p>
        </div>
       
        <div class="add_post">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <button name="submit" value="submit" type="submit" id="post_button"><img src="images/add_post.png"></button>
            </form>
            </div>
            </form>
                <?php
                if (isset($_POST['submit']) && $_POST['submit'] == 'submit') :
                ?>
                    <div>
                        <div class="add_post_content">
                            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                                <input name="title" type="text" class="form-control" placeholder="Endeavor title" aria-label="Username" aria-describedby="basic-addon1">
                                
                                    <span class="input-group-text">Description</span>
                                    <textarea rows = '5'name="content" class="form-control" aria-label="With textarea" placeholder="Endeavor description"></textarea>
                                    <input name="date" class="form-control" type="date" value ="<?php echo date("Y-m-d",strtotime('+1day')) ?>" max="<?php echo date("Y-m-d",strtotime('+1day')); ?>">
                                    <button id="add_post_content_button" name="post_add" value="post_add" type="submit">Add</button>
                            </form>
                </div>
                        </div>
                    
               
                   
                    <?php 
                 endif ?>
        <?php
        $tomorrow = date('Y-m-d', strtotime('+1day'));
        $countT = 0;
        foreach ($dates as $thedates) {
            if ($thedates == "$tomorrow") {
                $countT++;
            }
        }


        ?>
        <?php for ($x = 0; $x < $countT; $x++) : ?>
            <?php $sql = "SELECT all*  FROM  app where date = '$tomorrow'";

            $result = $mysqli->query($sql); ?>
        <?php endfor ?>
        <?php for ($j = 0; $j < $countT; $j++) : ?>
            <?php $row = $result->fetch_assoc() ?>
            <div class=post_title>
                <p><a href="#"> <?php echo $row['post_title'] ?></a></p>

            </div>

            <div>
                <span>
                    <p class="post_content"><?php echo $row['post'] ?></p>
                </span>
            </div>
        <?php endfor ?>


    </div>
    </div>
   </div>
        </div>
    <!---********************************Next week***************************************************-->
    <div class="main_app_today" id="main_app_nextweek_id">
        <div class="main_app_header">
            <p><strong> Next week</strong></p>
        </div>
        <button name="submit" value="submit" type="submit" id="post_button"><img src="images/add_post.png"></button>
        <?php
        $tom_3 = date('Y-m-d', strtotime('+2day'));
        $tom_4 = date('Y-m-d', strtotime('+3day'));
        $tom_5 = date('Y-m-d', strtotime('+4day'));
        $tom_6 = date('Y-m-d', strtotime('+5day'));
        $tom_7 = date('Y-m-d', strtotime('+6day'));
        $week = array($tom_3, $tom_4, $tom_5, $tom_6, $tom_7);
        var_dump($week);

        $countW = 0;
        foreach ($dates as $thedates) {
            foreach ($week as $days) {
                for ($j = 0; $j < 5; $j++)
                    if ($thedates == $days[$j]) {
                        $countW++;
                        $chosendate . [$j] = $days[$j];
                    }
            }
        }
        echo $chosendate1;
        ?>
        <?php for ($x = 1; $x <= $countW; $x++) : ?>
            <?php $sql = "SELECT all*  FROM  app where date = '2020-04-18'";

            $result = $mysqli->query($sql); ?>
        <?php endfor ?>
        <?php for ($j = 1; $j <= $countW; $j++) : ?>
            <?php $row = $result->fetch_assoc() ?>
            <div class=post_title>
                <p><a href="#"> <?php echo $row['post_title'] ?></a></p>

            </div>

            <div>
                <span>
                    <p class="post_content"><?php echo $row['post'] ?></p>
                </span>
            </div>
        <?php endfor ?>

    </div>
<?php 
echo $_SESSION['user'];
?>
</body>
<script>
    function show_today() {
        document.getElementById('main_app_thought_id').style.display = "none";
        document.getElementById('main_app_today_id').style.display = "inline-block";
        document.getElementById('main_app_tomorrow_id').style.display = "none";
        document.getElementById('main_app_nextweek_id').style.display = "none";

    }

    function show_tomorrow() {
        document.getElementById('main_app_thought_id').style.display = "none";
        document.getElementById('main_app_today_id').style.display = "none";
        document.getElementById('main_app_tomorrow_id').style.display = "inline-block";
        document.getElementById('main_app_nextweek_id').style.display = "none";



    }

    function show_nextweek() {
        document.getElementById('main_app_thought_id').style.display = "none";
        document.getElementById('main_app_today_id').style.display = "none";
        document.getElementById('main_app_tomorrow_id').style.display = "none";
        document.getElementById('main_app_nextweek_id').style.display = "inline-block";


    }


    function sign_out(){
    var xhr = new XMLHttpRequest();
xhr.open('GET','include/logout.php');
xhr.onreadystatechange = function(){
    var done = 4;
    var ok = 200;
    if(xhr.readyState === done){
        if (xhr.status === ok ){
            console.log(this.responseText);
        }
        else{
        console.log('Error:' + xhr.status);
        }
    }
};
xhr.send(null);
    }
</script>

<script>
    // $('side_bar_content').mouseenter(function() {
    //     $(this).css("background-color", "black");
    // }, function() {
    //     $(this).css("background-color", "white");

    // });
</script>

</html>
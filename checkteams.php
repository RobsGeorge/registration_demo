<?php
require_once 'config.php';
session_start();
if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}
else{
    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['logout']))
    {
        unset($_COOKIE['player-code']);
        setcookie('player-code', null, -1, '/');
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

function createRandom(){
    $pass = substr(md5(uniqid(mt_rand(), true)) , 0, 5);
    return $pass;
}

function sendMail($msg,$subject,$mailto,$email_from){

// the message
    //$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);
    $headers = 'From: '.$email_from."\r\n";

// send email
    mail($mailto, $subject, $msg,$headers);

}

?>

<?php

$sql = "SELECT Full_Name, Image, Marhala FROM player WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);
$playerMarhala = $playerFullName = $playerImage = "";
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $playerFullName = $row['Full_Name'];
    $playerImage = $row['Image'];
    $playerMarhala = $row['Marhala'];

}

$sql2 = "SELECT Team_ID FROM `Team-Members` WHERE Member_Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
$my_team_code=0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row2 = $res2->fetch();
    $my_team_code = $row2['Team_ID'];
}


$sqlu = "SELECT `Member_Code`  FROM `Team-Members` WHERE `Team_ID`=".$my_team_code;
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$team_members_array = array();
$i=0;
foreach($result as $row) {
    $team_members_array[$i] = $row['Member_Code'];
    $i = $i+1;
}

$sqlu = "SELECT `Team_ID`, `Team_Name`, `Members_Count`  FROM `Team` WHERE `ChosenFlag`=1";
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$teams_array = array();
$i=0;
foreach($result as $row) {
    $teams_array[$i] = $row['Team_ID'];
    $teams_names_array[$i]=$row['Team_Name'];
    $i = $i+1;
}





$sql3 = "SELECT Team_ID, Team_Name FROM `Team` WHERE Team_ID=".$my_team_code;
$res3 = $conn->query($sql3);
$my_team_name="";
$my_team_ID=0;
if($res3->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row3 = $res3->fetch();
    $my_team_name = $row3['Team_Name'];
    $my_team_ID = $row3['Team_ID'];
}


$sql4 = "SELECT `Level_ID` FROM `Player_Level` WHERE Player_Code=".$_COOKIE['player-code'];
$res4 = $conn->query($sql4);
$my_level_id=0;
if($res4->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row4 = $res4->fetch();
    $my_level_id = $row4['Level_ID'];
}
$my_level_name="";
if($my_level_id==1){
    $my_level_name= $my_level_name . "1";}
elseif ($my_level_id==2){
    $my_level_name= $my_level_name . "2";}
elseif ($my_level_id==3){
    $my_level_name=$my_level_name ."3";}
elseif($my_level_id==4){
    $my_level_name=$my_level_name ."Z";}
elseif($my_level_id==5){
    $$my_level_name=$my_level_name ."&";}
?>


<!doctype html>
<html lang="ar" dir="rtl">

<!--<head>
    <title>My Account - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">


    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/themify-icons.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>


<section class="col">
    <div class="bg-gradient fixed-top">
        <div>
            <a href="index.php">
                <img src="images/lo3.png">
            </a>
        </div>
    </div>
</section>
-->

<head>
    <title>فرق مهرجان الألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

<!-- Nav Menu -->

<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="index.php"><img src="images/emtahan2.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="tasgeelalhan.php">الألحان</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">القبطي</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">الطقس</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="mokmekpage.php">MOKMEK</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="rankingpage.php">الترتيب</a> </li>
                            <?php
                            $sql = "SELECT Full_Name FROM player WHERE Code=".$_COOKIE['player-code'];
                            $res = $conn->query($sql);
                            $res->rowCount(); ////CODE FOUND IN DATABASE/////
                            $row = $res->fetch();
                            $playerFullName = $row['Full_Name'];
                            $userFirstnameX = substr($playerFullName,0,stripos($playerFullName," "));
                            echo '<a href="userpage.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav">'. $userFirstnameX .'</a></li>';
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


<header class="bg-gradient">
    <div class="container mt-5">
        <h1  style="padding-bottom: 40px;" dir="ltr"><strong style="color: #FFFFFF;">Mahragan Teams</strong></h1>
    </div>
</header>

                                <?php
                                for($j=0;$j<count($teams_array);$j=$j+1){
                                    $sqlu = "SELECT `Member_Code`  FROM `Team-Members` WHERE `Team_ID`=".$teams_array[$j];
                                    $stmt = $conn->prepare($sqlu);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    $team_members_array = array();
                                    $i=0;
                                    foreach($result as $row) {
                                        $team_members_array[$i] = $row['Member_Code'];
                                        $i = $i+1;
                                    }
                                    $sql = "SELECT `Level_ID`  FROM `Player_Level` WHERE `Player_Code`=".$team_members_array[0];
                                    $res = $conn->query($sql);
                                    $row = $res->fetch();

                                    $x = $row['Level_ID'];

                                    if($x==1)
                                    {
                                        $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>1</h4>";
                                    }
                                    elseif ($x==2)
                                    {
                                        $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>2</h4>";
                                    }
                                    elseif ($x==3)
                                    {
                                        $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>3</h4>";
                                    }
                                    elseif ($x==4)
                                    {
                                        $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level</h5><h4 class='coptic-font-h2' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>Z</h4>";
                                    }
                                    elseif ($x==5)
                                    {
                                        $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level</h5><h4 class='coptic-font-h2' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>&</h4>";
                                    }
                                    echo '<section class="login general-pages d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="general-card">
                    <div class="card">
                        <div class="card-body flex-column">
                            <h2 style="text-align: center; color: #f5378e;"><strong>'.$teams_names_array[$j].'</strong></h2>
                            '."<br>".$out.'
                            <div class="row">';
                                for($i=0;$i<count($team_members_array);$i=$i+1)
                                {
                                    $sql = "SELECT Full_Name, Image FROM player WHERE Code=".$team_members_array[$i];
                                    $res = $conn->query($sql);
                                    if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
                                    {
                                        $row = $res->fetch();
                                        $a=$row['Full_Name'];
                                        $b=$row['Image'];
                                        if(empty($b)or$b=="")
                                        {
                                            $b = "images/avatar.jpg";
                                        }
                                    }
                                    $first_name = substr($a,0,stripos($a," "));
                                    $a = substr($a, stripos($a," ")+1);
                                    $second_name = substr($a,0,stripos($a," "));
                                    $printable_name = $first_name." ".$second_name;
                                    $v=0;
                                    if(count($team_members_array)==1)
                                    {
                                        $v=12;
                                        $u=12;
                                    }
                                    elseif (count($team_members_array)==2)
                                    {
                                        $v=6;
                                        $u=6;
                                    }
                                    elseif(count($team_members_array)==3)
                                    {
                                        $v=4;
                                        $u=4;
                                    }
                                    elseif(count($team_members_array)==4)
                                    {
                                        $v=3;
                                        $u=3;
                                    }
                                    elseif(count($team_members_array)==5)
                                    {
                                        $v=2;
                                        $u=6;
                                    }
                                    echo '
                                    
                                    
                                    
                                    
                                    <div class="flex-column center align-items-center col-xs-'.$v.' col-lg align-items-center" style="align-items:center;">
<div class="col-xs-'.$v.' col-lg align-items-center" style="align-items: center">
<div class="align-items-center" style="align-content: center;"><img id="myImg" alt="My Image" src='.$b.' class="" style="position:relative; overflow:hidden; height:500px; width:500px; border-radius: 50%; max-height: 150px; max-width: 150px;"></div>
</div>
<div class="col-xs-'.$v.' col-lg">
<h2 class="arbaic-text-small-nav" style="text-align: center; font-size: xx-large; color: #633991">'.$printable_name.'</h2>
</div>  
</div>
';
                                }
                                echo '                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';

                                }
                                ?>



<div class="section">
    <div class="container">
        <div class="d-flex center align-items-center" style="align-self: center">
            <h5 style="text-align: center;">
                ترتيب الفرق والترتيب الفردي سوف يكون متاح قريباً ...
            </h5>
        </div>
    </div>
</div>




<div class="bg-new-gradient  py-5">
    <div class="container">
        <h4 class="center" style="color: #f5378e">Robeir Samir George</h4>
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2" style="color: #bd2130"> <span class="ti-location-pin mr-2" style="color:#af09d5;"></span>Nasr City, Cairo, Egypt.</p>
                <div class=" d-block d-sm-inline-block">
                    <p class="mb-2">
                        <span class="ti-email mr-2" style="color: #af09d5"></span> <a class="mr-4" style="color:#bd2130;" href="mailto:robier_samir@hotmail.co.uk">robier_samir@hotmail.co.uk</a>
                    </p>
                </div>
                <div class="d-block d-sm-inline-block">
                    <p class="mb-0">
                        <span class="ti-headphone-alt mr-2" style="color: #af09d5"></span> <a style="color: #bd2130" href="tel:+201066468922">+20-1066468922</a>
                    </p>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="social-icons">
                    <a href="#"><span class="ti-facebook"></span></a>
                    <a href="#"><span class="ti-twitter-alt"></span></a>
                    <a href="#"><span class="ti-instagram"></span></a>
                </div>
            </div>
        </div>

    </div>

</div>

<footer class="my-5 text-center">
    <p class="mb-3"><small>DEVELOPED BY: ROBS</a></small></p>

    <small>
        <a href="index.php" class="m-2">HOME</a>
        <a href="#" class="m-2">ABOUT</a>
        <a href="#" class="m-2" onclick="contact()">CONTACT</a>
    </small>
</footer>



<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>

<script>
    function contact() {
        Swal.fire({
            title: 'Contact Us',
            text: 'لو عندك أي مشكلة في التعامل مع الموقع أو أي صعوبة في فهم أي حاجة في المهرجان ياريت تتواصل مع أي حد من خدام المهرجان ومنهم مستر روبير سمير هتلاقي رقم تليفونه والemail بتاعه في الشريط اللي فوق ده!',
            icon: 'question',
            confirmButtonText: 'OK'
        });
    }
</script>

</body>
</html>

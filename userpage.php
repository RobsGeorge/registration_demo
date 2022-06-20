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

$sql = "SELECT Code FROM hagztonia WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);

$hagztoniaflag = 0;

if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    //$playerFullName = $row['Code'];
    $hagztoniaflag = 1;

}

/*$sql2 = "SELECT Team_ID FROM `Team-Members` WHERE Member_Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
$my_team_code=0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row2 = $res2->fetch();
    $my_team_code = $row2['Team_ID'];
}*/

/*
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
*/
/*
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
*/
/*
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
    $$my_level_name=$my_level_name ."&";}*/
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
    <title>امتحانات الشمامسة 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                              <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="agbiapage.php">الأجبية</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">النتيجة</a> </li>
                             
                            <?php
                                $sql = "SELECT FirstName, SecondName, ThirdName, Type FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
                                $res = $conn->query($sql);
                                $res->rowCount(); ////CODE FOUND IN DATABASE/////
                                $row = $res->fetch();
                                $playerFirstName = $row['FirstName'];
                                $playerSecondName = $row['SecondName'];
                                $playerThirdName = $row['ThirdName'];
                                $playerFullName = $playerFirstName." ".$playerSecondName." ".$playerThirdName;
                                echo '<a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav">'. $playerFirstName .'</a></li>';
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
        <h4 style="font-size:25px; color: #4E1370;"  >حسابي الشخصي</h4>
        <br>
        <?php $playerImage="1"; if($playerImage==""){echo '<h1 class="arbaic-text-title2" dir="rtl"><strong style="color: #ffffff">' . $playerFullName . '</strong></h1>';
        }
        else
        {
            echo '<div class="row" style="display:flex;justify-content:center;align-items:center;" dir="rtl">
                <h1 class="arbaic-text-title2 col-sm-12" dir="rtl"><strong style="color: #ffffff">' . $playerFullName . '</strong></h1>
        
            </div>';
        }
        ?>

    </div>
    <br>
</header>


<div class="section" style=" display: flex; align-items: center;">
    <div class="container">
        <h2 class="arbaic-text-small-heading" dir="rtl">الكود: <?php echo $_COOKIE['player-code'];?></h2>
        <!--<h2 class="arbaic-text-small-heading" dir="rtl" style="color: #495057">المرحلة: <?//php echo $playerMarhala;  ?></h2>-->
        <br>
        <br>
        <h3 class="arbaic-text-small-nav" style="text-align: center; color:#f5378e; font-size: 35px">*انتهت امتحانات الترم الأول*</h3>
        <h4 class="arbaic-text-small-nav" style="text-align: center; font-size: 25px">تبدأ يوم الجمعة 18 مارس وتنتهي يوم الجمعة 1 أبريل 2020 الساعة 12 ليلاً</h4>
    </div>
</div>



<div class="container">
    <div class="row">
    <!--<div class="col-md-3">
            <h2  class="arbaic-text-heading" style="text-align: center; color: #f5378e" dir="ltr">نتيجة الترم الأول</h2>
            <a href="natiga.php" class="btn btn-primary3" style="text-decoration:underline;color: #8D26B6; text-align: center;" dir="ltr">الذهاب لنتيجة الترم الأول</a>
        </div>-->
        <?php
        if($hagztoniaflag)
        echo '
        <div class="col-md-3">
            <h2  class="arbaic-text-heading" style="text-align: center; color: #f5378e" dir="ltr">رسامة شمامسة 2022</h2>
            <a href="estelamtonia.php" class="btn btn-primary3" style="text-decoration:underline;color: #8D26B6; text-align: center;" dir="ltr">حجز معاد لاستلام التونية</a>
        </div> ';
        ?>
        <!--
        <div class="col-md-3">
            <h2  class="arbaic-text-heading" style="text-align: center; color: #f5378e" dir="ltr">امتحان الطقس</h2>
            <a href="takspage.php" class="btn btn-primary3" style="text-decoration:underline;color: #8D26B6; text-align: center;" dir="ltr">الذهاب للطقس</a>
        </div>
        <div class="col-md-3">
            <h2  class="arbaic-text-heading"  style="text-align: center;color: #f5378e" dir="ltr">امتحان القبطي</h2>
            <a href="copticpage.php" class="btn btn-primary3" style="text-decoration:underline;color: #8D26B6; text-align: center;" dir="ltr">الذهاب للقبطي</a>
        </div>
        <div class="col-md-3">
        <h2  class="arbaic-text-heading"  style="text-align: center;color: #f5378e" dir="ltr">امتحان الأجبية</h2>
        <a href="agbiapage.php" class="btn btn-primary3" style="text-decoration:underline;color: #8D26B6; text-align: center;" dir="ltr">الذهاب للقبطي</a>
        </div>
        -->
    </div>
</div>

<!--
<div class="section">
    <div class="container d-flex center align-items-center">
        <div class="d-flex center align-items-center" style="align-self: center">
                <a href="rankingpage.php" class="btn btn-outline-dark my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav" style="align-self:center;border-color: #f5378e">مشاهدة ترتيب الفرق والترتيب الفردي</a>
        </div>
    </div>
</div>
    -->

<form class="section" action="userpage.php" method="post">
    <div class="fixed" style=" display: flex; align-items: center;">
        <div class="container align-items-center align-items-sm-center" >
            <input style="font-size: medium;color: #FFFFFF" class="btn btn-primary2" value="تسجيل الخروج" type="submit" name="logout"/>
            <br>
        </div>
    </div>
</form>



<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <a href="index.php"><h2 class="arbaic-text-title2">امتحانات الشمامسة 2022</h2></a>
            <p class="tagline">امتحانات الشمامسة | مدرسة القديس أثناسيوس الرسولي للشمامسة | شتاء 2022 </p>
            <div class="my-4">
                <a href="tasgeelalhan.php" class="btn btn-light arbaic-text-small-nav">الألحان</a>
                <a href="copticpage.php" class="btn btn-light arbaic-text-small-nav">القبطي</a>
                <a href="takspage.php" class="btn btn-light arbaic-text-small-nav">الطقس</a>
                <a href="agbiapage.php" class="btn btn-light arbaic-text-small-nav">الأجبية</a>
                <a href="#" class="btn btn-light arbaic-text-small-nav">النتيجة</a>
            </div>
        </div>
    </div>
</div>

<div class="section bg-new-gradient" id="contact">
    <div class="container">
        <h4 class="center" style="color: #FFFFFF">ATHANASIUS DEACONS Development</h4>
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2"> <span class="ti-location-pin mr-2" style="color: #"></span>Nasr City, Cairo, Egypt.</p>
                <div class=" d-block d-sm-inline-block">
                    <p class="mb-2">
                        <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:athanasiusdeacons@gmail.com">athanasiusdeacons@gmail.com</a>
                    </p>
                </div>
                <div class="d-block d-sm-inline-block">
                    <p class="mb-0">
                        <span class="ti-headphone-alt mr-2"></span> <a href="tel:+201551198928">+20-1551198928</a>
                    </p>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="social-icons">
                    <a href="#https://www.facebook.com/Athanasiusdeacons"><span class="ti-facebook"></span></a>
                </div>
            </div>
        </div>

    </div>

</div>

<footer class="my-5 text-center">
    <p class="mb-2"><small>DEVELOPED BY: ROBS</a></small></p>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    function forgotPassword() {
        //alert("قم بالتواصل مع خدام المهرجان لتعديل كلمة السر أو اختيار كلمة سر جديدة!");

        Swal.fire({
            title: 'نسيت كلمة السر؟',
            text: 'قم بالتواصل مع خدام الكنترول أو خادم فصلك للحصول على كلمة السر الخاصة بك !',
            icon: 'info',
            confirmButtonText: '..OK..'
        })
    }
</script>

<script>
    function contact() {
        Swal.fire({
            title: 'Contact Us',
            text: '+201551198928  تقدر تتواصل معانا عن طريق الواتساب على الرقم ده ',
            icon: 'question',
            confirmButtonText: 'OK'
        });
    }
</script>

</body>
</html>
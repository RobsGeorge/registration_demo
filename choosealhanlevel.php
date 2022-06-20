<?php
require_once 'config.php';

$joinErr = "";
$valid_join = true;
$createErr = "";


if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

$sql7 = "SELECT * FROM `Player_Level` WHERE `Player_Code` = ".$_COOKIE['player-code'];
$res7 = $conn->query($sql7);
if($row7 = $res7->fetch())
{
    header('Location: userpage.php');
    exit();
}

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>Create/Join Team - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">

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

<div class="nav-menu bg-new-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="index.php"><img src="images/emtahan2.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="alhanpage.php">الألحان</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">القبطي</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">الطقس</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="mokmekpage.html">MOKMEK</a> </li>
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




<div class="section">
    <div class="container d-flex center flex-column">
        <p style="align-self: center; font-size: larger; font-family: 'El Messiri', sans-serif; color: #f5378e; text-align: center">بعد مشاهدتك للألحان في كل مستوى جاء وقت اختيار المستوى الذي تريد الالتحاق به أنت وفريقك. </p>
        <p style="align-self: center; font-size: larger; font-family: 'Almarai', sans-serif; color: #af09d5; text-align: center">لاحظ أنه يجب أن يقوم جميع أعضاء الفريق باختيار نفس المستوى، وتسجيل اختيارهم (جميعاً) للمستوى نفسه </p>
        <p style="align-self: center; font-size: larger; font-family: 'El Messiri', sans-serif; color: #bd2130; text-align: center">الآن، قم باختيار المستوى الذي تريد الالتحاق به أنت وفريقك! </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-6" style="align-items: center">
                <button id="zbtn"  style="font-size: 80px;font-family: myCopticFont; color: #FFFFFF" class=" btn btn-primary2" onclick="chooseLahnz()">Z</button>
            </div>
            <div class="col-md-4 col-6">
                <button id="xbtn" style="font-size: 80px; font-family: myCopticFont;" class=" btn btn-primary" onclick="chooseLahnx()">&</button>
            </div>
        </div>
        <div class="container d-flex center flex-column">
            <h3 id="joinLahnStatus" style="align-self: center; font-size: larger; font-family: 'El Messiri', sans-serif; color: #007bff; margin-top: 25px;"></h3>
            <a href="userpage.php" style="text-decoration: underline; margin-top: 10px;">العودة إلى صفحتي الشخصية للتأكد من التسجيل</a>
        </div>
    </div>
</div>



<div class="section bg-gradient  py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2"> <span class="ti-location-pin mr-2"></span>Nasr City, Cairo, Egypt.</p>
                <div class=" d-block d-sm-inline-block">
                    <p class="mb-2">
                        <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:robier_samir@hotmail.co.uk">robier_samir@hotmail.co.uk</a>
                    </p>
                </div>
                <div class="d-block d-sm-inline-block">
                    <p class="mb-0">
                        <span class="ti-headphone-alt mr-2"></span> <a href="tel:+201066468922">+20-1066468922</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>


    function chooseLahnx(){
        var formdata = new FormData();
        formdata.append("typ",'x');
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandler, false);
        ajax.open("POST", "join_level_parser.php");
        ajax.send(formdata);
    }

    function chooseLahnz(){
        var formdata = new FormData();
        formdata.append("typ",'z');
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandler, false);
        ajax.open("POST", "join_level_parser.php");
        ajax.send(formdata);
    }

    function completeHandler(event){
            document.getElementById("joinLahnStatus").innerHTML = event.target.responseText;
            document.getElementById("xbtn").disabled = true;
            document.getElementById("zbtn").disabled = true;
    }


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

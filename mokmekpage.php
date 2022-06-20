<?php
require_once 'config.php';


if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

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
$my_team_id=0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row2 = $res2->fetch();
    $my_team_id = $row2['Team_ID'];

}

$sql2 = "SELECT Team_Name,Team_Code FROM `Team` WHERE Team_ID=".$my_team_id;
$res2 = $conn->query($sql2);
$my_team_name="";
$my_team_code=0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row2 = $res2->fetch();
    $my_team_name = $row2['Team_Name'];
    $my_team_code = $row2['Team_Code'];

}

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>MokMek - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet">

    <script src="playaudio.js"></script>

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
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">القبطي</a></li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">الطقس</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="mokmekpage.php">MOKMEK</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="rankingpage.php">الترتيب</a> </li>
                            <li class="nav-item arbaic-text-small-nav">
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


<header class="" style="background-color: black" id="home">
    <div class="container mt-5">
        <h1 class="coptic-font-h2" style="color: #fd7e14"> <strong>MokMek</strong> </h1>
        <p class="tagline" style="padding-bottom: 20px;" dir="ltr">The Coptic Cluedo GAME!!</p>
    </div>
</header>


<!-- // end .section -->







<div class="section" style="background-color: black">
    <div class="container">
        <div class="row" dir="rtl">
<!--            <div class="col-sm-2 col-lg">
                <img src="images/3adra1.jpg" alt="dual phone" class="hymn-image">
            </div>-->
            <div class="d-flex flex-column align-items-center center" style="text-align: center">
                <div>
                    <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                    <br>
                        <h3 class="arbaic-text-title" style="font-size: 200%; text-align: center">WEEK 1</h3>
                    <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: center">سوف تشاهد فيديو (تسجيل صوتي) لمقدمة أحداث الجريمة. سوف تظهر لك بعض الأسماء للشخصيات التي ظهرت في هذا التسجيل، عند الضغط على اسم الشخصية سوف تستطيع قراءة بعض المعلومات عنه.</p>
                    <a href="mokmek/Mokmek_Martin.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">MARTIN</a>
                    <a href="mokmek/Mokmek_Joy.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">JOY</a>
                    <a href="mokmek/Mokmek_Mores.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">Mr. MORES</a>
                    <a href="mokmek/CLUE 1.mp4" class="btn btn-primary2 arbaic-text-small-nav" style="color: #FFFFFF;margin: 10px">CLUE 1 Watch/Download</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="section" style="background-color: black">
    <div class="container">
        <div class="row" dir="rtl">
            <!--            <div class="col-sm-2 col-lg">
                            <img src="images/3adra1.jpg" alt="dual phone" class="hymn-image">
                        </div>-->
            <div class="d-flex flex-column align-items-center center" style="text-align: center">
                <div>
                    <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                    <br>
                        <h3 class="arbaic-text-title" style="font-size: 200%; text-align: center">WEEK 2</h3>
                    <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: center">سوف تشاهد فيديو (تسجيل صوتي) لحدث من أحداث الجريمة. سوف تظهر لك بعض الأسماء للشخصيات التي ظهرت في هذا التسجيل، عند الضغط على اسم الشخصية سوف تستطيع قراءة بعض المعلومات عنه.</p>
                    <a href="mokmek/Mokmek_Samuel.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">SAMUEL</a>
                    <a href="mokmek/Mokmek_George.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">Mr. GEORGE</a>
                    <a href="mokmek/Mokmek _Michael.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">Mr. MICHAEL</a>
                    <a href="mokmek/CLUE 2.mp4" class="btn btn-primary2 arbaic-text-small-nav" style="color: #FFFFFF;margin: 10px">CLUE 2 Watch/Download</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section" style="background-color: black">
    <div class="container">
    <div class="row" dir="rtl">
        <div class="d-flex flex-column align-items-center center" style="text-align: center">
            <div>
                <br>
                <h3 class="arbaic-text-title" style="font-size: 200%; text-align: center">WEEK 3</h3>
                <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: center">سوف تشاهد فيديو (تسجيل صوتي) لحدث من أحداث الجريمة. سوف تظهر لك بعض الأسماء للشخصيات التي ظهرت في هذا التسجيل، عند الضغط على اسم الشخصية سوف تستطيع قراءة بعض المعلومات عنه.</p>
                <a href="mokmek/Mokmek_Samuel.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">SAMUEL</a>
                <a href="mokmek/Mokmek_George.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">Mr. GEORGE</a>
                <a href="mokmek/Mokmek_Selvester.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">Mr. Selvester</a>
                <a href="mokmek/CLUE 3.mp4" class="btn btn-primary2 arbaic-text-small-nav" style="color: #FFFFFF;margin: 10px">CLUE 3 Watch/Download</a>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="section" style="background-color: black">
    <div class="container">
        <div class="row" dir="rtl">
            <div class="d-flex flex-column align-items-center center" style="text-align: center">
                <div>
                    <br>
                    <h3 class="arbaic-text-title" style="font-size: 200%; text-align: center">WEEK 4</h3>
                    <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: center">سوف تشاهد فيديو (تسجيل صوتي) لحدث جديد من أحداث الجريمة.  سوف تستطيع قراءة بعض المعلومات عنه.</p>
                    <a href="mokmek/CLUE 4.mp4" class="btn btn-primary2 arbaic-text-small-nav" style="color: #FFFFFF;margin: 10px">CLUE 4 Watch/Download</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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

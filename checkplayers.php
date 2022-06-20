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

?>

<?php

/*$sql = "SELECT Full_Name, Image, Marhala FROM player WHERE Code=".$_COOKIE['player-code'];
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
}*/


$sqlu = "SELECT `Full_Name`, `Code`, `Marhala`,  `Image` FROM `player` ORDER BY `Full_Name` ASC";
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$players_names_array = array();
$players_codes_array = array();
$players_marhala_array = array();
$players_image_array = array();
$i=0;
foreach($result as $row) {
    $players_names_array[$i] = $row['Full_Name'];
    $players_codes_array[$i] = $row['Code'];
    $players_marhala_array[$i] = $row['Marhala'];
    $players_image_array[$i] = $row['Image'];
    $i = $i+1;
}


/*$sqlu = "SELECT `Team_ID`, `Team_Name`, `Members_Count`  FROM `Team` WHERE `ChosenFlag`=1";
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$teams_array = array();
$i=0;
foreach($result as $row) {
    $teams_array[$i] = $row['Team_ID'];
    $teams_names_array[$i]=$row['Team_Name'];
    $i = $i+1;
}*/




?>


<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <title>اللاعبين - مهرجان الألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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


<header class="bg-gradient">
    <div class="container mt-5">
        <h1  style="padding-bottom: 5px;" dir="ltr"><strong style="color: #FFFFFF;">Mahragan Players</strong></h1>
        <p class="arbaic-text-small-nav" style="text-align: center; font-size: large; color: #ffc107; padding-bottom: 30px" dir="rtl">تم ترتيب اللاعبين بالترتيب الأبجدي!</p>
    </div>
</header>


<?php
    for($j=0; $j<count($players_codes_array);$j++)
    {
        echo '
        <section>
<div class="container" style="padding-bottom: 30px">
    <div class="row">
        <div class="col-12">
            <div class="general-card">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(250, 42, 143, 0.2), 0 6px 20px 0 rgba(250, 42, 143, 0.19);">
                    <div class="card-body flex-column">
                            <div class="flex-column d-flex center align-items-center" style="align-items:center;">
        ';
        $sql = "SELECT `Level_ID`  FROM `Player_Level` WHERE `Player_Code`=" . $players_codes_array[$j];
        $res = $conn->query($sql);
        $row = $res->fetch();
        $x = $row['Level_ID'];

        if ($x == 1) {
            $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level:</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>1</h4>";
        } elseif ($x == 2) {
            $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level:</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>2</h4>";
        } elseif ($x == 3) {
            $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level:</h5><h4 class='' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>3</h4>";
        } elseif ($x == 4) {
            $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level:</h5><h4 class='coptic-font-h2' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>Z</h4>";
        } elseif ($x == 5) {
            $out = "<h5 dir=\"ltr\" style=\"text-align: center; margin-bottom: 20px\">Level:</h5><h4 class='coptic-font-h2' style='font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14'>&</h4>";
        }else{
            $out = '<h5 dir="ltr" style="text-align: center; margin-bottom: 20px">Team:</h5><h4 style=\'font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14\'>غير ملتحق بأي مستوى</h4>';;
        }

        $sql = "SELECT `Team_ID` FROM `Team-Members` WHERE  `Member_Code`=" . $players_codes_array[$j];
        $res = $conn->query($sql);
        $row = $res->fetch();
        if($res->rowCount()>0)
        {
            $y = $row['Team_ID'];
            $sqlx = 'SELECT `Team_Name` FROM `Team` WHERE `Team_ID`= '. $y;
            $res2 = $conn->query($sqlx);
            $rowx = $res2->fetch();
            $teamName = $rowx['Team_Name'];
        }
        else
        {
            $teamName = "غير ملتحق بأي فريق";
        }

        $first_name = substr($players_names_array[$j], 0, stripos($players_names_array[$j], " "));
        $players_names_array[$j] = substr($players_names_array[$j], stripos($players_names_array[$j], " ") + 1);
        $second_name = substr($players_names_array[$j], 0, stripos($players_names_array[$j], " "));
        $printable_name = $first_name . " " . $second_name;


        echo '<h2 style="text-align: center; color: #f5378e; padding-bottom: 25px"><strong>'.$printable_name.'</strong></h2>';
        echo  '<h2 class="arbaic-text-small-heading" style="text-align: center; color: #633991; padding-bottom: 25px">'.$players_marhala_array[$j].'</h2>';

        $b = $players_image_array[$j];
        if (empty($b) or $b == "") {
            $b = "images/avatar.jpg";
        }
        echo  '<div class="align-items-center" style="align-content: center; padding-bottom: 15px"><img id="myImg" alt="My Image" src='.$b.' class="" style="position:relative; overflow:hidden; height:500px; width:500px; border-radius: 50%; max-height: 150px; max-width: 150px;"></div>';
        echo $out;
        echo '<h5 dir="ltr" style="text-align: center; margin-bottom: 20px">Team:</h5><h4 style=\'font-size: xx-large; text-align: center; margin-bottom: 20px; padding-bottom: 20px; color: #fd7e14\'>'.$teamName.'</h4>';

        echo '                            </div>
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

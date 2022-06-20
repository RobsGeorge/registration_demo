<?php
require 'config.php';

if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

/*$sql2 = "SELECT Code FROM `hagztonia` WHERE Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$classNumber = $row2['ClassID'];
}*/

$i = 0;
$codesArray = array();
$namesArray = array();
$hymnIdsArray = array();

$sql = "SELECT Code, EstelamTime  FROM hagztonia";
$res = $conn->query($sql);
foreach($res->fetchAll() as $row)
{
    $codesArray[$i] = $row['Code'];
    
    $sql2 = "SELECT FirstName, SecondName, ThirdName FROM `shamamsastudentsdata` WHERE Code= ".$row['Code'];
    $res2 = $conn->query($sql2);
    if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
    {
    $row2 = $res2->fetch();
    $f = $row2['FirstName'];
    $s = $row2['SecondName'];
    $t = $row2['ThirdName'];

    $namesArray[$i] = $f.' '.$s.' '.$t;
    }

    $a = $row['EstelamTime'];
    if($a == 1) $hymnIdsArray[$i] = " الأول: الاحد 8 مايو";
    else if($a == 2)  $hymnIdsArray[$i] = " الثاني: الثلاثاء 10 مايو";
    else if($a == 3)  $hymnIdsArray[$i] = " الثالث: الخميس 12 مايو";
    else if($a == 4)  $hymnIdsArray[$i] = " الرابع: الجمعة 13 مايو";
    else if($a == 5)  $hymnIdsArray[$i] = " الخامس: الاحد 15 مايو";
    else $hymnIdsArray[$i] = "لم يتم الاختيار بعد";
    $i++;
}
?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>تسليم التونية - رسامات 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                        <a class="navbar-brand" href="index.php"><img src="images/emtahan2.png" class="img-fluid" alt="logo" style="max-width=50%"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                        <?php
                                        if(isset($_COOKIE['player-code'])){
                                            $sql = "SELECT FirstName FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
                                            $res = $conn->query($sql);
                                            $res->rowCount(); ////CODE FOUND IN DATABASE/////
                                                $row = $res->fetch();
                                                $playerFirstName = $row['FirstName'];

                                            echo '<a href="userpage.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav">'. $playerFirstName .'</a></li>';
                                        }
                                        else{
                                            echo '<a href="login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">التسجيل/الدخول</a></li>';
                                        }
                                        ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


<header class="bg-gradient" id="home">
    <div class="container mt-5">
        <h1 class="arbaic-text-title" style="padding-bottom: 30px;"> <strong>تسليم التونية - رسامات 2022</strong> </h1>
        <p id="status"></p>
    </div>
</header>




<?php

for($j=0;$j<$i;$j++)
{
    
    echo '
<div class="section flex-column center d-flex" style="padding-bottom: 20px">
    <h5  style=" align-self: center">الكود: ' .$codesArray[$j].'</h5>
    <h5  style=" align-self: center">الاسم: ' .$namesArray[$j].'</h5>
    <h5  style=" align-self: center">المعاد ' .$hymnIdsArray[$j].'</h5>
</div>';
}






/*
$sqlu = "SELECT `Member_Code`, `Week_Number`, `Hymn_ID`, `Hymn_Part`, `Hymn_Week_Score`, `Submission_Time`, `Submission_Url` FROM `Member_Week_Hymn_Score` WHERE `Week_Number`=".$weekNumber." GROUP BY `Member_Code`, `Hymn_ID`, `Hymn_Part` ORDER BY `Submission_Time` DESC";
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$players_codes_array = array();
$players_week_number_array = array();
$players_hymn_id_array = array();
$players_hymn_part_array = array();
$players_hymn_week_score = array();
$players_hymn_submission_time_array = array();
$players_hymn_submission_url_array = array();

$i=0;
foreach($result as $row) {
    $players_codes_array[$i] = $row['Member_Code'];
    $players_week_number_array[$i] = $row['Week_Number'];
    $players_hymn_id_array[$i] = $row['Hymn_ID'];
    $players_hymn_part_array[$i] = $row['Hymn_Part'];
    $players_hymn_week_score[$i] = $row['Hymn_Week_Score'];
    $players_hymn_submission_time_array[$i] = $row['Submission_Time'];
    $players_hymn_submission_url_array[$i] = $row['Submission_Url'];
    $i = $i+1;
}

for ($i=0;$i<count($players_codes_array);$i++) {
    echo '
<div class="section flex-column center d-flex" style="padding-bottom: 20px">
    <h5  style=" align-self: center">Code: ' .$players_codes_array[$i].'</h5>
    <h5  style=" align-self: center">Week NUmber: ' .$players_week_number_array[$i].'</h5>
    <h5  style=" align-self: center">Hymn ID: ' .$players_hymn_id_array[$i].'</h5>
    <h5  style=" align-self: center">Hymn Part: ' .$players_hymn_part_array[$i].'</h5>
    <h5  style=" align-self: center">Current Score: ' .$players_hymn_week_score[$i].'</h5>
    <form id="upload_formLahn" action="" method="post">
    <input type="input" class="form-control" style="font-weight: bold;text-align:center; align-self: center; color:#f5378e;border-radius: 15px;margin-top: 10px; max-width: 40%; max-width: 40vh; margin-bottom: 20px" id="input_'.$i.'" name="input_'.$i.'">
    <input type="submit"  id="submitbtn_'.$i.'" name="submibtn_'.$i.'" class="btn btn-primary label-title" style="max-width: 20%; max-width: 20vh; align-self: center; text-align: center; margin: 10px;" value="Submit"/>
    </form>
    <h5  style=" align-self: center">Submission Time: ' .$players_hymn_submission_time_array[$i].'</h5>
    <h5  style=" align-self: center">Submission Url: ' .$players_hymn_submission_url_array[$i].'</h5>
</div>

';

    if(isset($_POST['input_'.$i])) {
        $sql = "UPDATE `Member_Week_Hymn_Score` SET `Hymn_Week_Score`= " . $_POST['input_' . $i] . " WHERE `Member_Code` = " . $players_codes_array[$i] . " AND `Week_Number`= " . $weekNumber . " AND `Hymn_ID`= " . $players_hymn_id_array[$i] . " AND `Hymn_Part` =" . $players_hymn_part_array[$i]." AND `Submission_Time` LIKE \"%".substr($players_hymn_submission_time_array[$i],stripos($players_hymn_submission_time_array[$i]," ")+1)."%\"";
        $count = $conn->exec($sql);
        $conn = null;
        if ($count !== false) echo "تم تسجيل الدرجة بنجاح";
    }
}*/
?>



<div class="section bg-gradient  py-5">
    <div class="container">
        <h4 class="center" style="color: #FFFFFF">Robeir Samir George</h4>
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
        <a href="" class="m-2" onclick="contact()">CONTACT</a>
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



<!--<script>

    function _(el){
        return document.getElementById(el);
    }

    function uploadDaraga(i, player_code, hymn_id, hymn_part, submissionTime){

        var formdata = new FormData();
        var score = _("input_".concat(i.toString()));
        formdata.append("i",i);
        formdata.append("playerCode", player_code);
        formdata.append("hymnID", hymn_id);
        formdata.append("hymnPart",hymn_part);
        formdata.append("score",score);
        formdata.append("submissionTime",submissionTime);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandler, false);
        ajax.open("POST", "submitDaraga.php");
        ajax.send(formdata);
        //location.href = "submitDaraga.php";
    }

    function completeHandler(event){
            _("status").innerHTML = event.target.responseText;

    }
</script>-->

</body>
</html>

<?php
require_once 'config.php';
session_start();
if(!isset($_COOKIE['player-code']))
{
       header('Location: login.php');
       exit();
}




$termNumber = 1;
$year = 2022;

$sql = "SELECT ClassID FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $classID = $row['ClassID'];
}

$sql = "SELECT LevelName, YearInsideLevel, ClassName FROM classinfo WHERE ClassID =".$classID;
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $levelName = $row['LevelName'];
    $yearInsideLevel = $row['YearInsideLevel'];
    $className = $row['ClassName'];
}

$sql = "SELECT TermMaxGrade, StudentTermFinalGrade FROM finalgrades WHERE Code =".$_COOKIE['player-code']." AND TermNumber = ". $termNumber." AND Year = ".$year.";";
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $studentTermTotalScore = $row['StudentTermFinalGrade'];
    $maxTotalScore = $row['TermMaxGrade'];
}
else
{

    $numberOfHymnsInsideExam=0;
    $maxGradeOfEachHymn=0;
    $maxGradeOfTaksExam=0;
    $maxGradeOfCopticExam=0;
    $maxGradeOfAgbiaExam=0;
$sql = "SELECT  `NumberOfHymnsInsideExam`, `MaxGradeOfEachHymn`, `MaxGradeOfTaksExam`, `MaxGradeOfCopticExam`, `MaxGradeOfAgbiaExam`FROM `examsclassinfo` WHERE `ClassID` = ".$classID." AND `TermNumber` = ".$termNumber." AND `Year` = ". $year.";";
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $numberOfHymnsInsideExam = $row['NumberOfHymnsInsideExam'];
    $maxGradeOfEachHymn = $row['MaxGradeOfEachHymn'];
    $maxGradeOfTaksExam = $row['MaxGradeOfTaksExam'];
    $maxGradeOfCopticExam = $row['MaxGradeOfCopticExam'];
    $maxGradeOfAgbiaExam = $row['MaxGradeOfAgbiaExam'];
}


$sql = "SELECT LevelName, YearInsideLevel, ClassName FROM classinfo WHERE ClassID =".$classID;
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $levelName = $row['LevelName'];
    $yearInsideLevel = $row['YearInsideLevel'];
    $className = $row['ClassName'];
}

$hymnsGradesArray = array();
$hymnsIDsArray = array();
$i = 0;
$sql = "SELECT Hymn_ID, Grade FROM alhanresults WHERE Class=".$classID." And Code = ".$_COOKIE['player-code'];
$res = $conn->query($sql);
foreach($res->fetchAll() as $row)
{
    $hymnsIDsArray[$i] = $row['Hymn_ID'];
    $hymnsGradesArray[$i] = $row['Grade'];
    $i++;
}

$totalHymnsGrade = 0;
for($j=0;$j<$i;$j++)
{
    $totalHymnsGrade += $hymnsGradesArray[$j]; //summation of itmes in hymnsGradesArray
}

$agbiaGrade = 0;
$sql = "SELECT AgbiaExamScore FROM studentagbiaexamresults WHERE ClassID =".$classID." AND Code = ".$_COOKIE['player-code'];
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $agbiaGrade = $row['AgbiaExamScore'];
}

$copticGrade = 0;
$sql = "SELECT `CopticExamScore` FROM `studentcopticexamresults` WHERE ClassID =".$classID." AND Code = ".$_COOKIE['player-code'];
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $copticGrade = $row['CopticExamScore'];
}

$taksGrade = 0;
$sql = "SELECT `TaksExamScore` FROM `studenttaksexamresults` WHERE ClassID =".$classID." AND Code = ".$_COOKIE['player-code'];
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $taksGrade = $row['TaksExamScore'];
}

$studentTermTotalScore = $totalHymnsGrade + $agbiaGrade + $copticGrade + $taksGrade;
$maxTotalScore = $numberOfHymnsInsideExam*$maxGradeOfEachHymn + $maxGradeOfAgbiaExam + $maxGradeOfCopticExam + $maxGradeOfTaksExam;

if($studentTermTotalScore>$maxTotalScore)
{
    $studentTermTotalScore = $maxTotalScore;
}


$sql = "SET NAMES 'utf8'";
$sql = $sql . ';' . 'SET CHARACTER SET utf8';
$sql = $sql . ';' . "INSERT INTO `finalgrades`(`Code`, `ClassID`, `TermNumber`, `TermMaxGrade`, `StudentTermFinalGrade`, `Year`) VALUES (?,?,?,?,?,?)";
$stmtinsert = $conn->prepare($sql);
$result = $stmtinsert->execute([$_COOKIE['player-code'],$classID,$termNumber, $maxTotalScore, $studentTermTotalScore,$year]);

$stmtinsert->closeCursor();

}


?>

<!doctype html>
<html lang="ar" dir="rtl">

<!--<head>
    <title>My Account - ???????????? ?????????? 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
    <title>???????????????? ???????????????? 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="tasgeelalhan.php">??????????????</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">????????????</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">??????????</a> </li>
                              <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="agbiapage.php">??????????????</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">??????????????</a> </li>
                             
                            <?php
                            $sql = "SELECT 'FirstName', 'SecondName', 'ThirdName', 'Type' FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
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
        <h4 style="font-size:25px; color: #4E1370;"  >????????????</h4>
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
</header>


<div class="section" style=" display: flex; align-items: center;">
    <div class="container">
        <h2 class="arbaic-text-small-heading" dir="rtl">??????????: </h2>
        <h2 class="arbaic-text-small-heading" dir="rtl" style="color:#495057;"><?php echo $levelName;?></h2>
        <h2 class="arbaic-text-small-heading" dir="rtl">??????????: </h2>
        <h2 class="arbaic-text-small-heading" dir="rtl" style="color:#495057;"><?php echo $yearInsideLevel;?></h2>
        <h2 class="arbaic-text-small-heading" dir="rtl">??????????????: </h2>
        <h2 class="arbaic-text-small-heading" dir="rtl" style="color:#495057;"><?php echo $className;?></h2>
        <br/>
        <!--<h2 class="arbaic-text-small-heading" dir="rtl" style="color: #495057">??????????????: <?//php echo $playerMarhala;  ?></h2>-->
        <h3 class="arbaic-text-small-nav" style="text-align: center; color:#720F81; font-size: 35px">?????????? ?????????? ??????????</h3>
        <br/>
        <?php
        if($maxTotalScore<1)
        {
            echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">?????? ???????? ?????? 0 ???? 0 ?????????? 0%';
        }
        else{
          echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">?????? ???????? ?????? '.$studentTermTotalScore.' ???? '.$maxTotalScore.' ?????????? '.$studentTermTotalScore*100.0/$maxTotalScore.'"%"</h2>';
        }
        ?>
        <br/>
        <br/>
        <h3 class="arbaic-text-small-nav" style="text-align: center; color:#720F81; font-size: 35px">???????????? ???????? ?????? ??????????????:</h3>
        <?php
        $totalHymnsGrade + $agbiaGrade + $copticGrade + $taksGrade;
        if($agbiaGrade<0.6*$maxGradeOfAgbiaExam&&$maxGradeOfAgbiaExam>0)
        {
            echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">???????? ?????????? ?????? '.$termNumber.'</h2>';
        }
        if($taksGrade<0.6*$maxGradeOfTaksExam&&$maxGradeOfTaksExam>0)
        {
            echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">???????? ?????? ?????? '.$termNumber.'</h2>';
        }
        if($copticGrade<0.6*$maxGradeOfCopticExam&&$maxGradeOfCopticExam>0)
        {
            echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">???????? ???????? ?????? '.$termNumber.'</h2>';
        }
        $count = 0;
        for($i=0;$i<count($hymnsGradesArray);$i++)
        {
            if($hymnsGradesArray[$i]<0.6*$maxGradeOfEachHymn)
            {
                $sql = "SELECT `Hymn_Name` FROM `alhanquestions` WHERE ClassID =".$classID." AND Hymn_ID = ".$hymnIdsArray[$i];
                $res = $conn->query($sql);
                if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
                {
                    $row = $res->fetch();
                    $Hymn_Name = $row['Hymn_Name'];
                }
                echo  '<h2 class="arbaic-text-small-heading" dir="rtl" style="color:#DD1148;">'.$count.'. ?????? ?????? '.$hymnIdsArray[$i].' | ?????? ??????????: '.$Hymn_Name.'</h2>';
                $count++;
            }
        }
        ?>
    </div>
</div>




<div class="section">
    <div class="" dir="ltr">
        <a href="userpage.php" class="btn btn-outline-dark my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav" style="align-self:center;border-color: #f5378e">???????????? ???????????? ??????????????</a>
    </div>
</div>





<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <a href="index.php"><h2 class="arbaic-text-title2">???????????????? ???????????????? 2022</h2></a>
            <p class="tagline">???????????????? ???????????????? | ?????????? ???????????? ???????????????? ?????????????? ???????????????? | ???????? 2022 </p>
            <div class="my-4">
                <a href="tasgeelalhan.php" class="btn btn-light arbaic-text-small-nav">??????????????</a>
                <a href="copticpage.php" class="btn btn-light arbaic-text-small-nav">????????????</a>
                <a href="takspage.php" class="btn btn-light arbaic-text-small-nav">??????????</a>
                <a href="agbiapage.php" class="btn btn-light arbaic-text-small-nav">??????????????</a>
                <a href="#" class="btn btn-light arbaic-text-small-nav">??????????????</a>
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
        //alert("???? ???????????????? ???? ???????? ???????????????? ???????????? ???????? ???????? ???? ???????????? ???????? ???? ??????????!");

        Swal.fire({
            title: '???????? ???????? ??????????',
            text: '???? ???????????????? ???? ???????? ???????????????? ???? ???????? ???????? ???????????? ?????? ???????? ???????? ???????????? ???? !',
            icon: 'info',
            confirmButtonText: '..OK..'
        })
    }
</script>

<script>
    function contact() {
        Swal.fire({
            title: 'Contact Us',
            text: '+201551198928  ???????? ???????????? ?????????? ???? ???????? ???????????????? ?????? ?????????? ???? ',
            icon: 'question',
            confirmButtonText: 'OK'
        });
    }
</script>

</body>
</html>
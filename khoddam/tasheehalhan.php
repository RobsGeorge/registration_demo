<?php
require '../config.php';

if(!isset($_COOKIE['player-code']))
{
    header('Location: ../login.php');
    exit();
}

$sql2 = "SELECT ClassID FROM `servantclasstable` WHERE `ServantCode`=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
$classNumber = 0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$classNumber = $row2['ClassID'];
}

$pageLoadingLimit = 50;

/*
$sql2 = "SELECT ClassID FROM `shamamsastudentsdata` WHERE Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$classNumber = $row2['ClassID'];
}
*/

$i = 0;
$codesArray = array();
$hymnIdsArray = array();
$sunmissionTimeArray = array();
$submissionURLArray = array();
$gradesArray = array();
$isGradedArray = array();
$isGradedTextArray = array();

$sql = "SELECT Code, Hymn_ID, Sunmission_Time, Submission_URL, Grade  FROM alhanresults WHERE Class = ".$classNumber." ORDER BY Hymn_ID ASC";
$res = $conn->query($sql);
foreach($res->fetchAll() as $row)
{
    $codesArray[$i] = $row['Code'];
    $hymnIdsArray[$i] = $row['Hymn_ID'];
    $sunmissionTimeArray[$i] = $row['Sunmission_Time'];
    $submissionURLArray[$i] = $row['Submission_URL'];
    $gradesArray[$i] = $row['Grade']/2;
    if($gradesArray[$i]!=0)
        {
            $isGradedTextArray[$i] = "تم تصحيح هذا اللحن من قبل وإدخال الدرجة سابقاً";
        }
    else
        {
            $isGradedTextArray[$i] = "";
        }
    $i++;
}

$_SESSION['codesArray'] = $codesArray;
$_SESSION['hymnIdsArray'] = $hymnIdsArray;
$_SESSION['gradesArray'] = $gradesArray;
$_SESSION['numberOfElements'] = $i;

$numberOfPages = ceil($i/$pageLoadingLimit);


function changeToStars($s)
{
    $l = strlen($s);
    $s2="";
    for($j=0;$j<$l-2;$j++)
    {
        $s2[$j] = '*';
    }
    return $s2.substr($s,0,2);
}

$hymnsNamesHashMap = array();
$hymnsMatloobHashMap = array();

$sql = "SELECT Hymn_ID, Hymn_Name, Matloob  FROM alhanquestions WHERE Class = ".$classNumber.";";
$res = $conn->query($sql);
foreach($res->fetchAll() as $row)
{
    $x = $row['Hymn_ID'];
    $hymnsNamesHashMap[$x] = $row['Hymn_Name'];
    $hymnsMatloobHashMap[$x] = $row['Matloob'];
}

$className = "";
$subClassName = "";
switch($classNumber)
{
    case 1:
        $className = "المستوى التمهيدي";
        $subClassName = "حضانة";
        break;
    case 2:
        $className = "المستوى الأول السنة الثانية";
        $subClassName = "أولى وثانية ابتدائي";
        break;
    case 3:
        $className = "المستوى الأول السنة الثانية";
        $subClassName = "من ثالثة إلى سادسة ابتدائي";
        break;
    case 4:
        $className = "المستوى الأول السنة الثانية";
        $subClassName = "اعدادي وثانوي";
        break;
    case 5:
        $className = "المستوى الأول السنة الثانية";
        $subClassName = "جامعة وخريجين";
        break;
    case 6:
        $className = "المستوى الأول السنة الثالثة";
        $subClassName = "ابتدائي";
        break;
    case 7:
        $className = "المستوى الأول السنة الثالثة";
        $subClassName = "اعدادي وثانوي وجامعة وخريجين";
        break;
    case 8:
        $className = "المستوى الثاني";
        $subClassName = "ابتدائي";
        break;
    case 9:
        $className = "المستوى الثاني";
        $subClassName = "اعدادي وثانوي";
        break;
    case 10:
        $className = "المستوى الثاني";
        $subClassName = "جامعة وخريجين";
        break;
    case 11:
        $className = "المستوى الثالث";
        $subClassName = "اعدادي وثانوي";
        break;
    case 12:
        $className = "المستوى الثالث";
        $subClassName = "جامعة وخريجين";
        break;
    case 13:
        $className = "المستوى الرابع";
        $subClassName = "ثانوي وجامعة وخريجين";
        break;
    case 14:
        $className = "المستوى الخامس";
        $subClassName = "جامعة وخريجين";
        break;
}

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>تصحيح الألحان - امتحانات ألحان 2022</title><link rel="shortcut icon" type="image/x-icon" href="../images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet">

    <script src="../playaudio.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">



    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.php"><img src="../images/emtahan2.png" class="img-fluid" alt="logo" style="max-width=50%"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">الألحان</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">القبطي</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">الطقس</a> </li>
                              <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">الأجبية</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">النتيجة</a> </li>
                                        <?php
                                        if(isset($_COOKIE['player-code'])){
                                            $sql = "SELECT FirstName FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
                                            $res = $conn->query($sql);
                                            $res->rowCount(); ////CODE FOUND IN DATABASE/////
                                                $row = $res->fetch();
                                                $playerFirstName = $row['FirstName'];

                                            echo '<a href="index.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav">'. $playerFirstName .'</a></li>';
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
        <h1 class="arbaic-text-title" style="padding-bottom: 30px;"> <strong>تصحيح الألحان</strong> </h1>
        <p id="status"></p>
    </div>
</header>

<section class="">
<div>
    <h2 class="arbaic-text-title" style="padding-bottom: 15px; font-size:30px; text-align:center"><?php echo $className;?></h2>
        <h3 class="arbaic-text-title" style="padding-bottom: 15px; font-size:25px; text-align:center; color:#D509B3;"><?php echo $subClassName;?></h3>
    </div>
</section>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php


for($j=0;$j<$i;$j++) 
{
echo '
<section class="login general-pages d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="general-card">
                    <div class="card">
                        <div class="card-body">
                            
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="code" class="label-title">كود الطالب</label>
                                    <h5  style=" align-self: center">'.changeToStars($codesArray[$j]).'</h5>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="code" class="label-title">اسم اللحن</label>
                                    <h5  style=" align-self: center">'.$hymnsNamesHashMap[$hymnIdsArray[$j]].'</h5>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="code" class="label-title">المطلوب تسميعه</label>
                                    <h5  style=" align-self: center">'.$hymnsMatloobHashMap[$hymnIdsArray[$j]].'</h5>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                <label dir="rtl" for="code" class="label-title">ميعاد تسليم اللحن</label>
                                <h5  style=" align-self: center">'.$sunmissionTimeArray[$j].'</h5>
                                </div>
                                <br/>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                <audio controls>
                                    <source src="../'.$submissionURLArray[$j].'" type="audio/ogg">
                                    <source src="../'.$submissionURLArray[$j].'" type="audio/mpeg">
                                </audio>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <div>
                                        <label dir="rtl" for="code" class="label-title">اذا واجهتك مشكلة في سماع التسجيل يمكنك تنزيله من هنا</label>
                                    </div>
                                    <div>
                                        <a href="../'.$submissionURLArray[$j].'" target="_blank" download="hymn.file" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل التسجيل</a>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="code" class="label-title">درجة اللحن (من 1 إلى 5)</label>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <a class="btn btn-primary arbaic-text-small-nav2" style="font-color:#ffffff; border-radius: 15px; margin-right: 10px;" onclick="increment('.$j.')">+</a>
                                    <input type="text" style="font-weight:500; font-size: 25px; color:#83147A; margin-right: 10px;  text-align: center; margin-left: 10px; border-radius: 25px;" id="hymn-grade'.$j.'" name="hymn-grade'.$j.'"
                                         dir="" size="2" maxlength="5" value="'.$gradesArray[$j].'" readonly>
                                    <a class="btn btn-primary arbaic-text-small-nav2" style="font-color:#ffffff; border-radius: 15px; " onclick="decrement('.$j.')">-</a>
                                        
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                <label dir="rtl" for="l2" class="label-title" style="color:red; font-weight:bold;">'.$isGradedTextArray[$j].'</label>
                                </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
}

echo '
<input class="" style="position:fixed;
bottom:80px;
left:40px;
width:80px;
height:80px;
background-color:#f60;
white-space: pre-wrap;
color:#FFF;
border: 3px  solid black;
border-radius:50px;
text-align:center;
box-shadow: 2px 2px 3px #999;" type="submit" name="submitbtn" value="ادخال الدرجات"/>
';
?>
</form>
<?php

if(isset($_POST['submitbtn']))
{
    $finalArrayOfCodes = $_SESSION['codesArray'];
    $finalHymnsArray = $_SESSION['hymnIdsArray'];
    $finalGradesArray = $_SESSION['gradesArray'];

    for($x=0;$x<$_SESSION['numberOfElements'];$x++){
        $finalGradesArray[$x] = (int)($_POST['hymn-grade'.$x]);
        $finalGradesArray[$x]*=2;
        echo $finalGradesArray[$x];
        echo "<br/>";
    }

    for($x=0;$x<$_SESSION['numberOfElements'];$x++){
        if($finalGradesArray[$x]!=0)
        {
            $sql = "SET NAMES 'utf8'";
            $sql = $sql . ';' . 'SET CHARACTER SET utf8';
            $sql = "UPDATE `alhanresults` SET `Grade`= ".$finalGradesArray[$x].", `servantCode`= ".$_COOKIE['player-code'].", `tasheehSubmissionTime` = '".date('Y/m/d H:i:s', time())."'  WHERE `Code` = ".$finalArrayOfCodes[$x]." AND `Hymn_ID` = ".$finalHymnsArray[$x].";";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
        }
    }
}
?>



<div class="section bg-gradient  py-5">
    <div class="container">
        <h4 class="center" style="color: #FFFFFF">ATHANASIUS DEACONS Development</h4>
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2"> <span class="ti-location-pin mr-2"></span>Nasr City, Cairo, Egypt.</p>


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
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="../js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="../js/script.js"></script>
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

<script>
    function increment($j)
    {
        var grade = document.getElementById("hymn-grade".concat($j)).value;
        grade = parseInt(grade);
        if(grade>=5)
        {
            ;
        }
        else
        {
            grade += 1;
        }
        document.getElementById("hymn-grade".concat($j)).value = grade;
    }
    function decrement($j)
    {
        var grade = document.getElementById("hymn-grade".concat($j)).value;
        grade = parseInt(grade);
        if(grade<=1)
        {
            ;
        }
        else
        {
            grade -= 1;
        }
        document.getElementById("hymn-grade".concat($j)).value = grade;
    }
</script>

</body>
</html>

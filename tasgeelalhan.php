<?php
require_once 'config.php';
session_start();
$weekNumber=1;
$_SESSION['alhan_exam_week']=$weekNumber;

if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

$numberOfHymns = 0;

$sql = "SELECT classID FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $classNumber = $row['classID'];
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


$sql = "SELECT COUNT(*) FROM alhanquestions WHERE Class=".$classNumber;
$res = $conn->query($sql);
$row = $res->fetchColumn();
$numberOfHymns = $row;

$arrayOfHymnIDs = []; 
$arrayOfHymnMatloob = []; 
$arrayOfHymnNames = [];
$sql = "SELECT Hymn_ID, Hymn_Name, Matloob FROM alhanquestions WHERE Class=".$classNumber;
$res = $conn->query($sql);

   $i = 0;
    foreach ($res->fetchAll() as $row)
    {
        $arrayOfHymnIDs[$i] = $row["Hymn_ID"];
        $arrayOfHymnNames[$i] = $row["Hymn_Name"];
        $arrayOfHymnMatloob[$i] = $row["Matloob"];
        $i++;
    }





/*
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
*/
?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>تسجيل الألحان - امتحان ألحان 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="tasgeelalhan.php">الألحان</a> </li>
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">القبطي</a> </li>
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">الطقس</a> </li>
                                  <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="agbiapage.php">الأجبية</a> </li> 
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
        <h1 class="arbaic-text-title" style="padding-bottom: 30px;"> <strong>تسجيل الألحان</strong> </h1>
    </div>
</header>



<div class="flex-column center d-flex">
    <h3  style=" align-self: center">Term 1</h3>
    <h4 style="align-self: center; color: #bd2130" class="arbaic-text-small-nav">آخر ميعاد لتسليم الألحان : الجمعة 25 مارس 2022 قبل الساعة 12 ليلاً</h4>
</div>

<div class="section">
    <div class="container d-flex center flex-column">
        <h2 class="arbaic-text-small-nav" style="text-align:center;font-size: xx-large; color: #004085">ملحوظة مهمة: يمكنك تسجيل وارسال اللحن العدد الذي تريده من المرات/المحاولات بدون أي قيود، وسنقوم بتقييم آخر محاولة فقط</h2>
    </div>
                                    </div>


<div class="flex-column center d-flex" id="z">
    <h3  class = "arbaic-text-title2" style="font-size: 60px; color: #f5378e; align-self: center"><?php echo $className; ?></h3>
    <h2  class = "arbaic-text-title2" style="font-size: 40px; color: #6A37F5; align-self: center"><?php echo $subClassName; ?></h2>
</div>

<?php

for($i=1;$i<=$numberOfHymns;$i++)
{
    echo "<div class=\"section bg-new-gradient\" style=\"margin-top: 20px;margin-bottom: 20px\">
    <div class=\"container\">
        <div class=\"flex-column\" dir=\"ltr\">
            <div class=\"align-items-center\">
                <div>
                    <!--<div class=\"box-icon\"><span class=\"ti-rocket gradient-fill ti-3x\"></span></div>-->
                    <br>
                    <h3 class=\"arbaic-text-title\" style=\"font-size: 200%; text-align: center\">".$i."</h3>
                    <h3 class=\"arbaic-text-title\" style=\"font-size: 200%; text-align: right\">".$arrayOfHymnNames[$i-1]."</h3>
                    <p class=\"mb-4 arbaic-text-small-nav2\" dir=\"rtl\" style=\"text-align: right\">المطلوب: ".$arrayOfHymnMatloob[$i-1]."</p>
                </div>
                <h4 style=\"text-align: center; color: #bd2130; font-size: large;\" dir=\"rtl\">قم بتسجيل اللحن ورفع التسجيل هنا:</h4>
                <h5 style=\"font-size: large; text-align: center\" dir=\"rtl\" >(عند الضغط على اختيار الملف يمكنك فتح الميكروفون والتسجيل فوراً أو يمكنك اختيار الملف من على جهازك أو التسجيل من على جهازك)</h5>
                <form id=\"upload_formLahn_".$i."_1\" action=".htmlspecialchars($_SERVER['PHP_SELF']).";method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"flex-column\" style=\"display:flex;justify-content:center;align-items:center;\" dir=\"ltr\">
                    <div><input type='file' class=\"btn btn-primary2\" id = \"lahn_".$i."_1\" name=\"lahn_".$i."_1\"/></div>
                    <input type='button' class=\"col-sm-3 btn arbaic-text-small-heading\" dir=\"rtl\"   name=\"submitLahn_".$i."_1\" value=\"اضغط لرفع تسجيل اللحن\" style=\"font-family: 'Almarai', sans-serif;font-size: medium; min-width: 50%; background-color: #f5378e; color: #FFFFFF; margin-top: 10px\" onclick=\"uploadFile(".$i.",1,".$classNumber.",".$arrayOfHymnIDs[$i].")\"/>
                    <progress id=\"progressBarlahn_".$i."_1\" value=\"0\" max=\"100\" style=\"width:300px;\"></progress>
                    <h3 id=\"statuslahn_".$i."_1\" dir=\"rtl\"></h3>
                </div>
                </form>
        </div>
    </div>
</div></div>";
}

?>


<!-- // end .section -->
<div>
</br>
</br>
</div>

<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <a href="index.php"><h2 class="arbaic-text-title2">امتحانات الشمامسة 2022</h2></a>
            <p class="tagline">امتحانات الشمامسة | مدرسة القديس أثناسيوس الرسولي للشمامسة | شتاء 2022 </p>
            <div class="my-4">
                <a href="#" class="btn btn-light arbaic-text-small-nav">الألحان</a>
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


<script>

    function _(el){
        return document.getElementById(el);
    }
    var x;var y;

    function uploadFile(hymn_id,hymn_part,class_number,hymn_db_id){
        x=hymn_id;y=hymn_part;
        var file = _((("lahn_".concat(x.toString())).concat("_")).concat(y.toString())).files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append((("lahn_".concat(x.toString())).concat("_")).concat(y.toString()), file);
        formdata.append("hymnID",hymn_id);
        formdata.append("hymnPart",hymn_part);
        formdata.append("classNumber",class_number);
        formdata.append("hymnDBId", hymn_db_id);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "alhan_upload_parser.php");
        ajax.send(formdata);
    }

    function progressHandler(event){
        //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _((("progressBarlahn_".concat(x.toString())).concat("_")).concat(y.toString())).value = Math.round(percent);
        _((("statuslahn_".concat(x.toString())).concat("_")).concat(y.toString())).innerHTML = Math.round(percent) + "% Uploaded";
    }

    function completeHandler(event){
        _((("statuslahn_".concat(x.toString())).concat("_")).concat(y.toString())).innerHTML = event.target.responseText;
        _((("progressBarlahn_".concat(x.toString())).concat("_")).concat(y.toString())).value = 0;
    }

    function errorHandler(event){
        _((("statuslahn_".concat(x.toString())).concat("_")).concat(y.toString())).innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _((("statuslahn_".concat(x.toString())).concat("_")).concat(y.toString())).innerHTML = "Upload Aborted";
    }

</script>

</body>
</html>




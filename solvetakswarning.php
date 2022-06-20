<?php
require_once 'config.php';


if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

$examDuration = 0;
$numberOfQuestions = 0;

$sql2 = "SELECT ClassID FROM `shamamsastudentsdata` WHERE Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$classNumber = $row2['ClassID'];
}


$sql2 = "SELECT NumberOfQuestions, ExamDuration FROM `taksexams` WHERE ClassID=".$classNumber;
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$numberOfQuestions = $row2['NumberOfQuestions'];
$examDuration = $row2['ExamDuration'];
}


?>

<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>امتحان الطقس 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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

<body data-spy="scroll" data-offset="15">

<!-- Nav Menu -->



<header class="bg-gradient">
    <div class="container mt-5">
        <h1 class="arbaic-text-title" style="padding-bottom: 20px"> <strong>امتحان الطقس</strong> </h1>
        
    </div>
</header>


<div class=" d-flex center flex-column" style="padding: 80px; align-items: center">
    <p class="tagline" style="font-size:30px; color:#3A22A7;;" dir="rtl">مدة الامتحان : <?php echo $examDuration . " دقيقة";?></p>
    <p class="tagline" style="font-size:30px; color:#AF1481;;" dir="rtl">عدد الأسئلة : <?php echo $numberOfQuestions;?></p>
    <br/>
    <h2 class="arbaic-text-title2" style="text-align:center;font-size: xx-large; color: #004085; text-align: center">تحذير!!</h2>
    <p class="arbaic-text-small-nav" style="color: black; text-align: center">امتحان الطقس هي عبارة عن امتحان له مدة زمنية محددة تتغير على حسب الامتحان وتكون مكتوبة في أول صفحة الامتحان، مع انتهاء المدة يتم غلق الصفحة تلقائياً وتسليم الاجابات التي تمت الاجابة عليها فقط.</p>
    <p class="arbaic-text-small-nav" style="color:#bd2130; text-align: center">يجب الانتباه أيضاً أن محاولة إعادة تحميل الصفحة، أو الخروج والدخول مرة أخرى أو أي انقطاع في الشبكة سوف يتسبب في عدم تسليم الإجابات بشكل سليم، لذا نرجو توخي الحذر والإجابة بسرعة بقدر الإمكان.</p>
    <a href="solvetaks.php" class="btn btn-primary" style="font-size:25px; padding: 15px;margin: 10px">الذهاب لامتحان الطقس</a>
    <a href="userpage.php" class="btn btn-primary2" style="font-size:15px; padding: 15px; margin: 10px; color: #FFFFFF">العودة لصفحتي الشخصية</a>

</div>


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
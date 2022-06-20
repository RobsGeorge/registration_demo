<?php
if(!empty($_COOKIE['ebteda2y-player-code'])) {
    setcookie("ebteda2y-player-code","",time()-3600,"/");
    header('Location: ebteda2yalhan.php');
    exit();
}
require_once 'config.php';
$code = "";
$valid_code=true;
$codeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submitbtn'])) {
    $code = $_POST["ebteda2y-player-code"];
}



if(!empty($code)) {
    if(strlen($code) < 2 or strlen($code) > 5){
        $valid_code = false;
        $codeErr = "من فضلك أدخل الكود الخاص بك في مدرسة الشمامسة بشكل صحيح";
    }
    elseif(substr($code, 0, 1) != '1' and substr($code, 0, 1) != '2'){
        $valid_code = false;
        $codeErr = "من فضلك أدخل الكود الخاص بك في مدرسة الشمامسة بشكل صحيح";
    }
    if($valid_code)
    {
        /////CHECH IF CODE FOUND//////
        $sql3 = "SELECT Student_Code FROM `Ebteda2y_Students_Codes` WHERE Student_Code=".$code;
        $res3 = $conn->query($sql3);

        if($res3->rowCount()>0) ////CODE FOUND IN DATABASE/////
        {
            setcookie("ebteda2y-player-code", $code, time() + (86400 * 30), "/");
            header('Location:ebteda2yalhan.php');
            exit();
        }
        else {
            setcookie("ebteda2y-player-code", $code, time() + (86400 * 30), "/");
            $sql = "SET NAMES 'utf8'";
            $sql = $sql . ';' . 'SET CHARACTER SET utf8';
            $sql = $sql . ';' . "INSERT INTO `Ebteda2y_Students_Codes`(Student_Code) VALUES (?)";
            $stmtinsert = $conn->prepare($sql);
            $result = $stmtinsert->execute([$code]);
        }
        header('Location:ebteda2yalhan.php');
        exit();
    }
}

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>ابتدائي - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                    <a class="navbar-brand" href="#home"><img src="images/emtahan2.png" class="img-fluid" alt="logo"></a>
                </nav>
            </div>
        </div>
    </div>
</div>


<header class="bg-gradient" id="home">
    <div class="container mt-5">
        <h1 class="arbaic-text-title"> <strong>مهرجان ألحان</strong> </h1>
        <h1 class="arbaic-text-title">صيف <strong>2020</strong></h1>
        <p class="tagline"><strong>مهرجان الألحان هو مسابقة في الألحان الكنسية واللغة القبطية والطقوس الكنسية | مدرسة القديس أثناسيوس الرسولي للشمامسة بمدينة نصر | صيف 2020</strong></p>
        <h1 class="arbaic-text-title">مرحلة ابتدائي</h1>
    </div>
    <div class="img-holder mt-3"><img src="images/lo2.png" alt="phone" class="img-fluid"></div>
</header>

<!-- // end .section -->

<section class="login general-pages d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="general-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="subtitle-heading2"> انشاء حساب (مرحلة ابتدائي)</h3>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" lang="ar" for="code" class="label-title">الكود</label>
                                    <?php if(!empty($codeErr))
                                        echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $codeErr . "</h2>";?>
                                    <input type="number" class="form-control" style="color:#2e3133;" id="code" name="ebteda2y-player-code"
                                           aria-describedby="emailHelp" placeholder="أدخل الكود الخاص بك في مدرسة الشمامسة" dir="rtl" required>
                                </div>

                                <div class="row">
                                    <button type="submit" name="submitbtn" class="btn btn-primary label-title" style="margin: 20px"> تسجيل الدخول </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- // end .section -->



<!--<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images/mic.jpg" alt="dual phone" class="hymn-image">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h2>ابدأ تسجيل اللحن الآن</h2>
                    <p class="mb-4">اضغط على تسجيل اللحن لبدء تسجيل اللحن الذي قمتَ باختياره من قائمة الألحان والأسابيع السابفة بأعلى </p>
                    <p class="arbaic-text-small-heading">ملحوظة هامة: يجب أن تقوم بتسجيل الدخول أولاً قبل تسجيل أي لحن أو إجابة أي سؤال في مسابقة اللغة القبطية أو مسابقة الطقس، لأنه بدون تسجيل الدخول لن يتم الاحتفاظ بتسجيلك أو إجاباتك. احترس جيداً!!</p>
                    <a href="#" class="btn btn-primary2 arbaic-text-small-nav2">تسجيل الآن</a></div>
            </div>
        </div>

    </div>

</div>-->
<!--end section-->










<div class="bg-gradient py-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2"> <span class="ti-location-pin mr-2" style="color: "></span>Nasr City, Cairo, Egypt.</p>
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
    <p class="mb-2"><small>DEVELOPED BY: ROBS</a></small></p>

    <small>
        <a href="#" class="m-2">HOME</a>
        <a href="#" class="m-2">ABOUT</a>
        <a href="#" class="m-2">CONTACT</a>
    </small>
</footer>


<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>


</body>
</html>


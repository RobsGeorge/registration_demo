<?php require 'config.php';
session_start();


$login_input_code = $login_input_password = "";
$loginErr = "";
$valid_login=false;
if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['submit'])) {
    $login_input_code = $_POST['player-code'];
    $login_input_password = $_POST['player-password'];
    if($login_input_code=="" or $login_input_password==""){$valid_login=false;$loginErr="من فضلك قم بادخال الكود وكلمة السر!";}
    else{

    $sql = "SELECT Code, Password, Type FROM shamamsastudentsdata WHERE Code=".$login_input_code;
    $res = $conn->query($sql);

    if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
    {
        $row = $res->fetch();
        $login_true_code = $row['Code'];
        $login_true_password = $row['Password'];
        $login_true_type = $row['Type'];

        if($login_true_password==$login_input_password)
        {
            setcookie('player-code',$login_true_code, time() + (86400 * 30),"/");
            $valid_login = true;
        }
        else
        {
            $loginErr = "خطأ في كلمة السر! برجاء المحاولة مرة أخرى";
            $valid_login = false;
        }
    }
    else{ /////CODE NOT FOUND IN DATABASE//////
        $loginErr = "هذا المستخدم غير موجود! الرجاء التأكد من الكود وكلمة السر";
        $valid_login = false;
    }
}
}

if($valid_login and isset($_POST['submit'])){header('Location: userpage.php');exit();}

?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <title>تسجيل الدخول - امتحانات الشمامسة 2022</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
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

<body>


<section>
    <div class="bg-gradient fixed-top nav-menu" data-offset="50">
        <div>
            <a href="index.php">
                <img src="images/lo3.png">
            </a>
        </div>
    </div>
</section>

<section>
    <div class="container mt-5">
        <br>
        <br>
        <br>
        <br>
        <div class="align-items-center">
            <h1 class="arbaic-text-title2"> <strong>تسجيل الدخول لحسابك</strong> </h1>
            <?php if(isset($_COOKIE['player-code'])) echo '<h6>You are already logged in as ' . $_COOKIE['player-code'] . '</h6>'; ?>
        </div>
    </div>
</section>

<section class="login general-pages d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="general-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="code" class="label-title">الكود</label>
                                    <input type="text" class="form-control" style="color:#2e3133;" id="code" name="player-code"
                                           aria-describedby="emailHelp" placeholder="أدخل الكود الخاص بك في مدرسة الشمامسة" dir="rtl">
                                </div>
                                <div class="form-group subtitle-heading2">
                                    <label for="password" class="label-title">كلمة السر</label>
                                    <input type="password" class="form-control" style="color:#2e3133;" id="password" name="player-password"
                                           placeholder="أدخل كلمة السر الخاصة بك في مدرسة الشمامسة" dir="rtl">
                                </div>
                                <?php if(!empty($loginErr))
                                    echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $loginErr . "</h2>";?>
                                <div class="row">
                                    
                                    <input class="btn label-title2" style="margin-right: 30px; padding:15px; background-image: -moz-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -webkit-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -ms-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: linear-gradient( 122deg, #af09d5 0%, #af09d5 100%); font-weight:500; font-size:30px; border-radius: 10px" value="الدخول" type="submit" name="submit"/>
                                </div>
                            </form>
                            <br>
                            <div  dir="ltr">
                                <a href="#" class="label-title link" onclick="forgotPassword()"> نسيت كلمة السر؟ </a>
                            </div>
                            <br>
                            <div  dir="ltr">
                                <a href="register.php" class="arbaic-text-small-nav" style="font-size: 22px"> ليس لديك حساب؟ قم بإنشاء حساب جديد </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <a href="index.php"><h2 class="arbaic-text-title2">امتحانات الشمامسة 2022</h2></a>
            <p class="tagline">امتحانات الشمامسة | مدرسة القديس أثناسيوس الرسولي للشمامسة | شتاء 2022 </p>
            <div class="my-4">
                <a href="alhanpage.php" class="btn btn-light arbaic-text-small-nav">الألحان</a>
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
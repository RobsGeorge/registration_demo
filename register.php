<?php
// Start the session
//session_start();
require_once 'config.php';
?>

<!doctype html>
        <html lang="ar" dir="rtl">
        <head>
            <title>التحاقات مدرسة الشمامسة</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
            <h1 class="arbaic-text-title2"> <strong>تأكيد التحاقات المتأخرين عن الترم الأول</strong> </h1>
        </div>
    </div>
</section>
<?php
// define variables and set to empty values

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$name = $code = $phone_number =  $email = $password = $passwordVerification =  $firstname = "";
$valid_name = $valid_code = $valid_phone_number  = $valid_email = $valid_password = $valid_password_verification = true;



if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submitbtn'])) {
    $code = test_input($_POST["reg-player-code"]);
}

    $code = test_input($code);
    $codeErr = "";





/////////////////////*CHECK CODE VALIDATIOM*//////////////////
if(!empty($code)) {
        $sql = "SELECT enteredLinkBefore FROM student WHERE validationCode=".$code;
        $res = $conn->prepare($sql);
        $res->execute();
        
        if($res->rowCount()==0)
        {
            $valid_code = false;
            $codeErr = " هذا الكود غير موجود! من فضلك قم بالرجوع لخادم الفصل الخاص بك";
        }
        else if($res->rowCount()==1)
        {
            $sss = $res->fetch();
            $enteredBefore = $sss["enteredLinkBefore"];
            if($enteredBefore == 1)
            {
                $valid_code = false;
                $codeErr = " لقد تم ادخال هذا الكود من قبل!الرجاء التأكد من الرقم مرة أخرى";
            }
            else
            {
                $valid_code = true;
                $sql = "UPDATE student SET enteredLinkBefore = 1 WHERE validationCode=".$code;
                $res = $conn->prepare($sql);
                $res->execute();
            }
        }
}

if($valid_code and isset($_POST['submitbtn']))
{
    header('Location: register_final.php');
    exit();
}


?>
<section class="login general-pages d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="general-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="subtitle-heading2"> ادخال بيانات الطالب </h3>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" lang="ar" for="code" class="label-title">الكود</label>
                                    <?php if(!empty($codeErr))
                                        echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $codeErr . "</h2>";
                                        else ?>
                                    <input type="number" value="" class="form-control" style="color:#2e3133;" id="code" name="reg-player-code"
                                           aria-describedby="emailHelp" placeholder="أدخل الكود المكون من 7 أرقام الذي تم ارساله لك على الواتساب من خادم الفصل" dir="rtl" required>
                                </div>
                                <input class="btn label-title2" style="margin-right: 30px; padding:15px; background-image: -moz-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -webkit-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -ms-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: linear-gradient( 122deg, #af09d5 0%, #af09d5 100%); font-weight:500; font-size:30px; border-radius: 10px" value="الدخول" type="submit" name="submitbtn"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="section bg-gradient" id="contact">
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
    <small>
        <a href="#" class="m-2">HOME</a>
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
            text: '+201551198928  تقدر تتواصل معانا عن طريق الواتساب على الرقم ده ',
            icon: 'question',
            confirmButtonText: 'OK'
        });
    }
</script>

</body>
</html>
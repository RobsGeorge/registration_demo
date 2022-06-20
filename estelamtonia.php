<?php
// Start the session
//session_start();
require_once 'config.php';

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
            <a href="">
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
            <h1 class="arbaic-text-title2"> <strong>حجز ميعاد استلام التونية</strong> </h1>
        </div>
    </div>
</section>
<?php
// define variables and set to empty values








if(isset($_POST['submitbtn']))
{
    $marhala = $_POST['Marhala'];
    
    if($marhala==0)
    {   
        $estelamtime = 1;
    }
    else if($marhala==1)
    {
        $estelamtime = 2;
    }
    else if($marhala==2)
    {
        $estelamtime = 3;
    }
    else if($marhala==3)
    {
        $estelamtime = 4;
    }
    else if($marhala==4)
    {
        $estelamtime = 5;
    }

    $sql =  " UPDATE `hagztonia` SET `EstelamTime`= ".$estelamtime." WHERE `Code`= ".$_COOKIE['player-code'].";";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute();
    

    sleep(2);
    header('Location: estelamtoniafinal.php');
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
                            <h3 class="subtitle-heading2"> اختيار ميعاد لاستلام التونية </h3>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="marhala" class="label-title"> اختر المعاد المناسب لك  </label>
                                    <br />
                                    <select id="comboMarhala" name="Marhala" onchange="document.getElementById('selected-text').value=this.options[this.selectedIndex].text">
                                    <option value="0"> الأحد 8 مايو من الساعة  7:30 مساءً للساعة 9:30 مساءً</option>
                                    <option value="1"> الثلاثاء 10 مايو من الساعة 7:30 مساءً للساعة 9:30 مساءً </option>
                                    <option value="2"> الخميس 12 مايو من الساعة 7:30 مساءً للساعة 9:30 مساءً </option>
                                    <option value="3"> الجمعة 13 مايو من الساعة 1 ظهراً للساعة 3 عصراً</option>
                                    <option value="4"> الأحد 15 مايو من الساعة 7:30 مساءً للساعة 9:30 مساءً </option>
                                    </select>
                                    <input type = "hidden" name="selected-text" id="selected-text" value="" />
                                </div>
                                <div class="row" dir="ltr"> 
                                <button type="submit" name="submitbtn" class="btn label-title2" style="margin: 20px; padding:20px; background-image: -moz-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -webkit-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -ms-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: linear-gradient( 122deg, #af09d5 0%, #af09d5 100%); font-weight:500; font-size:30px;"> تسجيل </button>
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
        <a href="#contact" class="m-2" onclick="contact()">CONTACT</a>
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
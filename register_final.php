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

$pamflets = 0;
$name = $code = $phone_number =  $email = $password = $passwordVerification =  $firstname = $raqamQawmy = $address1 = $marhala = $birthdate = $eshterak  = $sana = "";
$valid_name = $valid_code = $valid_phone_number  = $valid_email = $valid_raqam_qawmy = $valid_address = $valid_bithdate = true;



if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submitbtn'])) {
    $name = test_input($_POST["reg-player-name"]);
    $phone_number = test_input($_POST["reg-player-phone-number"]);
    $email = test_input($_POST["reg-player-email"]);
    $raqamQawmy = test_input($_POST["reg-student-raqam-qawmy"]);
    $address1 = test_input($_POST["reg-player-address"]);
    $marhala = test_input($_POST['Marhala']);
    //$marhala = test_input($_POST['selected-text']);
    $birthdate = strtotime($_POST['reg-player-birthdate']);
    //$eshterak = test_input($_POST['selected-text2']);
    $eshterak = test_input($_POST['Eshterak']);

}



    $name = test_input($name);
    $code = test_input($code);
    $email = test_input($email);
    $phone_number = test_input($phone_number);
    $valid_raqam_qawmy = test_input($valid_raqam_qawmy);
    $address1 = test_input($address1);
    $birthdate = $birthdate;


    $nameErr = "";
    $codeErr = "";
    $emailErr = "";
    $phoneErr = "";
    $raqamQawmyErr = "";

//////////////////CHECk RAQAM QAWMY ///////////////////////////
if(!empty($raqamQawmy)){
    if(strlen($raqamQawmy)!=14)
    {
        $raqamQawmyErr = "من فضلك أدخل الرقم القومي المكون من 14 رقم بشكل صحيح";
    }
    else
    {
        $raqamQawmyErr = "";
    }
}

///////////////////////////////////////////////////////////////
if($birthdate)
{
    $birthdate = date('Y-m-d',$birthdate);
    $valid_birthdate = true;
}



if($marhala==0)
{
    $marhala = "حضانة";
    $sana = 0;
}
else if($marhala==1)
{
    $marhala = "حضانة";
    $sana = 1;
}
else if($marhala==2)
{
    $marhala = "حضانة";
    $sana = 2;
}
else if($marhala==3)
{
    $marhala = "ابتدائي";
    $sana = 1;
}
else if($marhala==4)
{
    $marhala = "ابتدائي";
    $sana = 2;
}
else if($marhala==5)
{
    $marhala = "ابتدائي";
    $sana = 3;
}
else if($marhala==6)
{
    $marhala = "ابتدائي";
    $sana = 4;
}
else if($marhala==7)
{
    $marhala = "ابتدائي";
    $sana = 5;
}
else if($marhala==8)
{
    $marhala = "ابتدائي";
    $sana = 6;
}
else if($marhala==9)
{
    $marhala = "اعدادي";
    $sana = 1;
}
else if($marhala==10)
{
    $marhala = "اعدادي";
    $sana = 2;
}
else if($marhala==11)
{
    $marhala = "اعدادي";
    $sana = 3;
}
else if($marhala==12)
{
    $marhala = "ثانوي";
    $sana = 1;
}
else if($marhala==13)
{
    $marhala = "ثانوي";
    $sana = 2;
}
else if($marhala==14)
{
    $marhala = "ثانوي";
    $sana = 3;
}
else if($marhala==15)
{
    $marhala = "جامعة";
    $sana = 1;
}
else if($marhala==16)
{
    $marhala = "جامعة";
    $sana = 2;
}
else if($marhala==17)
{
    $marhala = "جامعة";
    $sana = 3;
}
else if($marhala==18)
{
    $marhala = "جامعة";
    $sana = 4;
}
else if($marhala==19)
{
    $marhala = "جامعة";
    $sana = 5;
}
else if($marhala==20)
{
    $marhala = "جامعة";
    $sana = 6;
}
else if($marhala==21)
{
    $marhala = "خريج";
    $sana = 0;
}

//////////******CHECK NAME CONSISTS OF THREE NAMES AND ARABIC*/////////
if(!empty($name)) {
    $int_n = 0;
    $chk_space = true;
    $test_string_name = $name;

    while ($chk_space) {

        if (strpos($test_string_name, ' ') !== false) {
            $chk_space = true;
            $int_n = $int_n + 1;
            $test_string_name = substr($test_string_name, strpos($test_string_name, ' ') + 1);
        } else {
            $chk_space = false;
        }
    }

    if ($int_n < 2) {
        $valid_name = false;
        $nameErr = 'من فضلك قم بإدخال الاسم ثلاثي على الأقل';
    }

    if (ord(strtolower(substr($name,0,1))) - 96 != 120 and ord(strtolower(substr($name,0,1))) - 96 != 121) {
        $valid_name = false;
        $nameErr = 'من فضلك قم بإدخال الاسم باللغة العربية';
    }

    if ($int_n < 2) {
        $valid_name = false;
        $nameErr = 'من فضلك قم بإدخال الاسم ثلاثي على الأقل';
    }

    if ($int_n < 2 and ord(strtolower(substr($name,0,1))) - 96 != 120) {
        $valid_name = false;
        $nameErr = 'من فضلك قم بإدخال الاسم ثلاثي وباللغة العربية';
    }

}
/////////////////////////////////////////////////////////////


////*******CHECK PHONE NUMBER IS CORRECT********//////
if(!empty($phone_number))
{
    if(substr($phone_number,0,1)!=0)
    {
        $valid_phone_number = false;
        $phoneErr = 'من فضلك أدخل رقم الموبايل بشكل صحيح';
    }
    if(substr($phone_number,1,1)!=1)
    {
        $valid_phone_number = false;
        $phoneErr = 'من فضلك أدخل رقم الموبايل بشكل صحيح';
    }
    if(strlen($phone_number)!=11)
    {
        $valid_phone_number = false;
        $phoneErr = 'من فضلك أدخل رقم الموبايل بشكل صحيح';
    }
    if(substr($phone_number,2,1)!='0' and substr($phone_number,2,1)!='1' and substr($phone_number,2,1)!='2' and substr($phone_number,2,1)!='5'){
        $valid_phone_number = false;
        $phoneErr = 'من فضلك أدخل رقم الموبايل بشكل صحيح';
    }
    else
    {
            $valid_phone_number = true;
            $phoneErr = "";
    }

}
////////////////////////////////////////////////////////////////



$firstname = substr($name, 0, stripos($name," "));
$name = substr($name, stripos($name," ")+1);
$secondname = substr($name, 0, stripos($name," "));
$name = substr($name, stripos($name," ")+1);
$thirdname = substr($name, 0, stripos($name," "));
$name = substr($name, stripos($name," ")+1);
$fourthname = $name;
$name = substr($name, stripos($name," ")+1);


/*echo $firstname; 
echo "<br>";
echo $secondname;
echo "<br>";
echo $thirdname;
echo "<br>";
echo $fourthname;
echo "<br>";
echo $raqamQawmy;
echo "<br>";
echo $phone_number;
echo "<br>";
echo $marhala;
echo "<br>";
echo $sana;
echo "<br>";
echo $birthdate;
echo "<br>";
echo $eshterak;
echo "<br>";
echo $email;
echo "<br>";*/
//echo $address;

if($valid_name and $valid_phone_number and $valid_email and $valid_address and $valid_raqam_qawmy and isset($_POST['submitbtn']))
{
    $data = [
        $firstname,
        $secondname,
        $thirdname,
        $fourthname,
        $raqamQawmy,
        $phone_number,
        $marhala,
        $sana,
        $birthdate,
        $eshterak,
        $pamflets,
        $email,
        $address1,
    ];
    
    $sql = " INSERT INTO `finalstudent`(`firstName`, `secondName`, `thirdName`, `fourthName`, `nationalID`, `mobileNumber`, `marhala`, `sana`, `DOB`, `paidEshterak`, `estalamPamflets`, `email`, `addresss`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    sleep(2);
    header('Location: welcomepage.php');
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
                                    <label dir="rtl" for="name" class="label-title"> الإسم  </label>
                                    <?php if(!empty($nameErr))
                                    echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $nameErr . "</h2>";?>
                                    <input type="text" value="<?php if($valid_name){echo $name;} else {echo '';}?>" class="form-control" style="color:#2e3133;" id="name" name="reg-player-name"
                                           aria-describedby="emailHelp" placeholder="أدخل الإ سم رباعي باللغة العربية" dir="rtl" required>
                                </div>

                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="raqamQawmy" class="label-title">الرقم القومي</label>
                                    <?php if(!empty($raqamQawmyErr))
                                        echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $raqamQawmyErr . "</h2>";?>
                                    <input type="text" value="<?php if($valid_raqam_qawmy){echo $raqamQawmy ;} else {echo '';}?>" class="form-control" style="color:#2e3133;" id="raqamqawmy" name="reg-student-raqam-qawmy"
                                         placeholder="أدخل الرقم القومي الخاص بك المكون من 14 رقم" dir="rtl" required>
                                </div>
                                
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="phone" class="label-title">رقم الموبايل</label>
                                    <?php if(!empty($phoneErr))
                                        echo "<h2 class='arbaic-text-small-nav' style='color: #bd2130'>" . $phoneErr . "</h2>";?>
                                    <input type="number" value="<?php if($valid_phone_number){echo $phone_number;} else {echo '';}?>" class="form-control" style="color:#2e3133;" id="phone" name="reg-player-phone-number"
                                           name="reg-player-phone-number" placeholder="أدخل رقم الموبايل الخاص بك" dir="rtl" required>
                                </div>
                                <div class="form-group subtitle-heading2">
                                    <label for="email" class="label-title"> عنوان البريد الكتروني </label>
                                    <input type="email" value="<?php if($valid_email){echo $email;} else {echo '';}?>" class="form-control" style="color:#2e3133;" id="email" name="reg-player-email"
                                           aria-describedby="emailHelp" placeholder="أدخل عنوان البريد الإلكتروني" dir="rtl" required>
                                </div>
                                <div class="form-group subtitle-heading2" dir="ltr">
                                    <label for="birthdate" class="label-title"> تاريخ الميلاد </label>
                                    <input type="date" value="" class="form-control" style="color:#2e3133;" id="birthdate" name="reg-player-birthdate" dir="rtl" required>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="address" class="label-title"> العنوان  </label>
                                    <input type="text" value="<?php if($valid_address){echo $address1;} else {echo '';}?>" class="form-control" style="color:#2e3133;" id="address1" name="reg-player-address"
                                            placeholder="أدخل عنوان المنزل بالتفصيل" dir="rtl" required>
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="marhala" class="label-title"> المرحلة الدراسية  </label>
                                    <select id="comboMarhala" name="Marhala" onchange="document.getElementById('selected-text').value=this.options[this.selectedIndex].text">
                                    <option value="0"> Baby Class </option>
                                    <option value="1"> KG1 </option>
                                    <option value="2"> KG2 </option>
                                    <option value="3"> أولى ابتدائي </option>
                                    <option value="4"> ثانية ابتدائي </option>
                                    <option value="5"> ثالثة ابتدائي </option>
                                    <option value="6"> رابعة ابتدائي </option>
                                    <option value="7"> خامسة ابتدائي </option>
                                    <option value="8"> سادسة ابتدائي </option>
                                    <option value="9"> اولى اعدادي </option>
                                    <option value="10"> ثانية اعدادي </option>
                                    <option value="11"> ثالثة اعدادي </option>
                                    <option value="12"> أولى ثانوي </option>
                                    <option value="13"> ثانية ثانوي </option>
                                    <option value="14"> ثالثة ثانوي </option>
                                    <option value="15"> أولى جامعة </option>
                                    <option value="16"> ثانية جامعة </option>
                                    <option value="17"> ثالثة جامعة </option>
                                    <option value="18"> رابعة جامعة </option>
                                    <option value="19"> خامسة جامعة </option>
                                    <option value="20"> سادسة جامعة </option>
                                    <option value="21"> خريج </option>
                                    </select>
                                    <input type = "hidden" name="selected-text" id="selected-text" value="" />
                                </div>
                                <div class="form-group subtitle-heading2" dir="rtl">
                                    <label dir="rtl" for="marhala" class="label-title">هل قمت بدفع الاشتراك؟</label>
                                    <select id="comboEshterak" name="Eshterak" onchange="document.getElementById('selected-text2').value=this.options[this.selectedIndex].text">
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                    </select>
                                    <input type = "hidden" name="selected-text2" id="selected-text2" value="" />
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
<?php
if(!isset($_COOKIE['ebteda2y-player-code']))
{
    header('Location: ebteda2yalhanlogin.php');
    exit();
}
require_once 'config.php';


$sql = "SELECT Current_Week FROM Ebteda2y_Data ";
$res = $conn->query($sql);
$current_week = 0;
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $current_week = $row['Current_Week'];
}

$sql2 = "SELECT Lahn_ID,Lahn_Name, Video_Url, Lahn_Description FROM `Ebteda2y_Alhan_Video` ";
$alhan_video_id_array = array();
$alhan_video_name_array = array();
$alhan_video_url_array = array();
$alhan_video_description_array = array();
$res2 = $conn->query($sql2);
$i = 0;
if ($res2->rowCount() > 0) {
    while ($row2 = $res2->fetch()) {
        $alhan_video_id_array[$i] = $row2['Lahn_ID'];
        $alhan_video_name_array[$i] =  $row2['Lahn_Name'];
        $alhan_video_url_array[$i] = $row2['Video_Url'];
        $alhan_video_description_array[$i] = $row2['Lahn_Description'];
        $i = $i + 1;
    }
}
unset($res2,$res);

$sql2 = "SELECT Coptic_Dars_Name, Coptic_Dars_Video_Url, Coptic_Dars_Description FROM `Ebteda2y_Coptic_Video` ";
$coptic_video_name_array = array();
$coptic_video_url_array = array();
$coptic_video_description_array = array();
$res2 = $conn->query($sql2);
$i = 0;
if ($res2->rowCount() > 0) {
    while ($row2 = $res2->fetch()) {
        $coptic_video_name_array[$i] =  $row2['Coptic_Dars_Name'];
        $coptic_video_url_array[$i] = $row2['Coptic_Dars_Video_Url'];
        $coptic_video_description_array[$i] = $row2['Coptic_Dars_Description'];
        $i = $i + 1;
    }
}
unset($res2,$res);

$sql2 = "SELECT Taks_Dars_Name, Taks_Dars_Video_Url, Taks_Dars_Description FROM `Ebteda2y_Taks_Video` ";
$taks_video_name_array = array();
$taks_video_url_array = array();
$taks_video_description_array = array();
$res2 = $conn->query($sql2);
$i = 0;
if ($res2->rowCount() > 0) {
    while ($row2 = $res2->fetch()) {
        $taks_video_name_array[$i] =  $row2['Taks_Dars_Name'];
        $taks_video_url_array[$i] = $row2['Taks_Dars_Video_Url'];
        $taks_video_description_array[$i] = $row2['Taks_Dars_Description'];
        $i = $i + 1;
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

<br>
<h4 style="text-align: center;">Your Code is: <?php echo $_COOKIE['ebteda2y-player-code'];?></h4>
<div class="section center" style="display:flex;justify-content:center;">
    <a href="#week<?php echo $current_week?>" class="btn btn-primary3" style="font-size: x-large;color: #f5378e">
        الذهاب إلى الأسبوع الحالي: الأسبوع
        <?php echo $current_week;?>
    </a>
</div>

<!-- // end .section -->

<div class="section light-bg" >
    <?php
    $i=1;

    for($i;$i<$current_week+1;$i=$i+1)
    {
        echo '<div class="container"> 
            <div class="section-title">
                <h3 class="arbaic-text-title2" id="week'.$i.'">Week'.$i .'</h3>
            </div>
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link" data-toggle="tab" href="#alhans'.$i .'" >ألحان</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#coptics'.$i .'" >قبطي</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#takss'.$i .'" >طقس</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="alhans'.$i .'" dir="rtl">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video width="640" height="480" controls preload="none"> <source src="'.$alhan_video_url_array[$i-1].'"></video>
                        </div>
                        <div>
                            <br>
                            <h2 style="text-align: center; ">'.$alhan_video_name_array[$i-1].'</h2>
                            <p class="lead" style="text-align: center;text-justify: inter-character;">'.$alhan_video_description_array[$i-1].'</p>
                        </div>
                    </div>
                    <br>
                    <h4 style="text-align: center; color: #fd7e14; font-size: large;">قم بتسجيل اللحن ورفع التسجيل هنا:</h4>
                    <form id="upload_formLahn'.$i.'" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" enctype="multipart/form-data">
                        <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                            <div class="col-sm-4"><input type=\'file\' class="btn btn-primary2" id = "lahn'.$i.'" name="lahn'.$i.' "/></div>
                            <input type=\'button\' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitLahn'.$i.'" value="رفع تسجيل اللحن(فيديو)" style="font-family: \'Almarai\', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('.$i.','.'\'lahn\')"/>
                            <progress id="progressBarlahn'.$i.'" value="0" max="100" style="width:300px;"></progress>
                        <h3 id="statuslahn'.$i.'" dir="rtl"></h3>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="coptics'.$i .'" dir="rtl">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video width="640" height="480" controls preload="none"> <source src="'.$coptic_video_url_array[$i-1].'"></video>
                        </div>
                        <div>
                            <br>
                            <h2 style="text-align: center; ">'.$coptic_video_name_array[$i-1].'</h2>
                            <p class="lead" style="text-align: center;text-justify: inter-character;">'.$coptic_video_description_array[$i-1].'</p>
                        </div>
                    </div>
                    <br>
                    <h4 style="text-align: center; color: #fd7e14; font-size: large;" dir="rtl">قم بكتابة الحروف المطلوبة وارسال الصورة هنا:</h4>
                    <form id="upload_formCoptic'.$i.'" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" enctype="multipart/form-data">
                        <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                            <div class="col-sm-4"><input type=\'file\' class="btn btn-primary2" id = "coptic'.$i.'" name="coptic'.$i.'"/></div>
                            <input type=\'button\' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading"  name="submitCoptic'.$i.'" value="رفع صورة إجابة القبطي" style="font-family: \'Almarai\', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('.$i.','.'\'coptic\')"/>
                            <progress id="progressBarcoptic'.$i.'" value="0" max="100" style="width:300px;"></progress>
                        <h3 id="statuscoptic'.$i.'" dir="rtl"></h3>
                        </div>
                    </form>
                    <br>
                    <br>
                    <h4 style="text-align: center; color: #fd7e14; font-size: large;">قم بتسجيل صوت الحرف ورفع التسجيل هنا:</h4>
                    <form id="upload_formCopticb'.$i.'" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" enctype="multipart/form-data">
                        <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                            <div class="col-sm-4"><input type=\'file\' class="btn btn-primary2" id = "copticb'.$i.'" name="copticb'.$i.' "/></div>
                            <input type=\'button\' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitCopticb'.$i.'" value="رفع تسجيل نطق الحرف" style="font-family: \'Almarai\', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('.$i.','.'\'copticb\')"/>
                            <progress id="progressBarcopticb'.$i.'" value="0" max="100" style="width:300px;"></progress>
                        <h3 id="statuscopticb'.$i.'" dir="rtl"></h3>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="takss'.$i .'" dir="rtl">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <p style="text-align: right">إذا كانت هناك مشكلة في ظهور فيديو الطقس فقم بتحميله على جهازك ومشاهدته.</p>
                          <video width="640" height="480" controls preload="none"> <source src="'.$taks_video_url_array[$i-1].'"></video>
                        </div>
                        <div>
                            <br>
                            <h2 style="text-align: center; ">'.$taks_video_name_array[$i-1].'</h2>
                            <p class="lead" style="text-align: center;text-justify: inter-character;">'.$taks_video_description_array[$i-1].'</p>
                        </div>
                    </div>
                    <br>
                   
                    <br>
                    <h4 style="text-align: center; color: #fd7e14; font-size: large;" dir="rtl">حل سؤال الطقس في ورقة وابعت الصورة هنا:</h4>
                    <form id="upload_formTaksb'.$i.'" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" enctype="multipart/form-data">
                        <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                            <div class="col-sm-4"><input type=\'file\' class="btn btn-primary2" id = "taksb'.$i.'" name="taksb'.$i.' "/></div>
                            <input type=\'button\' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitTaksb'.$i.'" value="رفع صورة إجابة سؤال الطقس" style="font-family: \'Almarai\', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('.$i.','.'\'taksb\')"/>
                            <progress id="progressBartaksb'.$i.'" value="0" max="100" style="width:300px;"></progress>
                        <h3 id="statustaksb'.$i.'" dir="rtl"></h3>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            ';
    }
    ?>
</div>


<div class="section light-bg">
    <div class="container">
        <div class="row" dir="ltr">
            <div class="col-md-8 d-flex align-items-center">
                <ul class="list-unstyled ui-steps">
                    <li class="media my-4">
                        <div class="circle-icon mr-4">1</div>
                        <div class="media-body">
                            <h5>احفظ اللحن كويس باستخدام الفيديو</h5>
                            <h6 dir="rtl" style="color: #495057">سجل الجزء المطلوب وابعت التسجيل بتاعك!</h6>
                        </div>
                    </li>
                    <li class="media my-4">
                        <div class="circle-icon mr-4">2</div>
                        <div class="media-body">
                            <h5>اتفرج على الدرس بتاع القبطي جوا الفيديو</h5>
                            <h6 dir="rtl" style="color: #495057"> اكتب الحرف وحل الجزء المطلوب وصوره وابعت الصورة بتاعت الإجابة بتاعتك!</h6>
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-icon mr-4">3</div>
                        <div class="media-body" >
                            <h5>هانتعلم عن طقس القداس سوا من خلال الفيديو</h5>
                            <h6 dir="rtl" style="color: #495057">اتفرج على الفيديو وحل السؤال إللي في آخر الفيديو، والعب الـPuzzle وابعت الصورة بتاعت الـPuzzle بتاعك!</h6>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="images/cross.jpg" class="img-fluid hymn-image">
            </div>
        </div>
    </div>
</div>
<!-- // end .section -->









<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <h2 class="arbaic-text-title2">مهرجان الألحان 2020</h2>
            <p class="tagline">مهرجان الألحان واللغة القبطية والطقوس الكنسية | مدرسة القديس أثناسيوس الرسولي للشمامسة | صيف 2020 </p>
            <div class="my-4">
                <a href="#week1" class="btn btn-light arbaic-text-small-nav">Week 1</a>
                <a href="#week2" class="btn btn-light arbaic-text-small-nav">Week 2</a>
                <a href="#week3" class="btn btn-light arbaic-text-small-nav">Week 3</a>
                <a href="#" class="btn btn-primary3 mokmek-heading-text-color arbaic-text-small-nav">قواعد المهرجان</a>
            </div>
        </div>
    </div>
</div>

<div class="light-bg py-5" id="contact">
    <div class="container">
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


<script>

    function _(el){
        return document.getElementById(el);
    }
    var x;var y="";

    function uploadFile(i,typ){
        x=i;y=typ;
        var file = _(y.concat(x)).files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append(y.concat(x), file);
        formdata.append("weekNumber",x);
        formdata.append("type",y);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        if(y=="lahn"){
            ajax.open("POST", "hymn_upload_parser.php");
        }
        else if(y=="coptic"){
            ajax.open("POST", "coptic_upload_parser.php");
        }
        else if(y=="taks"){
            ajax.open("POST", "taks_upload_parser.php");
        }
        else if(y=="copticb")
        {
            ajax.open("POST", "coptic_upload_parser.php");
        }
        else if(y=="taksb")
        {
            ajax.open("POST", "taks_upload_parser.php");
        }
        ajax.send(formdata);
    }

    function progressHandler(event){
        //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        if(y=="lahn"){
            _(("progressBar".concat(y)).concat(x)).value = Math.round(percent);
            _(("status".concat(y)).concat(x)).innerHTML = Math.round(percent) + "% uploaded";
        }
        else if(y=="coptic"){
            _(("progressBar".concat(y)).concat(x)).value = Math.round(percent);
            _(("status".concat(y)).concat(x)).innerHTML = Math.round(percent) + "% uploaded";
        }
        else if(y=="taks"){
            _(("progressBar".concat(y)).concat(x)).value = Math.round(percent);
            _(("status".concat(y)).concat(x)).innerHTML = Math.round(percent) + "% uploaded";
        }
        else if(y=="copticb")
        {
            _(("progressBarcopticb").concat(x)).value = Math.round(percent);
            _(("statuscopticb").concat(x)).innerHTML = Math.round(percent) + "% uploaded";
        }
        else if(y=="taksb")
        {
            _(("progressBartaksb").concat(x)).value = Math.round(percent);
            _(("statustaksb").concat(x)).innerHTML = Math.round(percent) + "% uploaded";
        }

    }
    function completeHandler(event){
        if(y=="lahn"){
            _(("status".concat(y)).concat(x)).innerHTML = event.target.responseText;
            _(("progressBar".concat(y)).concat(x)).value = 0;
        }
        else if(y=="coptic"){
            _(("status".concat(y)).concat(x)).innerHTML = event.target.responseText;
            _(("progressBar".concat(y)).concat(x)).value = 0;
        }
        else if(y=="taks"){
            _(("status".concat(y)).concat(x)).innerHTML = event.target.responseText;
            _(("progressBar".concat(y)).concat(x)).value = 0;
        }
        else if(y=="copticb")
        {
            _(("statuscopticb").concat(x)).innerHTML = event.target.responseText;
            _(("progressBarcopticb").concat(x)).value = 0;
        }
        else if(y=="taksb")
        {
            _(("statustaksb").concat(x)).innerHTML = event.target.responseText;
            _(("progressBartaksb").concat(x)).value = 0;
        }

    }

    function errorHandler(event){
        if(y=="lahn"||y=="coptic"||y=="taks"){
            _(("status".concat(y)).concat(x)).innerHTML = "Upload Failed";
        }
        else if(y=="copticb"){
            _(("statuscopticb").concat(x)).innerHTML = "Upload Failed";
        }
        else if(y=="taksb"){
            _(("statustaksb").concat(x)).innerHTML = "Upload Failed";
        }
    }

    function abortHandler(event) {
        if (y == "lahn" || y == "coptic" || y == "taks") {
            _(("status".concat(y)).concat(x)).innerHTML = "Upload Aborted";
        }
        else if(y=="copticb"){
            _(("statuscopticb").concat(x)).innerHTML = "Upload Aborted";
        }
        else if(y=="taksb"){
            _(("statustaksb").concat(x)).innerHTML = "Upload Aborted";
        }
    }

</script>
</body>
</html>

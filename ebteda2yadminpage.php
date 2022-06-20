<?php
require_once 'config.php';


$sql = "SELECT Current_Week FROM Ebteda2y_Data ";
$res = $conn->query($sql);
$current_week = 0;
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $current_week = $row['Current_Week'];
}
?>

<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>صفحة خادم ابتدائي - مهرجان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
        <h1 class="arbaic-text-heading"> <strong>صفحة خدام مهرجان الألحان</strong> </h1>
        <h1 class="arbaic-text-small-nav2">مرحلة ابتدائي</h1>
    </div>
</header>

<div class="section center" style="display:flex;justify-content:center;">
    <h2 class="arbaic-text-small-nav" dir="rtl">الأسبوع الحالي: <?php echo $current_week; ?></h2>
</div>

<!-- // end .section -->

<div class="section light-bg" >
    <div class="container">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" data-toggle="tab" href="#alhanx" >ألحان</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#copticx" >قبطي</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#taksx" >طقس</a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="alhanx" dir="rtl">
                <h4 style="text-align: center; color: #fd7e14; font-size: large;">ارفع فيديو اللحن الخاص بالأسبوع من هنا:</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="general-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">رقم الأسبوع</label>
                                        <input type="number" class="form-control" style="color:#2e3133;" id="week-number-lahn" name="week-number-lahn"
                                               placeholder="أدخل رقم الأسبوع المراد اختياره لرفع الفيديو" dir="rtl" required>
                                    </div>
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">اسم اللحن (عنوان الفيديو)</label>
                                        <input type="text" class="form-control" style="color:#2e3133;" id="lahn-title" name="lahn-title"
                                               placeholder="أدخل اسم اللحن أو عنوان الفيديو" dir="rtl">
                                    </div>
                                    <div class="form-group subtitle-heading2 mb-4 pink-textarea active-pink-textarea-2">
                                        <label dir="rtl" lang="ar" class="label-title">شرح اللحن (الكلام اللي بيكون مكتوب تحت العنوان جمب فيديو اللحن)</label>
                                        <textarea placeholder="أدخل وصف اللحن أو شرح اللحن أو أي معلومات تحب أن تضيفها عن الفيديو" lang="ar" dir="rtl" id="lahn-description" name="lahn-description" class="md-textarea form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="upload_formLahn" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                        <div class="col-sm-4"><input type='file' class="btn btn-primary2" id = "lahn" name="lahn"/></div>
                        <input type='button' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitLahn" value="رفع فيديو اللحن" style="font-family: 'Almarai', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('lahn')"/>
                    </div>
                    <div class="rounded progress-bar progress-bar-success progress-bar-striped" role="progrssbar" id="progressBarlahn" value="0" max="100">
                    </div>
                    <h3 id="statuslahn" style="text-align:center;" dir="rtl"></h3>
                </form>
            </div>

            <div class="tab-pane fade" id="copticx" dir="rtl">
                <h4 style="text-align: center; color: #fd7e14; font-size: large;">ارفع فيديو القبطي الخاص بالأسبوع من هنا:</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="general-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">رقم الأسبوع</label>
                                        <input type="number" class="form-control" style="color:#2e3133;" id="week-number-coptic" name="week-number-coptic"
                                               placeholder="أدخل رقم الأسبوع المراد اختياره لرفع الفيديو" dir="rtl" required>
                                    </div>
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">اسم درس القبطي (عنوان الفيديو)</label>
                                        <input type="text" class="form-control" style="color:#2e3133;" id="coptic-title" name="coptic-title"
                                               placeholder="أدخل اسم درس القبطي أو عنوان الفيديو" dir="rtl">
                                    </div>
                                    <div class="form-group subtitle-heading2 mb-4 pink-textarea active-pink-textarea-2">
                                        <label dir="rtl" lang="ar" class="label-title">شرح الدرس (الكلام اللي بيكون مكتوب تحت العنوان جمب فيديو اللحن)</label>
                                        <textarea placeholder="أدخل وصف اللحن أو شرح اللحن أو أي معلومات تحب أن تضيفها عن الفيديو" lang="ar" dir="rtl" id="coptic-description" name="coptic-description" class="md-textarea form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="upload_formcoptic" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                        <div class="col-sm-4"><input type='file' class="btn btn-primary2" id = "coptic" name="coptic"/></div>
                        <input type='button' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitCoptic" value="رفع فيديو القبطي" style="font-family: 'Almarai', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('coptic')"/>

                    </div>
                    <div class="rounded progress-bar progress-bar-success progress-bar-striped" role="progrssbar"  id="progressBarcoptic" value="0" max="100"></div>
                    <h3 id="statuscoptic" style="text-align:center;" dir="rtl"></h3>
                </form>
            </div>

            <div class="tab-pane fade" id="taksx" dir="rtl">
                <h4 style="text-align: center; color: #fd7e14; font-size: large;">ارفع فيديو الطقس الخاص بالأسبوع من هنا:</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="general-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">رقم الأسبوع</label>
                                        <input type="number" class="form-control" style="color:#2e3133;" id="week-number-taks" name="week-number-taks"
                                               placeholder="أدخل رقم الأسبوع المراد اختياره لرفع الفيديو" dir="rtl" required>
                                    </div>
                                    <div class="form-group subtitle-heading2" dir="rtl">
                                        <label dir="rtl" lang="ar" class="label-title">اسم درس الطقس (عنوان الفيديو)</label>
                                        <input type="text" class="form-control" style="color:#2e3133;" id="taks-title" name="taks-title"
                                               placeholder="أدخل اسم درس الطقس أو عنوان الفيديو" dir="rtl">
                                    </div>
                                    <div class="form-group subtitle-heading2 mb-4 pink-textarea active-pink-textarea-2">
                                        <label dir="rtl" lang="ar" class="label-title">شرح الدرس (الكلام اللي بيكون مكتوب تحت العنوان جمب فيديو اللحن)</label>
                                        <textarea placeholder="أدخل وصف اللحن أو شرح اللحن أو أي معلومات تحب أن تضيفها عن الفيديو" lang="ar" dir="rtl" id="taks-description" name="taks-description" class="md-textarea form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="upload_formTaks" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="display:flex;justify-content:center;align-items:center;" dir="ltr">
                        <div class="col-sm-4"><input type='file' class="btn btn-primary2" id = "taks" name="taks"/></div>
                        <input type='button' class="col-sm-3 btn btn-primary3 arbaic-text-small-heading" dir="rtl"  name="submitTaks" value="رفع فيديو الطقس" style="font-family: 'Almarai', sans-serif;font-size: medium; min-width: 100%" onclick="uploadFile('taks')"/>
                    </div>
                    <div class="rounded progress-bar progress-bar-success progress-bar-striped" role="progrssbar" id="progressBartaks" value="0" max="100"></div>
                    <h3 id="statustaks" style="text-align:center;" dir="rtl"></h3>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <h2 class="arbaic-text-title2">مهرجان الألحان 2020</h2>
            <p class="tagline">مهرجان الألحان واللغة القبطية والطقوس الكنسية | مدرسة القديس أثناسيوس الرسولي للشمامسة | صيف 2020 </p>
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

    function uploadFile(typ){
        x='';y=typ;
        if(_("week-number-".concat(y)).value==""
            || _(y.concat("-title")).value == ""
            || _(y.concat("-description")).value =="")
        {
            alert('من فضلك إملأ كل البيانات قبل رفع الفيديو');
            return;

        }
        //alert(y);
        var file = _(y).files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append(y, file);
        formdata.append("weekNumber",_("week-number-".concat(y)).value);
        //alert(_("week-number-".concat(y)).value);
        formdata.append("typ",y);
        formdata.append("fileName",_(y.concat("-title")).value);
        formdata.append("fileDescription",_(y.concat("-description")).value)
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "ebteda2y_admin_upload_parser.php");
        ajax.send(formdata);
    }

    function progressHandler(event){
        //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar".concat(y)).value = Math.round(percent);
        _("progressBar".concat(y)).style.width = Math.round(percent).toString().concat("%");
        _("progressBar".concat(y)).innerHTML = Math.round(percent) + "% uploaded";

    }
    function completeHandler(event){
        _("status".concat(y)).innerHTML = event.target.responseText;
        _("progressBar".concat(y)).value = 0;
    }

    function errorHandler(event){
        _("status".concat(y)).innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _("status".concat(y)).innerHTML = "Upload Aborted";
    }

</script>
</body>
</html>
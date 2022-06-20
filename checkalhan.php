<?php
require_once 'config.php';


if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

/*$sql07 = "SELECT  `Marhala` FROM `player` WHERE `Code`=".$_COOKIE['player-code'];
$res07 = $conn->query($sql07);
if($row07 = $res07->fetch())
{
    $mar = $row07['Marhala'];
    if($mar=='اعدادي')
    {
        header('Location: alhane3dady.php');
        exit();
    }
}

$sql = "SELECT Full_Name, Image, Marhala FROM player WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);
$playerMarhala = $playerFullName = $playerImage = "";
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $playerFullName = $row['Full_Name'];
    $playerImage = $row['Image'];
    $playerMarhala = $row['Marhala'];
}

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
    <title>الألحان - امتحانات الشمامسة 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#alhan">الألحان</a> </li>
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#coptic">القبطي</a> </li>
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#taks">الطقس</a> </li>
                                <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#agbia">الأجبية</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#faq">FAQs</a> </li>
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
        <h1 class="arbaic-text-title"> <strong>الألحان</strong> </h1>
        <p class="tagline" style="padding-bottom: 20px;">نتناول هذا العام حفظ الكثير من الألحان الجميلة الخاصة بصوم وأعياد الآباء الرسل بالإضافة إلى ألحان صوم وأعياد السيدة العذراء مريم، وأيضاً الألحان الكنسية التي تُصَلى في حضور الآباء البطاركة والأساقفة.</p>
    </div>
</header>



<!-- // end .section -->

<div class="section light-bg">
    <div class="section light-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <!--<img src="images/bob.png" alt="perspective phone" class="img-fluid">-->
                                <div class="media-body">
                                    <h4 class="card-new">ألحان الرسل</h4>
                                    <p class="card-text"><strong> الألحان التي تُصَلَّى في صوم وأعياد الآباء الرسل القديسين.</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <!--<span class="ti-settings gradient-fill ti-3x mr-3"></span>-->
                                <div class="media-body">
                                    <h4 class="card-new">ألحان العذراء</h4>
                                    <p class="card-text"><strong>الألحان التي تُصَلَّى في صوم وأعياد السيدة العذراء مريم.</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <!--<span class="ti-lock gradient-fill ti-3x mr-3"></span>-->
                                <div class="media-body">
                                    <h4 class="card-new">ألحان البطريرك والأساقفة</h4>
                                    <p class="card-text"><strong>الألحان التي تُصَلَّى في حضور الآباء البطاركة والمطارنة والأساقفة.</strong></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>


    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px">
        <h3  style=" align-self: center; color: #f5378e; text-align: center">Week 1</h3>
        <h4 style="align-self: center; text-align: center" class="arbaic-text-small-nav">آخر ميعاد لتسليم ألحان الأسبوع الأول: يوم الاثنين 13 يوليو الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan.php" class="btn btn-primary arbaic-text-small-nav" style="align-self:center;max-width: 50%">الذهاب لتسجيل الألحان</a>
    </div>

    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px; margin-top: 40px;">
        <h3  style=" align-self: center; color: #bd2130; text-align: center">Week 2</h3>
        <h4 style="align-self: center;;color: #f5378e; text-align: center" class="arbaic-text-small-nav" >آخر ميعاد لتسليم ألحان الأسبوع الثاني: يوم الاثنين 20 يوليو الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan2.php" class="btn btn-primary2 arbaic-text-small-nav" style="align-self:center;max-width: 50%; color: #FFFFFF">الذهاب لتسجيل الألحان</a>
    </div>

    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px; margin-top: 40px;">
        <h3  style=" align-self: center; color: #fd7e14; text-align: center">Week 3</h3>
        <h4 style="align-self: center;;color: #f5378e; text-align: center" class="arbaic-text-small-nav" >آخر ميعاد لتسليم ألحان الأسبوع الثالث: يوم الاثنين 27 يوليو الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan3.php" class="btn btn-primary arbaic-text-small-nav" style="align-self:center;max-width: 50%">الذهاب لتسجيل الألحان</a>
    </div>

    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px; margin-top: 40px;">
        <h3  style=" align-self: center; color: #bd2130; text-align: center">Week 4</h3>
        <h4 style="align-self: center;;color: #f5378e; text-align: center" class="arbaic-text-small-nav" >آخر ميعاد لتسليم ألحان الأسبوع الرابع: يوم الاثنين 10 أغسطس الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan4.php" class="btn btn-primary2 arbaic-text-small-nav" style="align-self:center;max-width: 50%; color: #FFFFFF">الذهاب لتسجيل الألحان</a>
    </div>

    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px; margin-top: 40px;">
        <h3  style=" align-self: center; color: #bd2130; text-align: center">Week 5</h3>
        <h4 style="align-self: center;;color: #f5378e; text-align: center" class="arbaic-text-small-nav" >آخر ميعاد لتسليم ألحان الأسبوع الخامس: يوم الجمعة 21 أغسطس الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan5.php" class="btn btn-primary2 arbaic-text-small-nav" style="align-self:center;max-width: 50%; color: #FFFFFF">الذهاب لتسجيل الألحان</a>
    </div>

    <div class="bg-new-gradient flex-column center d-flex" style="padding: 20px; margin-top: 40px;">
        <h3  style=" align-self: center; color: #FFFFFF; text-align: center">Week 6</h3>
        <h4 style="align-self: center;;color: #fd7e14; text-align: center" class="arbaic-text-small-nav" >آخر ميعاد لتسليم ألحان الأسبوع السادس: يوم الجمعة 4 سبتمبر الساعة 12 ليلاً</h4>
        <a href="tasgeelalhan6.php" class="btn btn-primary2 arbaic-text-small-nav" style="align-self:center;max-width: 50%; color: #FFFFFF">الذهاب لتسجيل الألحان</a>
    </div>



    <div class="section">
    <div class="container d-flex center flex-column">
        <p style="align-self: center; font-size: larger; font-family: 'El Messiri', sans-serif; color: #f5378e">اختر المستوى الذي تريد عرضه</p>

    </div>
    <div class="container">
        <div class="row">
                <div class="col-md-4 col-6" style="align-items: center">
                    <a href="#z" style="font-size: 80px;font-family: myCopticFont; color: #FFFFFF" class=" btn btn-primary2">Z</a>
                </div>
                <div class="col-md-4 col-6">
                    <a href="#x" style="font-size: 80px; font-family: myCopticFont;" class=" btn btn-primary">&</a>
                </div>
        </div>
    </div>
</div>



<div class="section bg-new-gradient" id="z">
    <div class="container">
        <div class="row" dir="ltr">
            <div class="col-sm-2 col-lg">
                <img src="images/tawwaf_rosol_img.jpg" alt="dual phone" class="hymn-image">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                    <br>
                    <div class="row" dir="rtl">
                        <div style="margin: 10px">

                        </div>
                        <h3 class="arbaic-text-title" style="font-size: 200%; text-align: right">طواف مزامير صوم وأعياد الرسل</h3>
                    </div>
                    <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right">الطواف الذي يُصَلى بعد مزمور عشية وباكر في رفع بخور عشية ورفع بخور باكر صوم الآباء الرسل وأعيادهم.</p>
                    <a href="maps/tawwaf_rosol.JPG" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                    <audio id="audioA" src="hymns_audio/tawaf-rosol-zaher.mp3" onplay="onPlayer('btnPlayA','btnPauseA')" onpause="onPauser('btnPlayA','btnPauseA')"></audio>
                    <a href="hymns_audio/tawaf-rosol-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                    <button id="btnPlayA" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioA')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                    <button id="btnPauseA"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioA')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="section bg-gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/3adra1.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center" dir="ltr">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 200%; text-align: right;color: #FFFFFF; margin-right: 25px">طواف مزامير صوم العذراء وأعيادها</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right;color: #000000">الطواف الذي يُصَلى بعد مزمور عشية وباكر في رفع بخور عشية ورفع بخور باكر صوم السيدة العذراء وأعيادها.</p>
                        <a href="maps/tawwaf_3adra.JPG" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioB" src="hymns_audio/tawaf3adra-ibrahim.wav" onplay="onPlayer('btnPlayB','btnPauseB')" onpause="onPauser('btnPlayB','btnPauseB')"></audio>
                        <a href="hymns_audio/tawaf3adra-ibrahim.wav" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayB" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioB')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseB"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioB')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/acwmen_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center" dir="ltr">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <h2 class="coptic-font-h2" dir="ltr" style="text-align: right">Acwmen</h2>
                        <p class="mb-4 arbaic-text-small-nav" style="text-align: right">لحن يُصلى بعد المزمور المائة والخمسين وقت توزيع الأسرار المقدسة على الشعب في توزيع قداس عيد العنصرة وقداسات صوم الآباء الرسل.</p>
                        <a href="maps/Acwmen.pdf" target="_blank"  class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioC" src="hymns_audio/acwmen-ibrahim.wav" onplay="onPlayer('btnPlayC','btnPauseC')" onpause="onPauser('btnPlayC','btnPauseC')"></audio>
                        <a href="hymns_audio/acwmen-ibrahim.wav" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayC" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioC')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseC" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioC')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-new-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/aghapy_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h2 class="coptic-font-h2" dir="ltr" style="text-align: right"># ajap3</h2>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #633991; text-align: right" dir="rtl" >لحن يُصَلى بعد قراءة البولس قبطياً وقت حضور الآباء (البابا أو المطران أو الأسقف) في الكنيسة.</p>
                        <a href="maps/I aghapy.JPG" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioD" src="hymns_audio/i-aghapy-gad.mp3" onplay="onPlayer('btnPlayD','btnPauseD')" onpause="onPauser('btnPlayD','btnPauseD')"></audio>
                        <a href="hymns_audio/i-aghapy-gad.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayD" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioD')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseD"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioD')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/kalwc_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #17a2b8">لحن</h3><h2 class="coptic-font-h2" style="color: #FFFFFF">Kalwc</h2><h3 class="arbaic-text-title" style="font-size: 35px; color: #17a2b8">الصغير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #f1b0b7; text-align: right" dir="rtl" >لحن يُصَلَّى في استقبال البابا البطريرك عند عودته من السفر.</p>
                        <a href="maps/Kalwc.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioE" src="hymns_audio/kalwc-small.mp3" onplay="onPlayer('btnPlayE','btnPauseE')" onpause="onPauser('btnPlayE','btnPauseE')"></audio>
                        <a href="hymns_audio/kalwc-small.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayE" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioE')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseE"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioE')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-new-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/Icpateer_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #f5378e">مرد</h3><h2 class="coptic-font-h2" style="color: #FFFFFF">Ic Pat3r</h2><h3 class="arbaic-text-title" style="font-size: 35px;color: #f5378e">الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #ffc107; text-align: right" dir="rtl" >المرد الذي يُصليه الشماس في رشومات الحمل قبل صلاة الشكر في القداس الإلهي. يُصَلى عند حضور الآباء (البابا أو المطران أو الأسقف)  في الكنيسة.</p>
                        <a href="maps/Icpateer.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioF" src="hymns_audio/Ispateer-big-sadek.mp3" onplay="onPlayer('btnPlayF','btnPauseF')" onpause="onPauser('btnPlayF','btnPauseF')"></audio>
                        <a href="hymns_audio/Icpateer-Great-our5oras.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن (خورس)</a>
                        <a href="hymns_audio/Ispateer-big-sadek.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن (فردي)</a>
                        <button id="btnPlayF" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioF')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseF"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioF')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/shere_epraxis_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center" dir="ltr">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 200%; text-align: right; margin-right: 25px">مرد الإبركسيس الكبير + الختام الطويل</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right; color: #f5378e">يُصلى قبل الإبركسيس قبطياً في القداس الإلهي. جرت العادة أن يُصلى في قداسات الأعياد السديدية والطقس الفرايحي وقداسات أعياد السيدة العذراء.</p>
                        <a href="maps/shere.jpg" target="_blank" class="btn btn-primary arbaic-text-small-nav">الخريطة</a>
                        <audio id="audioG" src="hymns_audio/shere-great-zaher.mp3" onplay="onPlayer('btnPlayG','btnPauseG')" onpause="onPauser('btnPlayG','btnPauseG')"></audio>
                        <a href="hymns_audio/shere-great-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayG" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioG')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseG"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioG')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-new-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/shere_theotoke_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px">لحن</h3><h2 class="coptic-font-h2">Xere )eotoke</h2><h3 class="arbaic-text-title" style="font-size: 35px">الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" style="color: #007bff; text-align: right;" dir="rtl">هو اللحن الذي يُصلََى في بداية طقس التمجيد للسيدة العذراء مريم بعد قطعة "إكسمارؤوت"</p>
                        <a href="maps/shere_theotoke1.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">النص+الخريطة</a>
                        <audio id="audioH" src="hymns_audio/shere-theotoke-big-zaher.mp3" onplay="onPlayer('btnPlayH','btnPauseH')" onpause="onPauser('btnPlayH','btnPauseH')"></audio>
                        <a href="hymns_audio/shere-theotoke-big-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayH" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioH')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseH"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioH')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container d-flex" style="margin-bottom: 25px;margin-top: 50px; text-decoration: underline; ">
        <a href="choosealhanlevel.php">هل قمت باختيار المستوى المناسب لك؟ الذهاب لصفحة اختيار المستوى</a>
    </div>

    <div class="section">
        <div class="container d-flex center flex-column">
            <p style="align-self: center; font-size: larger; font-family: 'El Messiri', sans-serif; color: #f5378e">اختر المستوى الذي تريد عرضه</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6" style="align-items: center">
                    <a href="#z" style="font-size: 80px;font-family: myCopticFont; color: #FFFFFF" class=" btn btn-primary2">Z</a>
                </div>
                <div class="col-md-4 col-6">
                    <a href="#x" style="font-size: 80px; font-family: myCopticFont;" class=" btn btn-primary">&</a>
                </div>
            </div>
        </div>
    </div>



    <div class="section bg-new-gradient" id="x">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/aripresvevin_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h2 class="coptic-font-h2"> Ariprecbevin </h2><h3 class="arbaic-text-title" style="font-size: 35px">التمجيد الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right">يُصَلى في طقس التمجيد للسيدة العذراء مريم، وتمجيد الملائكة والرسل والشهداء والقديسين.</p>
                        <a href="maps/ariprecvevin.JPG" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioI" src="hymns_audio/aripresvevin-big-zaher.mp3" onplay="onPlayer('btnPlayI','btnPauseI')" onpause="onPauser('btnPlayI','btnPauseI')"></audio>
                        <a href="hymns_audio/aripresvevin-big-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayI" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioI')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseI"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioI')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section bg-gradient" >
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/tawzee3_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #FFFFFF">أللي التوزيع السنوي + أللي </h3><h2 class="coptic-font-h2" style="color: #17a2b8">Piwov fa </h2><h3 class="arbaic-text-title" style="font-size: 35px; color: #FFFFFF">الختام الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right; color: #ffc107">ألليلويا التوزيع السنوي وهي مقدمة المزمور المائة والخمسين الذي يُصلى في توزيع الأسرار المقدسة على الشعب في قداسات الطقس السنوي.</p>
                        <a href="maps/tawzee3_sanawy.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioJ" src="hymns_audio/ally-piwofa-ibrahim.mp3" onplay="onPlayer('btnPlayJ','btnPauseJ')" onpause="onPauser('btnPlayJ','btnPauseJ')"></audio>
                        <a href="hymns_audio/ally-piwofa-ibrahim.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayJ" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioJ')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseJ"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioJ')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/aghapy_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h2 class="coptic-font-h2" dir="ltr" style="text-align: right"># ajap3</h2>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #633991; text-align: right" dir="rtl" >لحن يُصَلى بعد قراءة البولس قبطياً وقت حضور الآباء (البابا أو المطران أو الأسقف) في الكنيسة.</p>
                        <a href="maps/I aghapy.JPG" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioK" src="hymns_audio/i-aghapy-gad.mp3" onplay="onPlayer('btnPlayK','btnPauseK')" onpause="onPauser('btnPlayK','btnPauseK')"></audio>
                        <a href="hymns_audio/i-aghapy-gad.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayK" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioK')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseK"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioK')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/kalwc_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #17a2b8">لحن</h3><h2 class="coptic-font-h2" style="color: #FFFFFF">Kalwc</h2><h3 class="arbaic-text-title" style="font-size: 35px; color: #17a2b8">الصغير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #f1b0b7; text-align: right" dir="rtl" >لحن يُصَلَّى في استقبال البابا البطريرك عند عودته من السفر.</p>
                        <a href="maps/Kalwc.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioL" src="hymns_audio/kalwc-small.mp3" onplay="onPlayer('btnPlayL','btnPauseL')" onpause="onPauser('btnPlayL','btnPauseL')"></audio>
                        <a href="hymns_audio/kalwc-small.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayL" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioL')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseL"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioL')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-new-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/Icpateer_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #f5378e">مرد</h3><h2 class="coptic-font-h2" style="color: #FFFFFF">Ic Pat3r</h2><h3 class="arbaic-text-title" style="font-size: 35px;color: #f5378e">الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav" style="color: #ffc107; text-align: right" dir="rtl" >المرد الذي يُصليه الشماس في رشومات الحمل قبل صلاة الشكر في القداس الإلهي. يُصَلى عند حضور الآباء (البابا أو المطران أو الأسقف)  في الكنيسة.</p>
                        <a href="maps/Icpateer.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioM" src="hymns_audio/Ispateer-big-sadek.mp3" onplay="onPlayer('btnPlayM','btnPauseM')" onpause="onPauser('btnPlayM','btnPauseM')"></audio>
                        <a href="hymns_audio/Icpateer-Great-our5oras.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن (خورس)</a>
                        <a href="hymns_audio/Ispateer-big-sadek.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن (فردي)</a>
                        <button id="btnPlayM" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioM')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseM"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioM')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section bg-gradient" >
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/shere_theotoke_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h3 class="arbaic-text-title" style="font-size: 35px; color: #007bff">لحن</h3><h2 class="coptic-font-h2" style="color: #ffc107">Xere )eotoke</h2><h3 class="arbaic-text-title" style="font-size: 35px;  color: #007bff">الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right">هو اللحن الذي يُصلََى في بداية طقس التمجيد للسيدة العذراء مريم بعد قطعة "إكسمارؤوت"</p>
                        <a href="maps/shere_theotoke1.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">النص+الخريطة</a>
                        <audio id="audioN" src="hymns_audio/shere-theotoke-big-zaher.mp3" onplay="onPlayer('btnPlayN','btnPauseN')" onpause="onPauser('btnPlayN','btnPauseN')"></audio>
                        <a href="hymns_audio/shere-theotoke-big-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayN" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioN')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseN"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioN')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section bg-light" >
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/apekran_img.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                            <h2 class="coptic-font-h2">Apekran</h2>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl" style="text-align: right; color: #633991">يُصَلى في تمجيد الآباء البطركة والقديسين، يُصَلّى بعد السنكسار أو في التوزيع في قداسات أعياد سائر القديسين.</p>
                        <a href="maps/apekran.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">نص اللحن</a>
                        <audio id="audioP" src="hymns_audio/apekran-zaher.mp3" onplay="onPlayer('btnPlayP','btnPauseP')" onpause="onPauser('btnPlayP','btnPauseP')"></audio>
                        <a href="hymns_audio/apekran-zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlayP" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audioP')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPauseP"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audioP')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex" style="margin-bottom: 25px; text-decoration: underline">
        <a href="choosealhanlevel.php">هل قمت باختيار المستوى المناسب لك؟ الذهاب لصفحة اختيار المستوى</a>
    </div>

<div class="section bg-gradient  py-5">
    <div class="container">
        <h4 class="center" style="color: #FFFFFF">Robeir Samir George</h4>
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
    <p class="mb-3"><small>DEVELOPED BY: ROBS</a></small></p>

    <small>
        <a href="index.php" class="m-2">HOME</a>
        <a href="#" class="m-2">ABOUT</a>
        <a href="" class="m-2" onclick="contact()">CONTACT</a>
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
        function contact() {
            Swal.fire({
                title: 'Contact Us',
                text: 'لو عندك أي مشكلة في التعامل مع الموقع أو أي صعوبة في فهم أي حاجة في المهرجان ياريت تتواصل مع أي حد من خدام المهرجان ومنهم مستر روبير سمير هتلاقي رقم تليفونه والemail بتاعه في الشريط اللي فوق ده!',
                icon: 'question',
                confirmButtonText: 'OK'
            });
        }
    </script>


</body>
</html>

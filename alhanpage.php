<?php
session_start();
require_once 'config.php';
?>

<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>الألحان - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                    <a class="navbar-brand" href="index.php"><img src="images/emtahan2.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="#">الألحان</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="copticpage.php">القبطي</a></li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="takspage.php">الطقس</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="mokmekpage.html">MOKMEK</a> </li>
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="rankingpage.php">الترتيب</a> </li>
                            <li class="nav-item arbaic-text-small-nav">
                                <?php
                                $sql = "SELECT Full_Name FROM player WHERE Code=".$_COOKIE['player-code'];
                                $res = $conn->query($sql);
                                $res->rowCount(); ////CODE FOUND IN DATABASE/////
                                $row = $res->fetch();
                                $playerFullName = $row['Full_Name'];
                                $userFirstnameX = substr($playerFullName,0,stripos($playerFullName," "));
                                echo '<a href="userpage.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3 arbaic-text-small-nav">'. $userFirstnameX .'</a></li>';
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
        <p class="tagline">نتناول هذا العام حفظ الكثير من الألحان الجميلة الخاصة بصوم وأعياد الآباء الرسل بالإضافة إلى ألحان صوم وأعياد السيدة العذراء مريم، وأيضاً الألحان الكنسية التي تُصَلى في حضور الآباء البطاركة والأساقفة.</p>
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


<!--<div class="section" id="coptic">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <h3>Coptic</h3>
                <p class="mb-lg-2">كلامك تير عن القبطي، كلام كنتير عن القبطي، وشؤح منهج القبطي، كلام كتير عن القبطي، كلام كتير عن القبطي، كلام كتير عن القبطي، كلام كتير عن القبطي. هانقول كلام كتير عن القبطي. </p>
                <a href="#" class="btn btn-primary">GO COPTIC</a>
            </div>
        </div>
        <div>
            <img src="images/gamma.png" alt="perspective phone" class="img-fluid">
        </div>
    </div>

</div>
&lt;!&ndash; // end .section &ndash;&gt;-->


    <div class="section light-bg" id="taks">
        <div class="container">
            <div class="section-title">
                <strong>تراث كنسي</strong>
                <h3 class="arbaic-text-title2">معلومات جميلة عن الألحان</h3>
            </div>

            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#rosol">صوم وأعياد الرسل</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#3adra">صوم وأعياد العذراء</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#baba">حضور البطريرك والأساقفة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#3amma">طقوس عامة</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="rosol">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>طقس صوم وأعياد الآباء الرسل</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بأعياد وصوم الآباء الرسل القديسين.</p>
                            <p>من أين جاءت مثل هذه الجواهر التي لمديح الله؟ اُنظروا إنسانًا من الخارج كان فقيرًا (أيوب)، لكن من الداخل كان غنيًا. هل كان يمكن لمثل هذه الجواهر أن تصدر عن شفتيه لو لم يحمل كنزًا مخفيًا في قلبه؟
                            </p>
                            <p> من يصلي برغبة يسبح في قلبه حتى إن كان لسانه صامتًا.
                                أما إذا صلى (الإنسان) بغير شوق فهو أبكم أمام الله حتى إن بلغ صوته آذان البشر .
                            </p>
                        </div>
                        <img src="images/apostles.jpg" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                    </div>
                </div>
                <div class="tab-pane fade " id="3adra">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/3adra2.jpg" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>
                            <h2>طقس صوم وأعياد السيدة العذراء مريم</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بأعياد وصوم السيدة العذراء القديسة مريم.</p>
                            <p>من أين جاءت مثل هذه الجواهر التي لمديح الله؟ اُنظروا إنسانًا من الخارج كان فقيرًا (أيوب)، لكن من الداخل كان غنيًا. هل كان يمكن لمثل هذه الجواهر أن تصدر عن شفتيه لو لم يحمل كنزًا مخفيًا في قلبه؟
                            </p>
                            <p> من يصلي برغبة يسبح في قلبه حتى إن كان لسانه صامتًا.
                                أما إذا صلى (الإنسان) بغير شوق فهو أبكم أمام الله حتى إن بلغ صوته آذان البشر .

                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="baba">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/pope.jpg" alt="graphic" class="hymn-image rounded">
                        <div>
                            <h2>طقس حضور الأب البطريرك والآباء الأساقفة</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بألحان حضور البابا البطريرك والآباء في الكنيسة.</p>
                            <p>من أين جاءت مثل هذه الجواهر التي لمديح الله؟ اُنظروا إنسانًا من الخارج كان فقيرًا (أيوب)، لكن من الداخل كان غنيًا. هل كان يمكن لمثل هذه الجواهر أن تصدر عن شفتيه لو لم يحمل كنزًا مخفيًا في قلبه؟
                            </p>
                            <p> من يصلي برغبة يسبح في قلبه حتى إن كان لسانه صامتًا.
                                أما إذا صلى (الإنسان) بغير شوق فهو أبكم أمام الله حتى إن بلغ صوته آذان البشر .

                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  show active" id="3amma">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/church.jpg" alt="graphic" class="rounded hymn-image">
                        <div>
                            <h2>بعض الطقوس العامة</h2>
                            <p class="lead" dir="rtl">مقتطفات من الطقوس الخاصة بترتيب وألحان تسبحة نصف الليل من الطقس السنوي.</p>

                            <p>من أين جاءت مثل هذه الجواهر التي لمديح الله؟ اُنظروا إنسانًا من الخارج كان فقيرًا (أيوب)، لكن من الداخل كان غنيًا. هل كان يمكن لمثل هذه الجواهر أن تصدر عن شفتيه لو لم يحمل كنزًا مخفيًا في قلبه؟
                            </p>
                            <p> من يصلي برغبة يسبح في قلبه حتى إن كان لسانه صامتًا.
                                أما إذا صلى (الإنسان) بغير شوق فهو أبكم أمام الله حتى إن بلغ صوته آذان البشر .
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- // end .section -->


    <div class="section bg-new-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-sm-2 col-lg">
                    <img src="images/3adra1.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <div class="row" dir="rtl">
                            <div style="margin: 10px">

                            </div>
                        <h3>لحن</h3><h2 class="coptic-font-h2">Xere )eotoke</h2><h3>الكبير</h3>
                        </div>
                        <p class="mb-4 arbaic-text-small-nav2" dir="rtl">هو اللحن الذي يُصلََى في بداية طقس التمجيد للسيدة العذراء مريم بعد قطعة "إكسمارؤوت"</p>
                        <a href="maps/3adra1.jpg" target="_blank" class="btn btn-primary arbaic-text-small-nav">الخريطة</a>
                        <audio id="audio" src="hymns_audio/Shere%20Theotoke%20Great%20-%20Zaher.mp3" onplay="onPlayer('btnPlay','btnPause')" onpause="onPauser('btnPlay','btnPause')"></audio>
                        <a href="hymns_audio/Shere%20Theotoke%20Great%20-%20Zaher.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlay" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audio')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPause"  style="background-color: transparent; border: none; cursor: pointer; outline: inherit;" onclick="play('audio')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/aba22.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center" dir="ltr">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <h2 class="coptic-font-h2" dir="ltr">Kalwc</h2>
                        <p class="mb-4 arbaic-text-small-nav">لحن جميل يُصَلّيه الشعب عند استقبال البابا البطريرك عند عودته من السفر من الخارج.</p>
                        <a href="maps/prayer.jpg" target="_blank"  class="btn btn-primary arbaic-text-small-nav">كلمات اللحن</a>
                        <audio id="audio1" src="hymns_audio/ally-korban-khoras-eklerekyya.mp3" onplay="onPlayer('btnPlay1','btnPause1')" onpause="onPauser('btnPlay1','btnPause1')"></audio>
                        <a href="hymns_audio/ally-korban-khoras-eklerekyya.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlay1" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audio1')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPause1" style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audio1')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-gradient">
        <div class="container">
            <div class="row" dir="ltr">
                <div class="col-md-6">
                    <img src="images/abc.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <!--<div class="box-icon"><span class="ti-rocket gradient-fill ti-3x"></span></div>-->
                        <br>
                        <h2 class="hymn-name-white">لحن أللي التوزيع السنوي</h2>
                        <p class="mb-4">لحن ألليلويا والمزمور المائة والخمسون الذي يُصَلَّى في توزيع الأسرار على الشعب في القداس في أيام الطقس السنوي. يختتم اللحن بألليلويا بي أوأووفا بين نوتي بيه الكبيرة.</p>
                        <a href="maps/مديح%20للثالوث%20القدوس.pdf" target="_blank" class="btn btn-primary arbaic-text-small-nav">كلمات+الخريطة</a>
                        <audio id="audio2" src="hymns_audio/ally-tawzee3-sanawy-HICS.mp3" onplay="onPlayer('btnPlay2','btnPause2')" onpause="onPauser('btnPlay','btnPause')"></audio>
                        <a href="hymns_audio/ally-tawzee3-sanawy-HICS.mp3" target="_blank" class="btn btn-primary2 arbaic-text-small-nav2">تنزيل اللحن</a>
                        <button id="btnPlay2"  style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audio2')"><img src="https://img.icons8.com/nolan/64/play-button-circled.png"/></button>
                        <button id="btnPause2"  style="background-color: transparent; border: none;cursor: pointer; outline: inherit;" onclick="play('audio2')"><img src="https://img.icons8.com/nolan/50/pause.png"/></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- // end .section -->


<div class="section light-bg">
    <div class="container">
        <div class="row" dir="rtl">
            <div class="col-md-8 d-flex align-items-center">
                <ul class="list-unstyled ui-steps">
                    <li class="media">
                        <div class="circle-icon mr-4">1</div>
                        <div class="media-body">
                            <h5>احفظ اللحن كويس باستخدام المصدر والخريطة</h5>
                        </div>
                    </li>
                    <li class="media my-4">
                        <div class="circle-icon mr-4">2</div>
                        <div class="media-body">
                            <h5 dir="ltr">قم بتسجيل الجزء المطلوب لمسابقة الأسبوع</h5>
                        </div>
                    </li>
                    <li class="media">
                        <div class="circle-icon mr-4">3</div>
                        <div class="media-body">
                            <h5 dir="rtl">بعد التصحيح هاتفتح صفحة الترتيب، عشان تشوف النقط بتاعتك، وترتيبك وترتيب فريقك</h5>
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


<div class="section" dir="ltr">
    <div class="container">
        <div class="section-title">
            <small>التسجيلات</small>
            <h3 class="arbaic-text-title2">تسجيل اللحن</h3>
            <h2>قم باختيار الأسبوع الذي تود تسميع الجزء الخاص به</h2>
        </div>

        <div class="testimonials owl-carousel">
            <div class="testimonials-single">
                <img src="images/3adra1.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">1</h1> (DUE: 27/6/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن شيري ثيؤتوكي الكبير</h5>
                <p class="text-primary">الجزء الأول</p>
            </div>
            <div class="testimonials-single">
                <img src="images/3adra2.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">2</h1> (DUE: 5/7/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن شيري ثيؤتوكي الكبير</h5>
                <p class="text-primary">الجزء الثاني</p>
            </div>
            <div class="testimonials-single">
                <img src="images/mary.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">3</h1> (DUE: 12/7/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن شيري ثيؤتوكي الكبير</h5>
                <p class="text-primary">الجزء الثالث</p>
            </div>
            <div class="testimonials-single">
                <img src="images/mary2.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">4</h1> (DUE: 19/7/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن شيري ثيؤتوكي الكبير</h5>
                <p class="text-primary">الجزء الرابع</p>
            </div>
            <div class="testimonials-single">
                <img src="images/aba2.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">5</h1> (DUE: 26/7/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن كالوس</h5>
                <p class="text-primary">الجزء الأول</p>
            </div>
            <div class="testimonials-single">
                <img src="images/aba22.jpg" alt="client" class="client-img">
                <h1>
                    WEEK <h1 class="mokmek-heading-text-color">6</h1> (DUE: 3/8/2020)
                </h1>
                <h5 class="mt-4 mb-2">لحن كالوس</h5>
                <p class="text-primary">الجزء الثاني</p>
            </div>

        </div>

    </div>

</div>
<div class="section">

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

</div>
<!-- // end .section -->
<!-- // end .section -->


<div class="section light-bg" id="rank" dir="ltr">
    <div class="container">
        <div class="section-title">
            <small></small>
            <h2 class="arbaic-text-title">أيقونات قبطية</h2>
        </div>

        <div class="img-gallery owl-carousel owl-theme">
            <img src="images/cross.jpg" alt="image"     class="rounded">
            <img src="images/mary2.jpg" alt="image"     class="rounded">
            <img src="images/mary.jpg"  alt="image"     class="rounded">
            <img src="images/a.jpg"     alt="image"     class="rounded">
            <img src="images/a1.jpg"    alt="image"     class="rounded">
            <img src="images/a2.jpg"    alt="image"     class="rounded">
            <img src="images/a3.jpg"    alt="image"     class="rounded">
            <img src="images/a4.jpg"    alt="image"     class="rounded">
            <img src="images/a5.jpg"    alt="image"     class="rounded">
            <img src="images/a6.jpg"    alt="image"     class="rounded">
            <img src="images/a7.jpg"    alt="image"     class="rounded">
            <img src="images/a8.jpg"    alt="image"     class="rounded">
            <img src="images/a9.jpg"    alt="image"     class="rounded">
        </div>

    </div>

</div>
<!-- // end .section -->




<!--<div class="section pt-0" id="faq">
    <div class="container">
        <div class="section-title">
            <small>FAQ</small>
            <h3>Frequently Asked Questions</h3>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
                <h4 class="mb-3">Can I try before I buy?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                <h4 class="mb-3">What payment methods do you accept?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>

            </div>
            <div class="col-md-6">
                <h4 class="mb-3">Can I change my plan later?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>
                <h4 class="mb-3">Do you have a contract?</h4>
                <p class="light-font mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. </p>

            </div>
        </div>
    </div>

</div>-->
<!-- // end .section -->


<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action">
            <h2 class="arbaic-text-title2">مهرجان الألحان 2020</h2>
            <p class="tagline">مهرجان الألحان واللغة القبطية والطقوس الكنسية | مدرسة القديس أثناسيوس الرسولي للشمامسة | صيف 2020 </p>
            <div class="my-4">
                <a href="alhanpage.php" class="btn btn-light arbaic-text-small-nav">الألحان</a>
                <a href="copticpage.html" class="btn btn-light arbaic-text-small-nav">القبطي</a>
                <a href="takspage.php" class="btn btn-light arbaic-text-small-nav">الطقس</a>
                <a href="mokmekpage.html" class="btn btn-light arbaic-text-small-nav">MokMek</a>
                <a href="rankingpage.php" class="btn btn-light arbaic-text-small-nav">الترتيب</a>
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
        <a href="index.php" class="m-2">HOME</a>
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
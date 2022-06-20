<?php require_once 'config.php';?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>امتحانات الشمامسة 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes ,initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
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
            <h1 class="arbaic-text-title"> <strong>امتحانات الشمامسة</strong> </h1>
            <h1 class="arbaic-text-title">شتاء <strong>2022</strong></h1>
            <p class="tagline"><strong>مدرسة القديس أثناسيوس الرسولي للشمامسة | كنيسة السيدة العذراء مريم والبابا أثناسيوس الرسولي بمدينة نصر | شتاء 2022</strong></p>
        </div>
        <div class="img-holder mt-3"><img src="images/lo2.png" alt="phone" class="img-fluid"></div>
    </header>


    <!-- // end .section -->

    <div class="section light-bg" id="alhan">


        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <!--<img src="images/bob.png" alt="perspective phone" class="img-fluid">-->
                                <div class="media-body">
                                    <h4 class="card-new">امتحانات ألحان</h4>
                                    <p class="card-text"><strong>الألحان التي تُصَلَّى في كنيستنا القبطية الأرثوذكسية.</strong></p>
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
                                    <h4 class="card-new">امتحانات طقس</h4>
                                    <p class="card-text"><strong>طقوس ليتورجيات وألحان كنيستنا القبطية الأرثوذكسية من تسبحات ورفع بخور وقراءات كنيسة</strong></p>
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
                                    <h4 class="card-new">امتحانات قبطي</h4>
                                    <p class="card-text"><strong>اللغة القبطية هي لغتنا المصرية القديمة ونقوم بدراستها في مدرسة الشمامسة لنستخدمها في صلوات وليتورجيات وألحان الكنيسة</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="section">

        <div class="container col">
            <div class="bg-gradient row" dir="ltr">
                <div class="col-lg-10 col-sm-3">
                <img src="images/BG.png" alt="perspective phone" class="img-fluid">
                </div>
                <div class="col-lg-2 col-sm-6">
                <a href="tasgeelalhan.php" class="btn btn-primary3 arbaic-text-small-heading" style="color: #633991">إلى امتحان الألحان</a>
                </div>
            </div>
        </div>


    </div>
    <!-- // end .section -->
    <div class="section" id="coptic">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <h3 class="arbaic-text-title" style="text-align: right">اللغة القبطية</h3>
                    <div dir="rtl" style="text-align: right">
                    <p class="mb-lg-2 arbaic-text-small-nav">اللغة القبطية هي اللغة المصرية القديمة مكتوبة بحروف يونانية. هي اللغة التي نستخدمها في صلواتنا الليتورجية في كنيستنا القبطية الأرثوذكسية حتى يومنا هذا. </p>
                    <p class="mb-lg-2 arbaic-text-small-nav">نستمتع معاً هذا العام بمعرفة بعض القواعد الشيقة والجميلة الخاصة باللغة القبطية. </p>
                    <p class="mb-lg-2 arbaic-text-small-nav">تعالوا نستمتع بلغتنا القبطية الجميلة وندخل امتحاناتها هذا الترم.</p>
                    </div>
                    <a href="copticpage.php" class="btn btn-primary arbaic-text-small-nav2">اذهب إلى امتحان القبطي</a>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="images/gamma.png" alt="perspective phone" class="img-fluid">
            </div>
        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg" id="taks">
        <div class="container">
            <div class="section-title">
                <small>كنسيات</small>
                <h3 class="arbaic-text-title2">الطقوس الكنسية</h3>
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
                        <div style="text-align: center">
                            <h2>طقس صوم وأعياد الآباء الرسل</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بأعياد وصوم الآباء الرسل القديسين.</p>
                            <p>
                                لا يستهن أحد بصوم آبائنا الرسل، فهو أقدم صوم عرفته الكنيسة المسيحية في كل أجيالها وأشار إليه السيد بقوله "ولكن حينما يرفع عنهم العريس فحينئذ يصومون"..

                                وصام الآباء الرسل، كبداية لخدمتهم.  فالرب نفسه بدأ خدمته بالصوم، أربعين يومًا على الجبل.

                                صوم الرسل إذن، هو صوم خاص بالخدمة والكنيسة.

                                قيل عن معلمنا بطرس الرسول إنه صام إلى أن " جاع كثيرًا واشتهى أن يأكل" (أع 10: 10).  وفي جوعه رأى السماء مفتوحة، ورأى رؤيا عن قبول الأمم.

                                وكما كان صومهم مصحوبًا بالرؤى والتوجيه الإلهي، كان مصحوبًا أيضًا بعمل الروح القدس وحلوله.  ويقول الكتاب: "وبينما هم يخدمون الرب ويصومون، قال الروح القدس أفرزوا لي برنابا وشاول للعمل الذي دعوتها إليه.  فصاموا حينئذ وصلوا، ووضعوا عليهما الأيادي، ثم أطلقوهم.  فهذان إذ أرسلا من الروح القدس، انحدرا إلى سلوكية" (أع 13: 2-4).
                            </p>
                        </div>
                        <img src="images/apostles.jpg" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                    </div>
                </div>
                <div class="tab-pane fade " id="3adra">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/3adra2.jpg" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div style="text-align: center">
                            <h2>طقس صوم وأعياد السيدة العذراء مريم</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بأعياد وصوم السيدة العذراء القديسة مريم.</p>
                            <p>
                                "طوبى للبطن الذي حملك والثديين اللذين رضعتهما... بل طوبى للذين يسمعون كلام الله ويحفظونه" (لو 27:11،28).

                                "طوبى التي آمنت أن يتم ما قيل لها من قبل الرب" (لو 45:1).

                                طوبى لمريم العظيمة التي "كانت تحفظ جميع هذا الكلام متفكرة به في قلبها" (لو 19:2).

                                طوبى لمن تكلمت بالروح القدس معلنة "فهوذا منذ الآن جميع الأجيال تطو بنى" (لو 48:1).

                                نطوبك يا ذات كل التطويب لأنك بالحقيقة ارتفعت على كل السمائيين وصرت سماء ثانية تحمل القدوس كالشاروبيم وأبهى.

                                يا للعجب.. الأم الأعجوبة.. الأم والعذراء.. الأم والأمة.. الملكة العبدة كيف لعقلي الصغير أن يستوعب هذه الأعجوبة.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="baba">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/pope.jpg" alt="graphic" class="hymn-image rounded">
                        <div style="text-align: center">
                            <h2>طقس حضور الأب البطريرك والآباء الأساقفة</h2>
                            <p class="lead">مقتطفات من الطقوس الخاصة بألحان حضور البابا البطريرك والآباء في الكنيسة.</p>
                            <p>
                                قال الآباء الرسل عند سيامة الشمامسة السبعة: "أما نحن فنواظب على الصلاة وخدمة الكلمة" (أع 6: 4).

                                وهنا تظهر أهمية خدمة الكلمة في عمل رئاسة الكهنوت.

                                ولما تحدث لوقا الإنجيلي عن مصادر معلوماته، قال: "كما سلمها إلينا الذين كانوا منذ البدء معاينين وخدامًا للكلمة" (لو 1: 2) أي الآباء الرسل: ".. بالإنجيل الذي صرت أنا خادمًا له" (أف 3: 7). وقال إنه أؤتمن على الإنجيل (1تس 2: 4).

                                خدمة الكلمة هي خدمة الكرازة، وخدمة التعليم.

                                وعنها قال المسيح لتلاميذه: "اكرزوا بالإنجيل للخليقة كلها" (مر 16: 15).  وقال بولس لتلميذه تيموثاوس الأسقف: "أكرز بالكلمة.. وَبِّخ، انتهر، عِظ، بكل أناة وتعليم.. أعمل عمل المبشر. تمم خدمتك" (2تى 4: 2-5).
                            </p>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  show active" id="3amma">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/church.jpg" alt="graphic" class="rounded hymn-image">
                        <div style="text-align: center">
                            <h2 >بعض الطقوس العامة</h2>
                            <p class="lead" dir="rtl" >مقتطفات من الطقوس الخاصة بترتيب وألحان تسبحة نصف الليل من الطقس السنوي.</p>

                            <p>
                                التسبيح هو أرقى أنواع الصلاة لأنه يعكس إحساس الإنسان بعمل الله، ويشعره أنه قريب من الله، وفيه يقترب الإنسان من الصورة الملائكية، لذلك يقال عن التسبحة:
                                إنها طعام الملائكة, أو عمل السمائيين. فى التسبيح يشترك الكيان كله فى تقديم الذبيحة.. الجسد والقلب واللسان والعقل (الذهن).
                            </p>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- // end .section -->

    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/nm.jpg" alt="dual phone" class="hymn-image">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="align-items-center">
                        <h2 dir="ltr">GO TAKS!</h2>
                        <p class="mb-4">مسابقة رائعة عن طقوس كنيستنا القبطية الأرثوذكسية وتاريخها. ابدأ الآن وشارك في حل هذه الامتحانات الممتعة والتعرف على جمال طقوس كنيستنا القبطية الأرثوذكسية</p>
                        <a href="takspage.php" class="btn btn-primary arbaic-text-small-nav2" dir="ltr">اذهب إلى امتحان الطقس</a></div>
                </div>
            </div>

        </div>
    </div>

    <!-- // end .section -->

    
    <div class="section" id="agbia">

<div class="container">
    <div class="row">
        
        <div class="col-md-6 d-flex align-items-center">
            <div class="align-items-center">
                <h2 dir="ltr" style="text-align: right">الأجبية</h2>
                <p class="mb-4">الأجبية هي كتاب صلوات السواعي في كنيستنا القبطية. وفي هذا الامتحان نحاول أن نتذكر سوياً المزامير والأناجيل والقطع التي نصليها ونحفظها سوياً في مدرسة الشمامسة.</p>
                <a href="agbiapage.php" class="btn btn-primary arbaic-text-small-nav2" dir="ltr">اذهب إلى امتحان الأجبية</a></div>
        </div>
        <div class="col-md-6">
            <img src="images/agbia.jpg" alt="dual phone" class="hymn-image">
        </div>
    </div>

</div>
</div>
<!-- // end .section -->


    <div class="section light-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body" style="text-align: center">
                                <h5>قم بتسجيل دخولك بالكود وكلمة السر الخاصة بك في مدرسة الشمامسة</h5>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>-->
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body" style="text-align: center">
                                <h5>احفظ وذاكر كويس</h5>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem eveniet</p>-->
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body" style="text-align: center">
                                <h5>ادخل وامتحن الألحان والطقس والقبطي والأجبية</h5>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium obcaecati vel exercitationem </p>-->
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="images/cart.jpg" alt="iphone" class="img-fluid">
                </div>

            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section" id="mokmek">
        <div class="container">
            <div class="section-title">
                <h2 class="mokmek-heading-text-color">Results</h2>
            </div>
        </div>

    </div>
    <div class="section">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/cart2.png" alt="dual phone" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h2 style="text-align: center" dir="ltr">Results Coming Soon...</h2>
                        <p class="mb-4 arbaic-text-small-nav" style="text-align: right">بعد حفظ الألحان ومذاكرة القبطي والبحث في الطقوس. استنى شوية لحد لما النتيجة تطلع وهاتقدر تدخل تشوف نتيجتك من هنا.</p>
                        <a href="#" class="btn btn-primary arbaic-text-small-nav2" dir="rtl">نتيجة الامتحانات</a></div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    <!-- // end .section -->


    <div class="section light-bg" id="rank">
        <div class="container">
            <div class="section-title">
                <h3 class="arbaic-text-heading">الهدايا والجوائز</h3>
            </div>

            <div class="align-content-center">
                <h4 class="arbaic-text-small-heading">
                    جاري ترتيب وتحضير الجوائز ...
                </h4>
                <h5>
                    وسيتم الإعلان عنها قريباً
                </h5>
            </div>
            <!--
            <div class="img-gallery owl-carousel owl-theme">
                <img src="images/screen1.jpg" alt="image">
                <img src="images/screen2.jpg" alt="image">
                <img src="images/screen3.jpg" alt="image">
                <img src="images/screen1.jpg" alt="image">
            </div>
-->
        </div>

    </div>
    <!-- // end .section -->





    <!--<div class="section" id="">
        <div class="container">
            <div class="section-title">
                <h3 class="arbaic-text-title2">الترتيب الأسبوعي</h3>
                <h5 class="arbaic-text-small-nav" style="color: #f5378e">جاري حساب النقاط والأوائل ... (لازالت المسابقة في الأسبوع الأول)</h5>
            </div>

            <div class="card-deck">
                <div class="card pricing popular">
                    <div class="card-head">
                        <h4 class="text-primary">INDIVIDUALS</h4>
                        <span class="price arbaic-text-small-nav">مايكل هاني أنيس</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">10 Projects</div>
                        <div class="list-group-item">5 GB Storage</div>
                        <div class="list-group-item">Basic Support</div>
                        <div class="list-group-item"><del>Collaboration</del></div>
                        <div class="list-group-item"><del>Reports and analytics</del></div>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-lg btn-block arbaic-text-small-nav2">ترتيب أوائل المهرجان</a>
                    </div>
                </div>
                <div class="card pricing popular">
                    <div class="card-head">
                        <h4 class="text-primary">TEAMS</h4>
                        <small class="price arbaic-text-small-nav">Team: Stephanos</small>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">Unlimited Projects</div>
                        <div class="list-group-item">100 GB Storage</div>
                        <div class="list-group-item">Priority Support</div>
                        <div class="list-group-item">Collaboration</div>
                        <div class="list-group-item">Reports and analytics</div>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-lg btn-block arbaic-text-small-nav2">ترتيب أوائل الفرق</a>
                    </div>
                </div>
                <div class="card pricing popular">
                    <div class="card-head">
                        <h4 class="text-primary">MOKMEK</h4>
                        <span class="price arbaic-text-small-nav">Team: Arshy Angelos</span>
                    </div>
                    <<ul class="list-group list-group-flush">
                        <div class="list-group-item">Unlimited Projects</div>
                        <div class="list-group-item">Unlimited Storage</div>
                        <div class="list-group-item">Collaboration</div>
                        <div class="list-group-item">Reports and analytics</div>
                        <div class="list-group-item">Web hooks</div>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-lg btn-block arbaic-text-small-nav2">أوائل اللعبة</a>
                    </div>
                </div>
            </div>
             // end .pricing


        </div>

    </div>-->
    <!-- // end .section -->


    <div class="section pt-0" id="faq" dir="ltr">
        <div class="container">
            <div class="section-title">
                <small>FAQs</small>
                <h3 class="arbaic-text-title2">الأسئلة الأكثر شيوعاً عن امتحانات الشمامسة 2022</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3" style="text-align: right">لو كلمة السر بتاعتي مش فاكرها أو مش عارف أدخل على حسابي، المفروض أعمل ايه؟</h4>
                    <p class="mb-5" style="text-align: right">لو مش فاكر الكود بتاعك أو كلمة السر ممكن تروح الكنترول وتاخد الكود بتاعك أو كلمة السر بتاعتك. أو تبعت لرقم مدرسة الشمامسة على الواتساب تسأل على الرقم السري بتاعك.</p>
                    <h4 class="mb-3" style="text-align: right">هل لازم أمتحن كل الامتحانات؟</h4>
                    <p class="mb-5" style="text-align: right">مش لازم تمتحن كل حاجة. ممكن تمتحن أي حاجة تحبها براحتك.</p>

                </div>
                <div class="col-md-6" >
                    <h4 class="mb-3" style="text-align: right">هل لازم أمتحن في الفترة المحددة للامتحانات؟</h4>
                    <p class="mb-5" style="text-align: right">لازم تمتحن في الفترة المحددة للامتحان من 18 مارس ليوم 25 مارس قبل الساعة 12 بالليل. بعد كدة مش هايكون مسموح انك تمتحن أي حاجة</p>
                    <h4 class="mb-3" style="text-align: right">هل ممكن أدخل الامتحان كذا مرة؟</h4>
                    <p class="mb-5" style="text-align: right">لأ، لو دخلت امتحان أي مادة مش هاينفع تدخلها تاني. خلي بالك ان بيكون فيه عداد وقت لما الامتحان يفتح بيعد وقت الامتحان وبيقفل لما الوقت يخلص.</p>

                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->






    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">
                <h2 dir="ltr">Our Mobile Application Soon...</h2>
                <p class="tagline" dir="rtl">قريباً سيتم إصدار تطبيق خاص بالامتحانات، يعمل على جميع أجهزة الموبايل والتابلت.</p>
                <div class="my-4">

                    <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                    <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->
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

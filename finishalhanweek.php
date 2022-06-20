<?php
require_once 'config.php';

$weekNumberToStop = 2;

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>تقفيل أسبوع ألحان - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                            <li class="nav-item arbaic-text-small-nav"> <a class="nav-link" href="tasgeelalhan.php">الألحان</a> </li>
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
        <h1 class="arbaic-text-title" style="padding-bottom: 30px;"> <strong>تقفيل أسبوع الألحان</strong> </h1>
        <p id="status"></p>
    </div>
</header>


<?php
$i=0;
for($k=0;$k<$weekNumberToStop;$k++) {
    $k = $k +1;
    echo '<form id="upload_formLahn" action="" method="post">
    <input type="submit"  id="submitbtn_' . $k . '" name="submibtn_' . $k  . '" class="btn btn-primary label-title" style="max-width: 80%; max-width: 80vh; align-self: center; text-align: center; margin: 10px;" value="Finish Week:' . $k . '"/>
    </form>';



    $sqlu = "SELECT `Member_Code`, `Week_Number`, `Hymn_ID`, `Hymn_Part`, `Hymn_Week_Score`, `Submission_Time`, `Submission_Url` FROM `Member_Week_Hymn_Score` WHERE `Week_Number`=" . $k . " GROUP BY `Member_Code`, `Hymn_ID`, `Hymn_Part` ORDER BY `Submission_Time` DESC, `Member_Code` ASC";
    $stmt = $conn->prepare($sqlu);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $players_codes_array = array();
    $players_week_number_array = array();
    $players_hymn_id_array = array();
    $players_hymn_part_array = array();
    $players_hymn_week_score = array();
    $players_hymn_submission_time_array = array();
    $players_hymn_submission_url_array = array();
    $i = 0;
    $const_code_to_compare = "";
    $counter = 0;
    foreach ($result as $row) {
        echo '<div class="flex-column d-flex center align-items-center" style="margin-bottom: 20px">';
        $players_codes_array[$i] = $row['Member_Code'];
        $const_code_to_compare = $players_codes_array[$i];
        $players_week_number_array[$i] = $row['Week_Number'];
        $players_hymn_id_array[$i] = $row['Hymn_ID'];
        $players_hymn_part_array[$i] = $row['Hymn_Part'];
        $players_hymn_week_score[$i] = $row['Hymn_Week_Score'];
        $players_hymn_submission_time_array[$i] = $row['Submission_Time'];
        $players_hymn_submission_url_array[$i] = $row['Submission_Url'];
        $chosenBefore[$i] = 0;


        echo $players_codes_array[$i] . "<br>";
        echo $players_week_number_array[$i]."<br>";
        echo $players_hymn_id_array[$i] . "<br>";
        echo $players_hymn_part_array[$i] . "<br>";
        echo $players_hymn_submission_time_array[$i] . "<br>";
        $i = $i + 1;
        echo '</div>';
    }
    $i = $i-1;
    echo "<br>"."Total Number of Submissions = ".$i."<br>";
    $k = $k-1;


    for($m=0;$m<$i;$m++)
    { $counter = 0;
        if($chosenBefore[$m]==0) {
            $counter++;
            $chosenBefore[$m] = 1;
            $week_score = $players_hymn_week_score[$m];
            for ($n = $m + 1; $n < $i - 1; $n++) {
                if ($players_codes_array[$m] == $players_codes_array[$n]) {
                    $chosenBefore[$n]=1;
                    $week_score = $week_score + $players_hymn_week_score[$n];
                    $counter++;
                }
            }
            echo "players_codes_array[".$m."]=".$players_codes_array[$m]."<br>";
        }
    }

}



?>



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



<!--<script>

    function _(el){
        return document.getElementById(el);
    }

    function uploadDaraga(i, player_code, hymn_id, hymn_part, submissionTime){

        var formdata = new FormData();
        var score = _("input_".concat(i.toString()));
        formdata.append("i",i);
        formdata.append("playerCode", player_code);
        formdata.append("hymnID", hymn_id);
        formdata.append("hymnPart",hymn_part);
        formdata.append("score",score);
        formdata.append("submissionTime",submissionTime);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandler, false);
        ajax.open("POST", "submitDaraga.php");
        ajax.send(formdata);
        //location.href = "submitDaraga.php";
    }

    function completeHandler(event){
            _("status").innerHTML = event.target.responseText;

    }
</script>-->

</body>
</html>

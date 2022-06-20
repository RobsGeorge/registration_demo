<?php
require_once 'config.php';

$weekNumber=3;
$overallWeeksCountTillNow = 3;
?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>تقفيل الأسبوع 1 - مهرجان ألحان 2020</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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
                            <li class="nav-item"> <a class="nav-link" href="mokmekpage.php">MOKMEK</a> </li>
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
        <h1 class="arbaic-text-title" style="padding-bottom: 30px;"> <strong>تقفيل الأسبوع</strong> </h1>
        <p id="status"></p>
    </div>
</header>

<form id="upload_formLahn" action="" method="post">
    <input type="submit" class="btn btn-primary" name="submitweek" id="submitweek" value="Finish Week"/>
    <input type="submit" class="btn btn-dark" name="td" id="td" value="Tagmee3 Daragt Team"/>
    <input type="submit" class="btn btn-primary2" name="xs" id="xs" value="Overall Team Score Calculation">
    <input type="submit" class="btn-dark" name="mb" id="mb" value="Overall Individual Score Calculation">
</form>




<?php
if(isset($_POST['submitweek'])) {
    $sqlu = "SELECT `Full_Name`, `Code`, `Image`, `Marhala` FROM `player` WHERE 1";
    $stmt = $conn->prepare($sqlu);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $players_codes_array = array();
    $players_full_name_array = array();
    $players_hymn_image_array = array();
    $players_hymn_marhala_array = array();

    $i = 0;
    foreach ($result as $row) {
        $players_codes_array[$i] = $row['Code'];
        $players_full_name_array[$i] = $row['Full_Name'];
        $players_hymn_image_array[$i] = $row['Image'];
        $players_hymn_marhala_array[$i] = $row['Marhala'];
        $i = $i + 1;
    }

    $players_coptic_week_score_array = array();
    $players_taks_week_score_array = array();
    $players_alhan_week_score_array = array();

    $total_week_score = 0;

    for ($j = 0; $j < count($players_codes_array); $j++) {
        $sql = "SELECT `Member_Week_Coptic_Score` FROM `Member_Week_Coptic_Score` WHERE `Member_Code` = " . $players_codes_array[$j] . " AND `Week_Number` = " . $weekNumber;
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $players_coptic_week_score_array[$j] = $row['Member_Week_Coptic_Score'];
        } else {
            $players_coptic_week_score_array[$j] = 0;
        }

        $sql = "SELECT `Final_Week_Score` FROM `Member_Week_Final_Alhan_Score` WHERE `Member_Code` = " . $players_codes_array[$j] . " AND `Week_Number` = " . $weekNumber;
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $players_alhan_week_score_array[$j] = $row['Final_Week_Score'];
        } else {
            $players_alhan_week_score_array[$j] = 0;
        }

        $sql = "SELECT `Member_Taks_Week_Score` FROM `Member_Week_Taks_Score` WHERE `Member_Code` = " . $players_codes_array[$j] . " AND `Week_Number` = " . $weekNumber;
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $players_taks_week_score_array[$j] = $row['Member_Taks_Week_Score'];
        } else {
            $players_taks_week_score_array[$j] = 0;
        }
        $total_week_score = $players_alhan_week_score_array[$j] + $players_coptic_week_score_array[$j] + $players_taks_week_score_array[$j];


        $sql = "SELECT * FROM `Member_Week_Score` WHERE `Member_Code` = " . $players_codes_array[$j] . " AND `Week_Number` = " . $weekNumber;
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $sqlx = "UPDATE `Member_Week_Score` SET `Week_Score`= " . $total_week_score . " WHERE `Member_Code` = " . $players_codes_array[$i] . " AND `Week_Number`= " . $weekNumber;
            $count = $conn->exec($sqlx);

        } else {
            $sqlx = "SET NAMES 'utf8'";
            $sqlx = $sqlx . ';' . 'SET CHARACTER SET utf8';
            $sqlx = $sqlx . ';' . "INSERT INTO `Member_Week_Score`(`Member_Code`,`Week_Score`,`Week_Number`) VALUES (?,?,?)";
            $stmtinsert = $conn->prepare($sqlx);
            $result = $stmtinsert->execute([$players_codes_array[$j], $total_week_score, $weekNumber]);
            $stmtinsert->closeCursor();
        }


    }
}

elseif (isset($_POST['td'])) {

    $sqlu = "SELECT `Team_ID` FROM `Team` WHERE `ChosenFlag`=1";
    $stmt = $conn->prepare($sqlu);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $teams_id_array = array();
    $i = 0;
    foreach ($result as $row) {
        $teams_id_array[$i] = $row['Team_ID'];
        $i = $i + 1;
    }

    for ($j = 0; $j < count($teams_id_array); $j++) {
        $sqlu = "SELECT `Member_Code`  FROM `Team-Members` WHERE `Team_ID`=" . $teams_id_array[$j];
        $stmt = $conn->prepare($sqlu);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $team_members_array = array();
        $i = 0;
        foreach ($result as $row) {
            $team_members_array[$i] = $row['Member_Code'];
            $i = $i + 1;
        }

        $team_coptic_score = 0;
        $team_taks_score = 0;
        $team_alhan_score = 0;
        $team_total_score = 0;

        for ($i=0; $i < count($team_members_array); $i = $i + 1) {
            $sql = "SELECT `Member_Week_Coptic_Score` FROM `Member_Week_Coptic_Score` WHERE `Member_Code` = " . $team_members_array[$i] . " AND `Week_Number` = " . $weekNumber;
            $res = $conn->query($sql);
            if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
            {
                $row = $res->fetch();
                $team_coptic_score = $team_coptic_score + $row['Member_Week_Coptic_Score'];
            } else {
                $team_coptic_score = $team_coptic_score + 0;
            }

            $sql = "SELECT `Final_Week_Score` FROM `Member_Week_Final_Alhan_Score` WHERE `Member_Code` = " . $team_members_array[$i] . " AND `Week_Number` = " . $weekNumber;
            $res = $conn->query($sql);
            if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
            {
                $row = $res->fetch();
                $team_alhan_score = $team_alhan_score + $row['Final_Week_Score'];
            } else {
                $team_alhan_score = $team_alhan_score + 0;
            }

            $sql = "SELECT `Member_Taks_Week_Score` FROM `Member_Week_Taks_Score` WHERE `Member_Code` = " . $team_members_array[$i] . " AND `Week_Number` = " . $weekNumber;
            $res = $conn->query($sql);
            if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
            {
                $row = $res->fetch();
                $team_taks_score = $team_taks_score + $row['Member_Taks_Week_Score'];
            } else {
                $team_taks_score = $team_taks_score + 0;
            }
        }
        $team_coptic_score = $team_coptic_score/count($team_members_array);
        $team_alhan_score = $team_alhan_score/count($team_members_array);
        $team_taks_score = $team_taks_score/count($team_members_array);
        $team_total_score = floor($team_coptic_score + $team_alhan_score + $team_taks_score);


        $sql = "SELECT * FROM `Team_Week_Score` WHERE `Team_ID` = " . $teams_id_array[$j] . " AND `Week_Number` = " . $weekNumber;
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $sqlx = "UPDATE `Team_Week_Score` SET `Team_Week_Total_Alhan_Score` = " . $team_alhan_score . ", `Team_Week_Total_Coptic_Score`=". $team_coptic_score .", `Team_Week_Total_Taks_Score`=" . $team_taks_score . ", `Team_Week_Total_Score`=" . $team_total_score . " WHERE `Team_ID` = " . $teams_id_array[$j] . " AND `Week_Number`= " . $weekNumber;
            $count = $conn->exec($sqlx);
        } else {
            $sqlx = "SET NAMES 'utf8'";
            $sqlx = $sqlx . ';' . 'SET CHARACTER SET utf8';
            $sqlx = $sqlx . ';' . "INSERT INTO `Team_Week_Score`(`Team_ID`, `Week_Number`, `Team_Week_Total_Alhan_Score`, `Team_Week_Total_Coptic_Score`, `Team_Week_Total_Taks_Score`, `Team_Week_Total_Score`) VALUES (?,?,?,?,?,?)";
            $stmtinsert = $conn->prepare($sqlx);
            $result = $stmtinsert->execute([$teams_id_array[$j], $weekNumber, $team_alhan_score, $team_coptic_score, $team_taks_score, $team_total_score]);
            $stmtinsert->closeCursor();
        }
    }
}
elseif(isset($_POST['xs']))
{
        $sqlu = "SELECT `Team_ID` FROM `Team_Week_Score` WHERE `Week_Number` = ".$weekNumber;
        $stmt = $conn->prepare($sqlu);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $teams_id_array = array();

        $k = 0;
        foreach ($result as $row) {
            $teams_id_array[$k] = $row['Team_ID'];
            $k = $k + 1;
        }

        for($j=0;$j<count($teams_id_array);$j++) {
            $v = 0;
            for ($i = 0; $i < $overallWeeksCountTillNow; $i++) {
                $sql = "SELECT `Team_Week_Total_Score` FROM `Team_Week_Score` WHERE `Team_ID` = " . $teams_id_array[$j] . " AND `Week_Number` = " . ($i+1);
                $res = $conn->query($sql);
                if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
                {
                    $row = $res->fetch();
                    $v = $v + $row['Team_Week_Total_Score'];
                }
            }

            $sql = "SELECT * FROM `Team_Overall_Score` WHERE `Team_ID` = " . $teams_id_array[$j];
            $res = $conn->query($sql);
            if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
            {
                $row = $res->fetch();
                $sqlx = "UPDATE `Team_Overall_Score` SET `Overall_Score` = " . $v. " WHERE `Team_ID` = " . $teams_id_array[$j];
                $count = $conn->exec($sqlx);

            } else {
                $sqlx = "SET NAMES 'utf8'";
                $sqlx = $sqlx . ';' . 'SET CHARACTER SET utf8';
                $sqlx = $sqlx . ';' . "INSERT INTO `Team_Overall_Score`(`Team_ID`, `Overall_Score`) VALUES (?,?)";
                $stmtinsert = $conn->prepare($sqlx);
                $result = $stmtinsert->execute([$teams_id_array[$j], $v]);
                $stmtinsert->closeCursor();
            }

        }
}

elseif (isset($_POST['mb']))
{
        $sqlu = "SELECT `Member_Code` FROM `Member_Week_Score` WHERE `Week_Number` = ".$weekNumber;
    $stmt = $conn->prepare($sqlu);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $members_code_array = array();

    $k = 0;
    foreach ($result as $row) {
        $members_code_array[$k] = $row['Member_Code'];
        $k = $k + 1;
    }

    for($j=0;$j<count($members_code_array);$j++) {
        $v = 0;
        for ($i = 0; $i < $overallWeeksCountTillNow; $i++) {
            $sql = "SELECT `Week_Score` FROM `Member_Week_Score` WHERE `Member_Code` = " . $members_code_array[$j] . " AND `Week_Number` = " . ($i+1);
            $res = $conn->query($sql);
            if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
            {
                $row = $res->fetch();
                $v = $v + $row['Week_Score'];
            }
        }

        $sql = "SELECT * FROM `Member_Overall_Score` WHERE `Member_Code` = " . $members_code_array[$j];
        $res = $conn->query($sql);
        if ($res->rowCount() > 0) ////CODE FOUND IN DATABASE/////
        {
            $row = $res->fetch();
            $sqlx = "UPDATE `Member_Overall_Score` SET `Overall_Score` = " . $v. " WHERE `Member_Code` = " . $members_code_array[$j];
            $count = $conn->exec($sqlx);
        } else {
            $sqlx = "SET NAMES 'utf8'";
            $sqlx = $sqlx . ';' . 'SET CHARACTER SET utf8';
            $sqlx = $sqlx . ';' . "INSERT INTO `Member_Overall_Score`(`Member_Code`, `Overall_Score`) VALUES (?,?)";
            $stmtinsert = $conn->prepare($sqlx);
            $result = $stmtinsert->execute([$members_code_array[$j], $v]);
            $stmtinsert->closeCursor();
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



</body>
</html>

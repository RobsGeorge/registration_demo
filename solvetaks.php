<?php
require_once 'config.php';
session_start();

if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

$sql2 = "SELECT ClassID FROM `shamamsastudentsdata` WHERE Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$classNumber = $row2['ClassID'];
}


$sql2 = "SELECT * FROM `studenttaksexamresults` WHERE `Code`= ".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
        header('Location: taksretrial.php');
        exit();
}
else /////the first time for the student to take the exam
{
    $sql = "SET NAMES 'utf8'";
    $sql = $sql . ';' . 'SET CHARACTER SET utf8';
    $sql = $sql . ';' . "INSERT INTO `studenttaksexamresults`(`Code`, `ClassID`, `TaksExamScore`, `Submission_Time`) VALUES (?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$_COOKIE['player-code'],$classNumber,0, date('Y/m/d H:i:s', time())]);
    $stmtinsert->closeCursor();
}


$minutes = 60;


$sql2 = "SELECT NumberOfQuestions, ExamDuration FROM `taksexams` WHERE ClassID=".$classNumber;
$res2 = $conn->query($sql2);
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
$row2 = $res2->fetch();
$numberOfQuestions = $row2['NumberOfQuestions'];
$examDuration = $row2['ExamDuration'];
}
else
{
    header('Location: userpage.php');
    exit();
}



$arrayOfQuestions = [];
$arrayOfQuestionsTypes = [];
$arrayOfAnswers = [];
$arrayOfCorrectAnswers = [];
$arrayOfQuestionsNumbers = [];
$helperArray = [];

$sql = "SELECT QuestionNumber, QuestionContent, QuestionType, CorrectChoice, FirstChoice, SecondChoice, ThirdChoice, FourthChoice FROM taksquestions WHERE ClassID=".$classNumber;
$res = $conn->query($sql);

   $i = 0;
    foreach ($res->fetchAll() as $row)
    {   $helperArray = [];
        $arrayOfQuestionsNumbers[$i] = $row["QuestionNumber"];
        $arrayOfQuestions[$i] = $row["QuestionContent"];
        $arrayOfQuestionsTypes[$i] = $row["QuestionType"];
        $arrayOfCorrectAnswers[$i] = $row["CorrectChoice"];
        if($row["QuestionType"] == "اختيار من متعدد")
        {
            $helperArray[0]=$row["FirstChoice"];
            $helperArray[1]=$row["SecondChoice"];
            $helperArray[2]=$row["ThirdChoice"];
            $helperArray[3]=$row["FourthChoice"];
        }
        else if($row["QuestionType"] == "صح أو خطأ")
        {
            $helperArray[0]=$row["FirstChoice"];
            $helperArray[1]=$row["SecondChoice"];
        }
        $arrayOfAnswers[$i] = $helperArray;
        $i++;
    }
    $countOfQuestions = $i;
    $_SESSION['numberOfQuestions'] = $numberOfQuestions;

///get count of pool of questions

function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


$questionsArrayRand = randomGen(0,$countOfQuestions-1,$numberOfQuestions);

?>


<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <title>امتحان الطقس 2022</title><link rel="shortcut icon" type="image/x-icon" href="images/BG.png" />
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

<body data-spy="scroll" data-offset="15">

<!-- Nav Menu -->



<header class="bg-gradient">
    <div class="container mt-5">
        <h1 class="arbaic-text-title"> <strong>حل وتسليم امتحان الطقس</strong> </h1>
        <p class="tagline" style="padding-bottom: 20px;">يجب عليك حل أكثر الأسئلة الممكنة بشكل صحيح وفي أسرع وقت ممكن للحصول على النقاط الكاملة لامتحان الطقس</p>
    </div>
</header>


<div class=" d-flex center flex-column" style="margin: 20px; align-items: center">
    <h1 class="arbaic-text-title2">مدة الامتحان: <?php echo $examDuration; ?> دقيقة</h1>
    
    <h2 class="arbaic-text-small-nav" style="text-align:center;font-size: xx-large; color: #004085; text-align: center">ملحوظة مهمة: يجب الضغط على "تسليم الإجابات" في نهاية الصفحة وانتظار رسالة تأكيد بوصول الإجابات قبل ترك الصفحة.</h2>
    <p style="align-self: center; font-size: 30px; font-family: 'El Messiri', sans-serif; color: #f5378e; text-align: center" dir="rtl" id="count"></p>
</div>

<!-- // end .section -->








<div class="section bg-new-gradient">
    <form action= "confirmTaks.php" method="post" id="quiz" dir="rtl">
        <div style="margin-top: 25px;">
            <h3 class="arbaic-text-small-heading" style="text-align: center; font-size: x-large">
                اختر الإجابة الصحيحة:
            </h3>
        </div>
        <ol>
            <?php


            $arrayOfStudentAnswers = [];
            $arrayOfFinalCorrectAnswers = [];
            $arrayOfSolvedQuestionsNumbers = [];
            
            
            
            for($i=1;$i<=$numberOfQuestions;$i++)
            {
                $randNum = $questionsArrayRand[$i-1];
                $arrayOfFinalCorrectAnswers[$i-1] = $arrayOfCorrectAnswers[$randNum];
                $arrayOfSolvedQuestionsNumbers[$i-1] = $arrayOfQuestionsNumbers[$randNum];
                echo "<li style=\"margin-top: 20px; margin-bottom: 20px; margin-right: 10px; margin-left: 10px; text-align: right\">
                <div class=\"container row\" dir=\"rtl\" style=\"font-size: 20px\">
                    <h3 style=\"font-size: larger\">".$arrayOfQuestions[$randNum]."</h3>
                </div>
                ";
                

                if($arrayOfQuestionsTypes[$randNum]=="اختيار من متعدد")
                {
                    $numberOfChoices = 4;
                }
                else if($arrayOfQuestionsTypes[$randNum]=="صح أو خطأ")
                {
                    $numberOfChoices = 2;
                }

                for($j=1;$j<=$numberOfChoices;$j++)
                {   
                    echo "<div style='text-align: right'>
                    <input type='radio' name=q".$i." value= ".$j."/>
                    <label  style='font-size: 20px; color: #af09d5;' dir='ltr'>".$arrayOfAnswers[$randNum][$j-1]."</label>
                </div>";
                }
                echo "</li>";
            }

            $_SESSION['numberOfQuestions'] = $numberOfQuestions;
            $_SESSION['arrayOfFinalCorrectAnswers'] = $arrayOfFinalCorrectAnswers;
            $_SESSION['arrayOfSolvedQuestionsNumbers'] = $arrayOfSolvedQuestionsNumbers;
            ?>
        </ol>

        

        <input class="btn label-title2" style="margin-right: 30px; padding:15px; background-image: -moz-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -webkit-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: -ms-linear-gradient( 122deg, #af09d5 0%, #af09d5 100%);
    background-image: linear-gradient( 122deg, #af09d5 0%, #af09d5 100%); font-weight:500; font-size:20px; border-radius: 10px" value="تسليم الاجابات" type="submit" name="submit"/>
    </form>
</div>



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




<!-- jQuery and Bootstrap -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="js/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    var dur = '<?=$examDuration?>';
    var min = '<?=$minutes?>';
    var count = dur*min;
    var countmin = 0;
    var countrem = 0;
    var interval = setInterval(function(){
        if(count>60)
        {
            countmin = parseInt(count/60);
            countrem = count%60;
            document.getElementById('count').innerHTML=(countmin.toString().concat(" دقيقة : ")).concat(countrem.toString().concat(" ثانية"));

        }
        else
        {
            if(count==60){
            Swal.fire({
                position: 'top-end',
                icon: 'info',
                title: 'متبقى دقيقة واحدة',
                showConfirmButton: false,
                timer: 1500
            });
            }
            document.getElementById('count').innerHTML=count.toString().concat(" ثانية");
            document.getElementById('count').style.color = '#ff0000';

        }
        count--;
        if (count === 0){
            clearInterval(interval);
            document.getElementById('count').innerHTML='انتهى الوقت';
            // or...
            /*alert("انتهى الوقت! شكراً لتعبك");*/
            let timerInterval
            Swal.fire({
                title: 'انتهى الوقت',
                html: 'شكراً لتعبك!',
                timer: 3000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                },
                onClose: () => {
                    window.location.replace('confirmTaks.php');
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
            //sleep(3000);

        }
    }, 1000);
</script>

</body>
</html>


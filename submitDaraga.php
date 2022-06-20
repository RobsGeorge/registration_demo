<?php
require_once 'config.php';



$i = $_POST['i'];
$playerCode = $_POST['playerCode'];
$hymnID = $_POST['hymnID'];
$hymnPart = $_POST['hymnPart'];
$score = $_POST['score'];
$submissionTime = $_POST['submissionTime'];


    $sql = "SET NAMES 'utf8'";
    $sql = $sql . ';' . 'SET CHARACTER SET utf8';
    $sql = $sql . ';' . "UPDATE `Member_Week_Hymn_Score` SET `Hymn_Week_Score`= 50 WHERE `Member_Code`= 1303 AND `Hymn_ID` = 9 AND `Hymn_Part` = 1 AND `Submission_Time`= '11/07/2020 03:16:29 pm'";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute();
    if($result)
    {echo  "تم ارسال اللحن بنجاح!";}


?>
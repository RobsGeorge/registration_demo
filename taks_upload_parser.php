<?php
require_once 'config.php';

//////UPLOAD AUDIO AND VIDEO //////////
$allowed_coptic_taks = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

$i = $_POST["weekNumber"];
$x = $_POST["type"];

if($x=="taks")
{
    $fileName = $_FILES["taks".$i]["name"]; // The file name
    $fileTmpLoc = $_FILES["taks".$i]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["taks".$i]["type"]; // The type of file it is
    $fileSize = $_FILES["taks".$i]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["taks".$i]["error"]; // 0 for false... and 1 for true
// Verify file extension
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);

    if (!array_key_exists($ext, $allowed_coptic_taks)) {
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
        exit();
    }


    if (!$fileTmpLoc) { // if file not chosen
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
        exit();
    }
    $file_url = "ebteda2y/ebteda2y_taks_uploads/" . $i . "@" . $_COOKIE['ebteda2y-player-code'] . "-" . date('d-m-Y-h-i-s-a', time()) . "." . $ext;
    if (move_uploaded_file($fileTmpLoc, $file_url)) {
        $sql = "SET NAMES 'utf8'";
        $sql = $sql . ';' . 'SET CHARACTER SET utf8';
        $sql = $sql . ';' . "INSERT INTO `Ebeteda2y_Taks_Submission`(Taks_Dars_ID,Taks_Submission_Time,Taks_Submission_Url,Student_Code) VALUES (?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$i,  date('d/m/Y h:i:s a', time()), $file_url, $_COOKIE['ebteda2y-player-code']]);
        echo  "تم ارسال إجابة الطقس بنجاح!";
        sleep(2);

    } else {
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
    }

}
elseif ($x=="taksb")
{

    $fileName = $_FILES["taksb".$i]["name"]; // The file name
    $fileTmpLoc = $_FILES["taksb".$i]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["taksb".$i]["type"]; // The type of file it is
    $fileSize = $_FILES["taksb".$i]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["taksb".$i]["error"]; // 0 for false... and 1 for true
// Verify file extension
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);

    if (!array_key_exists($ext, $allowed_coptic_taks)) {
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
        exit();
    }


    if (!$fileTmpLoc) { // if file not chosen
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
        exit();
    }
    $file_url = "ebteda2y/ebteda2y_taks_questions_upload/" . $i . "@" . $_COOKIE['ebteda2y-player-code'] . "-" . date('d-m-Y-h-i-s-a', time()) . "." . $ext;
    if (move_uploaded_file($fileTmpLoc, $file_url)) {
        $sql = "SET NAMES 'utf8'";
        $sql = $sql . ';' . 'SET CHARACTER SET utf8';
        $sql = $sql . ';' . "INSERT INTO `Ebeteda2y_Taks_Submission`(Taks_Dars_ID,Taks_Submission_Time,Taks_Submission_Url,Student_Code) VALUES (?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$i,  date('d/m/Y h:i:s a', time()), $file_url, $_COOKIE['ebteda2y-player-code']]);
        echo  "تم ارسال إجابة الطقس بنجاح!";
        sleep(2);

    } else {
        echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
    }

}

?>
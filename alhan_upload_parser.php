<?php
require_once 'config.php';

if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}


//////UPLOAD AUDIO AND VIDEO //////////
$allowed_lahn = array("mp3" => "audio/mpeg","m4a"=>"audio/mp4","m4a"=>"audio/mpeg-4", "mp4" => "video/mp4", "wav" => "audio/wav","mov"=>"video/quicktime","avi"=>"video/x-msvideo", "ogg"=>"audio/ogg");

$x = $_POST['hymnID'];
$y = $_POST['hymnPart'];
$z = $_POST['classNumber'];
$h = $POST['hymnDBId'];


$fileName = $_FILES["lahn_".$x."_".$y]["name"]; // The file name
$fileTmpLoc = $_FILES["lahn_".$x."_".$y]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["lahn_".$x."_".$y]["type"]; // The type of file it is
$fileSize = $_FILES["lahn_".$x."_".$y]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["lahn_".$x."_".$y]["error"]; // 0 for false... and 1 for true
// Verify file extension
$ext = pathinfo($fileName, PATHINFO_EXTENSION);




if (!$fileTmpLoc) { // if file not chosen
    echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
    exit();
}
//$file_url = "uploads/" . $z ."_".$x. "@" . $_COOKIE['player-code'] . "-" . date('d-m-Y-h-i-s-a', time()) . "." . $ext;
$file_url = "uploads/" . $z ."_".$h. "@" . $_COOKIE['player-code']."." . $ext;
if (move_uploaded_file($fileTmpLoc, $file_url)) {
    /*$sql = "SELECT classID FROM shamamsastudentsdata WHERE Code=".$_COOKIE['player-code'];
    $res = $conn->query($sql);
    if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
    {
        $row = $res->fetch();
        $classNumber = $row['classID'];
    }*/

    $sql = "SELECT * FROM alhanresults WHERE Code=".$_COOKIE['player-code']." AND Class=".$z." AND Hymn_ID=".$h;
    $res = $conn->query($sql);
    if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
    {
        $row = $res->fetch();

        $sqlx = "UPDATE alhanresults SET Sunmission_Time= '" . date('Y/m/d H:i:s', time()) . "', Submission_URL = '".$file_url."' WHERE `Code` = " . $_COOKIE['player-code'] . " AND `Class`= " . $z. " AND `Hymn_ID` = ".$h;
        $a = $conn->prepare($sqlx);
        $a->execute();
        echo  "تم تعديل اللحن بنجاح!";
    }
    else
    {
    $sql = "SET NAMES 'utf8'";
    $sql = $sql . ';' . 'SET CHARACTER SET utf8';
    $sql = $sql . ';' . "INSERT INTO `alhanresults`(`Code`, `Class`, `Hymn_ID`, `Sunmission_Time`, `Submission_URL`, `Grade`) VALUES (?,?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$_COOKIE['player-code'],$z,$h, date('Y/m/d H:i:s', time()), $file_url,0]);
    echo  "تم ارسال اللحن بنجاح!";
    }
} else {
    echo  "فشل المحاولة! برجاء المحاولة مرة أخرى!";
}


?>
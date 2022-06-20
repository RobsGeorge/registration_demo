<?php
require_once 'config.php';

//////UPLOAD AUDIO AND VIDEO //////////
$allowed = array("mp4" => "video/mp4","mov"=>"video/quicktime","avi"=>"video/x-msvideo");


$i = $_POST["weekNumber"];
$x = $_POST["typ"];
$name = $_POST["fileName"];
$description = $_POST["fileDescription"];



if($x=='lahn') {
    $sql3 = "SELECT Lahn_ID FROM `Ebteda2y_Alhan_Video` WHERE Lahn_ID=" . $i;
    $res3 = $conn->query($sql3);

    if ($res3->rowCount() > 0) ////CODE FOUND IN DATABASE/////
    {
        echo "فشل المحاولة! الفيديو الخاص بالألحان  في الأسبوع " . $i . " موجود بالفعل!";
        exit();
    } else {
        $fileName = $_FILES[$x]["name"]; // The file name
        $fileTmpLoc = $_FILES[$x]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES[$x]["type"]; // The type of file it is
        $fileSize = $_FILES[$x]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES[$x]["error"]; // 0 for false... and 1 for true
// Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed)) {
            echo "فشل المحاولة! برجاء التأكد أن الملف المرفوع فيديو!";
            exit();
        }


        if (!$fileTmpLoc) { // if file not chosen
            echo "فشل المحاولة! برجاء اختيار ملف الفيديو بطريقة صحيحة!";
            exit();
        }
        $file_url = "ebteda2y/ebteda2y_alhan_videos/" . "video_" . $i . "_alhan." . $ext;
        if (move_uploaded_file($fileTmpLoc, $file_url)) {
            $sql = "SET NAMES 'utf8'";
            $sql = $sql . ';' . 'SET CHARACTER SET utf8';
            $sql = $sql . ';' . "INSERT INTO `Ebteda2y_Alhan_Video`(`Lahn_ID`, `Lahn_Name`, `Video_Url`, `Lahn_Description`) VALUES (?,?,?,?)";
            $stmtinsert = $conn->prepare($sql);
            $result = $stmtinsert->execute([$i, $name, $file_url, $description]);
            if ($result) {
                echo "تم رفع الفيديو بنجاح!";
            } else {
                echo "لم يتم تسجيل الملف في قاعدة البيانات!";
                exit();
            }
        } else {
            echo "لم يتم رفع الملف إلى السيرفر";
            exit();
        }

    }
}
elseif ($x=='taks'){
    $sql3 = "SELECT Taks_Dars_ID FROM `Ebteda2y_Taks_Video` WHERE Taks_Dars_ID=" . $i;
    $res3 = $conn->query($sql3);

    if ($res3->rowCount() > 0) ////CODE FOUND IN DATABASE/////
    {
        echo "فشل المحاولة! الفيديو الخاص بالطقس  في الأسبوع " . $i . " موجود بالفعل!";
        exit();
    } else {
        $fileName = $_FILES[$x]["name"]; // The file name
        $fileTmpLoc = $_FILES[$x]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES[$x]["type"]; // The type of file it is
        $fileSize = $_FILES[$x]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES[$x]["error"]; // 0 for false... and 1 for true
// Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed)) {
            echo "فشل المحاولة! برجاء التأكد أن الملف المرفوع فيديو!";
            exit();
        }


        if (!$fileTmpLoc) { // if file not chosen
            echo "فشل المحاولة! برجاء اختيار ملف الفيديو بطريقة صحيحة!";
            exit();
        }
        $file_url = "ebteda2y/ebteda2y_taks_videos/" . "taks_video_" . $i . "." . $ext;
        if (move_uploaded_file($fileTmpLoc, $file_url)) {
            $sql = "SET NAMES 'utf8'";
            $sql = $sql . ';' . 'SET CHARACTER SET utf8';
            $sql = $sql . ';' . "INSERT INTO `Ebteda2y_Taks_Video`(`Taks_Dars_ID`, `Taks_Dars_Name`, `Taks_Dars_Video_Url`, `Taks_Dars_Description`) VALUES (?,?,?,?)";
            $stmtinsert = $conn->prepare($sql);
            $result = $stmtinsert->execute([$i, $name, $file_url, $description]);
            if ($result) {
                echo "تم رفع الفيديو بنجاح!";
            } else {
                echo "لم يتم تسجيل الملف في قاعدة البيانات!";
                exit();
            }
        } else {
            echo "لم يتم رفع الملف إلى السيرفر";
            exit();
        }

    }
}
elseif ($x=='coptic'){
    $sql3 = "SELECT `Coptic_Dars_ID` FROM `Ebteda2y_Coptic_Video` WHERE `Coptic_Dars_ID`= " . $i;
    $res3 = $conn->query($sql3);

    if ($res3->rowCount() > 0) ////CODE FOUND IN DATABASE/////
    {
        echo "فشل المحاولة! الفيديو الخاص بالقبطي  في الأسبوع " . $i . " موجود بالفعل!";
        exit();
    } else {
        $fileName = $_FILES[$x]["name"]; // The file name
        $fileTmpLoc = $_FILES[$x]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES[$x]["type"]; // The type of file it is
        $fileSize = $_FILES[$x]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES[$x]["error"]; // 0 for false... and 1 for true
// Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $allowed)) {
            echo "فشل المحاولة! برجاء التأكد أن الملف المرفوع فيديو!";
            exit();
        }


        if (!$fileTmpLoc) { // if file not chosen
            echo "فشل المحاولة! برجاء اختيار ملف الفيديو بطريقة صحيحة!";
            exit();
        }
        $file_url = "ebteda2y/ebteda2y_coptic_videos/" . "coptic_video_" . $i ."." . $ext;
        if (move_uploaded_file($fileTmpLoc, $file_url)) {
            $sql = "SET NAMES 'utf8'";
            $sql = $sql . ';' . 'SET CHARACTER SET utf8';
            $sql = $sql . ';' . "INSERT INTO `Ebteda2y_Coptic_Video`(`Coptic_Dars_ID`, `Coptic_Dars_Name`, `Coptic_Dars_Video_Url`, `Coptic_Dars_Description`) VALUES (?,?,?,?)";
            $stmtinsert = $conn->prepare($sql);
            $result = $stmtinsert->execute([$i, $name, $file_url, $description]);
            if ($result) {
                echo "تم رفع الفيديو بنجاح!";
            } else {
                echo "لم يتم تسجيل الملف في قاعدة البيانات!";
                exit();
            }
        } else {
            echo "لم يتم رفع الملف إلى السيرفر";
            exit();
        }

    }
}
?>
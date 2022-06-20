<?php

require_once 'config.php';

$player_code = $_COOKIE['player-code'];
$level_chosen = $_POST['typ'];
$level_chosen_ID=0;
if($level_chosen=='z')
{
    $level_chosen_ID=4;
}
elseif ($level_chosen=='x')
{
    $level_chosen_ID=5;
}



$sql7 = "SELECT `Player_Code`, `Level_ID`  FROM `Player_Level` WHERE `Player_Code`=".$player_code;
$res7 = $conn->query($sql7);

if($row7 = $res7->fetch())
{
    echo "عفواً أنت مشترك بالفعل في مستوى.";
    echo "<br>";
    exit();
}



$sql = "INSERT INTO `Player_Level`(`Player_Code`, `Level_ID`) VALUES (?,?)";
$stmtinsert = $conn->prepare($sql);
$result = $stmtinsert->execute([$player_code, $level_chosen_ID]);
if($result)
{
    if($level_chosen_ID==4) {
        echo "مبروك! أنت الآن ملتحق بمستوى: زيتا";
        echo "<br>";
        exit();
    }
    elseif($level_chosen_ID==5){
        echo "مبروك! أنت الآن ملتحق بمستوى: اكسي";
        echo "<br>";
        exit();
    }
}
else{
    echo "هناك مشكلة في تسجيل المستوى! أعد المحاولة.";
}
?>

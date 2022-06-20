<?php
require_once 'config.php';

$joinErr = "";
$valid_join = true;
$createErr = "";

function createRandom(){
    $pass = substr(md5(uniqid(mt_rand(), true)) , 0, 5);
    return $pass;
}

function sendMail($msg,$subject,$mailto,$email_from){

// the message
    //$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg, 70);
    $headers = 'From: '.$email_from."\r\n";

// send email
    mail($mailto, $subject, $msg,$headers);

}

if(!isset($_COOKIE['player-code']))
{
    header('Location: login.php');
    exit();
}

$sql = "SELECT Full_Name, Image, Marhala FROM player WHERE Code=".$_COOKIE['player-code'];
$res = $conn->query($sql);
$playerMarhala = $playerFullName = $playerImage = "";
if($res->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row = $res->fetch();
    $playerFullName = $row['Full_Name'];
    $playerImage = $row['Image'];
    $playerMarhala = $row['Marhala'];

}

$sql2 = "SELECT Team_ID FROM `Team-Members` WHERE Member_Code=".$_COOKIE['player-code'];
$res2 = $conn->query($sql2);
$my_team_id=0;
if($res2->rowCount()>0) ////CODE FOUND IN DATABASE/////
{
    $row2 = $res2->fetch();
    $my_team_id = $row2['Team_ID'];

}




?>

<html>
<body>

<div class="select-style" style="align-self: center; max-width: 50%; max-width: 50vh;">
    <select style="margin-inside:10px ;color: #17a2b8;" name="selectTeamName" id="selectTeamName">
        <option selected=""></option>
        <?php
        $sqlu = "SELECT `Taks_Mosab2a_ID`, `Question_ID`, `Question_Type`, `Player_Code`, `Player_MultipleChoice_Choice`, `Player_TrueFalse_Choice`, `Player_Essay_Answer`, `Player_TrueFalse_Correction`, `Submission_Time` FROM `Question_Taks_Player_Solution` WHERE Player_Code=1303";
        $stmt = $conn->prepare($sqlu);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row) {
            echo '<option value="'.$row['Player_Code'].'">'.$row['Player_Code'].'</option>';
        }
        ?>
    </select>
</div>

</body>
</html>

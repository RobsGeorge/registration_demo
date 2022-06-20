<?php
/*require_once 'config.php';

$weekNumber = 1;

$sqlu = "SELECT `Member_Code`, `Week_Number`, `Tried`, `Entry_Time` FROM `Coptic_Exam_Player_Check` WHERE `Week_Number`=".$weekNumber;
$stmt = $conn->prepare($sqlu);
$stmt->execute();
$result = $stmt->fetchAll();
$team_members_array = array();
$week_number_array = array();
$entry_time_array = array();
$i=0;
foreach($result as $row) {
    $member_code_array[$i] = $row['Member_Code'];
    $week_number_array[$i] = $row['Week_Number'];
    $entry_time_array[$i] = $row['Entry_Time'];
    $i = $i+1;
}


for($i=0;$i<count($member_code_array);$i=$i+1) {
    $sql = "SET NAMES 'utf8'";
    $sql = $sql . ';' . 'SET CHARACTER SET utf8';
    $sql = $sql . ';' . "INSERT INTO `Member_Week_Coptic_Score`(`Member_Code`, `Coptic_Dars_ID`, `Member_Week_Coptic_Score`, `Submission_Time`, `Week_Number`) VALUES (?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$member_code_array[$i],$week_number_array[$i],0, $entry_time_array[$i],$week_number_array[$i]]);
}
*/?>

<div class="d-flex flex-column">
    <p class="arbaic-text-small-nav" dir="rtl" style="text-align: right; color: #FFFFFF; font-size: large;">
        انت الآن على وشك إنشاء فريق جديد أنت وأصدقائك. للدخول أنت وأضدقائك في نفس الفريق عليك أنت كقائد للفريق أن تقوم بإنشاء الفريق هنا واختيار اسم الفريق المناسب لك ولأصدقائك وسوف تقوم باستقبال كود الفريق على البريد الالكتروني الخاص بك الذي قمت بإدخاله عند التسجيل في الموقع. تقوم بإرساله لأصدقائك ويقوم كل واحد بإدخال هذا الكود في "Join Team" وسوف تكون بهذا أنت وأصدقائك في نفس الفريق. مع ملاحظة أن أقصى عدد للفريق هو 3 أشخاص فقط.
    </p>
    <h4 style="text-align: center; color: #633991;" class="arbaic-text-small-heading">اختار اسم الفريق المناسب لك وأصدقائك: </h4>
    <p class="arbaic-text-small-nav" style="text-align: center; color: #f5378e">اضغط على المربع الأبيض لاختيار اسم الفريق المناسب لك ولأصدقائك.</p>
    <div class="select-style" style="align-self: center; max-width: 50%; max-width: 50vh;">
        <select style="margin-inside:10px ;color: #17a2b8;" name="selectTeamName" id="selectTeamName">
            <option selected=""></option>
            <?php
            $sqlu = "SELECT `Member_Code`  FROM `Member_Week_Coptic_Score` WHERE 1";
            $stmt = $conn->prepare($sqlu);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row) {
                echo '<option value="'.$row['Member_Code'].'">'.$row['Member_Code'].'</option>';
            }
            $conn = null;
            ?>
        </select>
    </div>
    <input type="button" name="submitbtnB" id="submitbtnB" class="btn btn-primary label-title" style="max-width: 20%; max-width: 20vh; align-self: center; text-align: center; margin: 10px;" onclick="createTeam()" value="Create"/>
    <p id="create-status"  class="arbaic-text-small-nav" style=" margin-top: 20px; text-align: center; color: #bd2130"></p>
</div>



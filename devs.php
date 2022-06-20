<?php
require_once 'config.php';

$db= $conn;
$tableName="finalstudent";
$columns= ['firstName', 'secondName','thirdName','fourthName','nationalID', 'mobileNumber' ,'marhala','sana','DOB', 'paidEshterak', 'estalamPamflets', 'email'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
//echo $columnName;
$query = "SELECT * FROM ".$tableName.";";

$res = $db->prepare($query);
//$res = $db->query($query);
$res->execute();
$row = $res->fetch();


 if ($res->rowCount() > 0) {
    $msg= $res;
 } else {
    $msg= "No Data Found"; 
}
}
return $msg;
}
?>
<?php
require_once 'config.php';

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="table-responsive">
   <div class="col-sm-8">
    <?php
    echo "<table class=\"table table-bordered\" style='border: solid 1px black;'>";
    echo "<tbody>
    <tr><th>الاسم الاول</th>
    <th>الاسم الثاني</th>
    <th>الاسم الثالث</th>
    <th>الاسم الرابع</th>
    <th>الرقم القومي</th>
    <th>رقم الموبايل</th>
    <th>المرحلة الدراسية</th>
    <th>السنة الدراسية</th>
    <th>تاريخ الميلاد</th>
    <th>هل قام بدفع الاشتراك؟</th>
    <th>هل قام باستلام البامفلت؟</th>
    <th>البريد الالكتروني</th>
    <th>عنوان المنزل</th>
    </tr></tbody>";
    echo $deleteMsg??''; 
    $tableName="finalstudent";
    $query = "SELECT * FROM finalStudent;";
    $res = $conn->prepare($query);
    $res->execute();
    $result = $res->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($res->fetchAll())) as $k=>$v) {
      echo $v;
    }
  echo "</table>";
    ?>
</div>
</div>
</body>
</html>
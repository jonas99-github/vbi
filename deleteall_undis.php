<?php
include("connect.php");
$a = $_GET['loc_proj'];
$b = $_GET['asno'];
$c = $_GET['parid'];
echo $a;

$sql ="DELETE FROM  temp_assign_undis";
$result = $conn->prepare($sql);
$result->execute();
header("location:assign_undistributed.php?loc_proj=$a&asno=$b&parid=$c&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&selection=&rad=&loc=&remark=&dateiss");
 ?>

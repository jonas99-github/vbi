<?php
include "connect.php";
$emp=$_POST['empl'];
$prid=$_POST['prid'];
$a=$_POST['asid'];
$b=$_POST['invi'];
$c=$_POST['tag'];
$d=$_POST['eqdesc'];
$e=$_POST['brand'];
$f=$_POST['serial'];
$g=$_POST['model'];
$h=$_POST['rad'];
$i=$_POST['selection'];
$j=$_POST['loc'];
$sql ="DELETE from temp_assign WHERE eq_inv_id='$b'";
$result = $conn->prepare($sql);
$result->execute();
$sql2 = "UPDATE eq_inv SET eq_condition='Available/Unassigned' WHERE eq_inv_id='$b'";
$result2 = $conn->prepare($sql2);
$result2->execute();
header("location:assign.php?emp_no=$emp&asno=$a&parid=$prid&inv_id=$b&tag_no=$c&eqdesc=$d&brand=$e&serial_no=$f&model_no=$g&rad=$h&selection=$i&loc=$j&remark=");

 ?>

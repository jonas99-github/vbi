<?php
include "connect.php";
$dep=$_POST['loc_proj'];
$prid=$_POST['prid'];
$a=$_POST['asid'];
$b=$_POST['invi'];
$c=$_POST['selectdrop'];
$d=$_POST['loca'];
$e=$_POST['radbut'];

$sql ="DELETE from temp_assign_undis WHERE temp_eq_inv_id='$b'";
$result = $conn->prepare($sql);
$result->execute();
$sql2 = "UPDATE eq_inv SET eq_condition='Available/Unassigned' WHERE eq_inv_id='$b'";
$result2 = $conn->prepare($sql2);
$result2->execute();

$url="assign_undistributed.php?loc_proj=$dep&asno=$a&parid=$prid&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&rad=$e&selection=$c&loc=$d";
header("location:$url");



 ?>

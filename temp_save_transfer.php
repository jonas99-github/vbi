<?php
session_start();
include('connect.php');
$a = $_POST['assign_id'];
$b = $_POST['parid'];
$c = $_POST['inv_id'];
$d = $_POST['empl_no'];
$e = $_POST['remarks_assign'];
$g = $_POST['tag_no'];
$h = $_POST['eq_desc'];
$i = $_POST['brand'];
$j = $_POST['serial_no'];
$k = $_POST['model_no'];
$l = $_POST['radbut'];
$m = $_POST['loca'];
$n = $_POST['selectdrop'];
$o = $_POST['loca'];
$p = $_POST['employee'];



//HttpQueryString
$sql = "INSERT into temp_assign (assign_id,par_id,eq_inv_id,empl_no,remarks_assign,location_assign) VALUES('$a','$b','$c','$d','$e','$o')";
$result = $conn->prepare($sql);
$result->execute();
$sql2 = "UPDATE eq_inv SET eq_condition='Assigned' WHERE eq_inv_id='$c'";
$result2 = $conn->prepare($sql2);
$result2->execute();

header("location:assign-transfer.php?emp_no=$d&asno=$a&parid=$b&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&employee=$p&rad=$l&selection=$n&loc=$m");

?>

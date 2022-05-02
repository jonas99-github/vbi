<?php
include "connect.php";
$a = $_POST['descid'];
$b = $_POST['desc'];
$sql3 ="INSERT into eq_desc (eq_desc_id,eqdesc,brand) VALUES('$a','$b','$c')";
$result3 = $conn->prepare($sql3);
$result3->execute();
session_start();
$type="Added an Equipment description";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
$result = $conn->prepare($sql);
$result->execute();
header("location:description.php");
?>

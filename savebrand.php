<?php
include "connect.php";
$a = $_POST['brand'];
$sql ="INSERT into brand (brand) VALUES('$a')";
$result = $conn->prepare($sql);
$result->execute();
session_start();
$type="Added a Brand";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql2="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$a','$date')";
$result2 = $conn->prepare($sql2);
$result2->execute();
header("location:description.php");
?>

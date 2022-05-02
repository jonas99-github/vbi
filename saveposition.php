<?php
session_start();
include('connect.php');
$a = $_POST['pos_id'];
$b = $_POST['position'];
$c = $_POST['date_created'];
//HttpQueryString
$sql ="INSERT into position (pos_id,position,date_created) VALUES('$a','$b','$c')";
$result = $conn->prepare($sql);
$result->execute();

session_start();
$type="Added a position";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
$result7 = $conn->prepare($sql7);
$result7->execute();
header("location:addposition.php");
 ?>

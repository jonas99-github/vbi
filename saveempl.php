<?php
session_start();
include('connect.php');
$a = $_POST['empl_no'];
$b = $_POST['firstname'];
$c = $_POST['middlename'];
$d = $_POST['lastname'];
$pos = $_POST['pos_dept'];
$tid = $_POST['tid'];
$sql="SELECT * FROM position WHERE position='$pos'";
$result=$conn->query($sql);
	for($i=0;$row = $result->fetch_assoc(); $i++){
$e = $row['pos_id'];
}
$dept = $_POST['dept'];
$sql2="SELECT * FROM dept_tbl WHERE dept_name='$dept'";
$result2=$conn->query($sql2);
	for($i=0;$row = $result2->fetch_assoc(); $i++){
$f = $row['dept_id'];
}

$g = $_POST['status'];
$h = $_POST['date_created'];
$i = $_POST['deploy'];
$j =$_POST['hired'];

//HttpQueryString
$sql3 ="INSERT into empl_tbl (empl_no,empl_firstname,middlename,empl_lastname,position,dept_id,empl_status,date_created,deploy,hired) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
$result3 = $conn->prepare($sql3);
$result3->execute();

$sql4 ="INSERT into deploy_transfer (transferID,emplNo_transfer,newDeployment,transferDate) VALUES('$tid','$a','$i','$h')";
$result4 = $conn->prepare($sql4);
$result4->execute();

session_start();
$type="Added an employee";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_date,transac_empl) VALUES('$type','$pos','$date','$a')";
$result7 = $conn->prepare($sql7);
$result7->execute();

header("location:manage_empl.php");

 ?>

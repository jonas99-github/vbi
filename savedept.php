<?php
session_start();
include('connect.php');
$a = $_POST['dept_id'];
$b = $_POST['dept_name'];
$loc = $_POST['loc_dept'];
$sql="SELECT * FROM deployment WHERE deployment='$loc'";
$result=$conn->query($sql);
	for($i=0;$row = $result->fetch_assoc(); $i++){
$c = $row['deply_id'];
}
$d = $_POST['date_created'];
//HttpQueryString
$sql2 ="INSERT into dept_tbl (dept_id,dept_name,deply_id,date_created) VALUES('$a','$b','$c','$d')";
$result = $conn->prepare($sql2);
$result->execute();

session_start();
$type="Added a department";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
$result7 = $conn->prepare($sql7);
$result7->execute();

header("location:adddept.php");
 ?>

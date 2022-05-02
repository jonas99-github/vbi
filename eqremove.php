<?php
include "connect.php";
session_start();
$a=$_GET['id'];
$b="Deleted an Equipment";
$c=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');


$sql2="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$b','$c','$a','$date')";
$result2 = $conn->prepare($sql2);
$result2->execute();

$sql4="SELECT * FROM eq_inv WHERE eq_inv_id='$a'";
$result4=mysqli_query($conn, $sql4);
while($row4=mysqli_fetch_assoc($result4)){
	$d=$row4['eqdesc'];
}

$sql3="INSERT INTO deletedeq(deleted_eqid,deleted_eqdesc,date_deleted) VALUES('$a','$d','$date')";
$result3 = $conn->prepare($sql3);
$result3->execute();


$sql="DELETE FROM eq_inv WHERE eq_inv_id='$a'";
$result = $conn->prepare($sql);
$result->execute();
header("location:equipment.php?section=");

 ?>

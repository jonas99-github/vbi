<?php
include 'connect.php';
$emp=$_POST['emptransfer'];
$sql="DELETE FROM addeq_temp";
$result=$conn->prepare($sql);
$result->execute();
$sql="DELETE FROM temp_assign";
$result=$conn->prepare($sql);
$result->execute();
echo $emp;
header("location:about.php?section=equipment&action=&selaction=&emp_no=$emp");

 ?>

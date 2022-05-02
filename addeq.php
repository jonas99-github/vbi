<?php
include 'connect.php';
$emp=$_POST['emp'];
$a=$_POST['invid'];
$b=$_POST['serial'];
$c=$_POST['desc'];
$d=$_POST['remark3'];
$e=$_POST['par_transfer'];

$sql="INSERT INTO addeq_temp (invid,eqdesc,serial_no,emp_no,remark_temp,par_transfer) VALUE('$a','$c','$b','$emp','$d','$e')";
$result=$conn->prepare($sql);
$result->execute();
header("location:about.php?section=equipment&action=transfer&selaction=&emp_no=$emp#transfer");

 ?>

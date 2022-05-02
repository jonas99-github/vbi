<?php
include "connect.php";
$a=$_GET['emp_no'];
echo $a;

$sql="DELETE FROM temp_assign";
$result=$conn->prepare($sql);
$result->execute();
header("location:about.php?section=equipment&action=transfer&selaction=&emp_no=$a");

 ?>

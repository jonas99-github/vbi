<?php
include("connect.php");
$a = $_GET['emp_no'];
$c = $_GET['parid'];
$sql2="SELECT*FROM temp_assign";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $inv=$row2['eq_inv_id'];
$sql ="UPDATE eq_inv SET eq_condition='Available/Unassigned' WHERE eq_inv_id='$inv'";
$result = $conn->prepare($sql);
$result->execute();
}
$sql ="DELETE FROM  temp_assign";
$result = $conn->prepare($sql);
$result->execute();
header("location:assignment.php?emp_no=$a&parid=$c&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&selection=&rad=&loc=&remark=");
 ?>

<?php
include("connect.php");
$a=$_POST['cancel_empl'];
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

header("location:about.php?section=equipment&action=&selaction=equipment&emp_no=$a");
 ?>
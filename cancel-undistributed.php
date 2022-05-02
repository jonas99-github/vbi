<?php
include("connect.php");
$a=$_POST['cancel_undis'];
echo $a;
$sql2="SELECT*FROM temp_assign_undis";
$result2=mysqli_query($conn,$sql2); 
while($row2=mysqli_fetch_assoc($result2)){
  $inv=$row2['temp_eq_inv_id'];
  echo $inv;
$sql ="UPDATE eq_inv SET eq_condition='Available/Unassigned' WHERE eq_inv_id='$inv'";
$result = $conn->prepare($sql);
$result->execute();
}
$sql3 ="DELETE FROM  temp_assign_undis";
$result3 = $conn->prepare($sql3);
$result3->execute();


header("location:undistributed.php?loc=$a");
 ?>

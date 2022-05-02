<?php

include "connect.php";
$id = $_POST['idtransfer'];
$a = $_POST['empl_transfer'];
$b = $_POST['remarktransfer'];

echo $id;
$sql="UPDATE deploy_transfer set remarkTransfer='$b' WHERE transferID='$id'";
if ($conn->query($sql) === TRUE) {

$sql2="SELECT * FROM deploy_transfer WHERE transferID='$id'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $yy=$row2['newDeployment'];
  session_start();
  $type="Updated a deployment changes remark";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_loc,transac_date,transac_remark,transac_empl) VALUES('$type','$pos','$yy','$date','$b','$a')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();

}
  header("location:about.php?section=deployment_history&action=&selaction=&emp_no=$a");

}
else {
    echo "Error updating record: " . $conn->error;
}

header("location:about.php?section=deployment_history&action=&selaction=&emp_no=$a");

 ?>

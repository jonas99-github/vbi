<?php
include "connect.php";
$a=$_GET['inv'];
$b=$_GET['emp'];
$sql="UPDATE eq_inv set empl_no='', eq_condition='Available/Unassigned' WHERE eq_inv_id='$a'";
$result=mysqli_query($conn,$sql);
$result5=$conn->prepare($sql);
$result5->execute();

$sql2="SELECT * FROM eq_inv WHERE eq_inv_id='$a'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $state=$row2['eq_state'];
}

session_start();
$type="removed an equipment";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date,transac_empl) VALUES('$type','$pos','$a','$date','$b')";
if (mysqli_query($conn, $sql3)) {
  echo "success";
}
else{
  echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

}

if($state=='New'){
$sql7="UPDATE eq_inv SET eq_state='Old' WHERE eq_inv_id='$a'";
$result7=$conn->prepare($sql7);
$result7->execute();
header("location:about.php?section=equipment&action=remove&selaction=&emp_no=$b");
}
header("location:about.php?section=equipment&action=remove&selaction=&emp_no=$b");
 ?>

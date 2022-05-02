<?php
include "connect.php";
$id = $_POST['idpar'];
$a = $_POST['empl_remark'];
$b = $_POST['par_rem'];
$sql="UPDATE  prty_ackn_rcpt set remark_view='$b' WHERE par_no='$id'";
if ($conn->query($sql) === TRUE) {

  session_start();
  $type="Updated a PAR remark";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date,transac_remark,transac_empl) VALUES('$type','$pos','$id','$date','$b','$a')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();

 header("location:about.php?section=equipment&action=&selaction=&emp_no=$a");
}
else {
    echo "Error updating record: " . $conn->error;
}
header("location:about.php?section=equipment&action=&selaction=&emp_no=$a");
 ?>

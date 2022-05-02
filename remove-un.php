<?php
include "connect.php";
$a=$_POST['removeu'];
$sql="UPDATE eq_inv SET eq_condition='Available/Unassigned', par='' WHERE eq_inv_id='$a' ";
 if ($conn->query($sql) === TRUE) {
  echo "Equipment removed successfully";
 	 session_start();
  $type="removed an equipment from the undistributed section";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_date,transac_eqid) VALUES('$type','$pos','$date','$a')";
  $result3 = $conn->prepare($sql3);
  $result3->execute();
      }
      else {
          echo "Error updating record: " . $conn->error;
      }
?>
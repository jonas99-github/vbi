<?php
include "connect.php";
$emp=$_POST['emp2'];
$a=$_POST['deploy'];
$b=$_POST['date_changed'];
$c=$_POST['transferID'];

$sql="UPDATE empl_tbl SET deploy='$a' WHERE empl_no='$emp'";
if ($conn->query($sql) === TRUE) {

      $sql2="INSERT into deploy_transfer(transferID,emplNo_transfer,newDeployment,transferDate) values('$c','$emp','$a','$b')";
      if ($conn->query($sql2) === TRUE) {

        session_start();
        $type="Changed an employee Deployment";
        $pos=$_SESSION['SESS_ROLE'];
        date_default_timezone_set('Asia/Manila');
        $date=date('F j, Y g:i:a  ');
        $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_loc,transac_date,transac_empl) VALUES('$type','$pos','$a','$date','$emp')";
        $result7 = $conn->prepare($sql7);
        $result7->execute();

      header("location:about.php?section=deployment_history&action=&selaction=&emp_no=$emp");
  echo "success";
      }
      else {
          echo "Error updating record: " . $conn->error;
      }
} else {
    echo "Error updating record: " . $conn->error;
}

header("location:about.php?section=deployment_history&action=&selaction=&emp_no=$emp");
 ?>

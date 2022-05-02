<?php
include "connect.php";
$emp = $_POST['emp'];
$a = $_POST['firstname'];
$b = $_POST['middlename'];
$c = $_POST['lastname'];
$pos = $_POST['pos'];
$sql2="SELECT * FROM position WHERE position='$pos'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
$d = $row2['pos_id'];
}
$dept= $_POST['dept'];
$sql3="SELECT * FROM dept_tbl WHERE dept_name='$dept'";
$result3=mysqli_query($conn,$sql3);
while($row3=mysqli_fetch_assoc($result3)){
$e = $row3['dept_id'];
}
$f = $_POST['deploy'];
$g = $_POST['status'];
$h = $_POST['hired'];
$i = $_POST['date_created'];
$j = $_POST['remarks_prof'];

$sql="UPDATE empl_tbl set empl_firstname='$a',middlename='$b',empl_lastname='$c',position='$d',dept_id='$e',empl_status='$g',date_created='$i',deploy='$f',hired='$h', remarks_prof='$j' WHERE empl_no='$emp'";

if ($conn->query($sql) === TRUE) {

  session_start();
  $type="Edited employee information";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date,transac_empl) VALUES('$type','$pos','$id','$date','$emp')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();

  header("location:employee.php?emp_no=$emp");
} else {
    echo "Error updating record: " . $conn->error;
}
?>

<?php
include "connect.php";
$a=$_POST['remtext'];
$b=$_POST['emp'];
$sql="UPDATE empl_tbl set remarks_prof='$a' WHERE empl_no='$b'";
$result=$conn->prepare($sql);
if (mysqli_query($conn, $sql)) {
echo "Update successful!";
  session_start();
  $type="Edited employee remark";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_date,transac_remark,transac_empl) VALUES('$type','$pos','$date','$a','$b')";
  $result3 = $conn->prepare($sql3);
  $result3->execute();

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
  $conn->close();
 ?>

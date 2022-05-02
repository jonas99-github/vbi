<?php
include "connect.php";
$a = $_POST['deptid'];
$b = $_POST['dept'];//post is working

$sql2="SELECT * FROM dept_tbl WHERE dept_name='$b'";
$result2=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result2);
 if ($count > 0) {
   $row2=mysqli_fetch_assoc($result2);
      if($b==$row2["dept_name"]){
        echo "Department already exist";
      }
}
else{
  $sql="UPDATE dept_tbl SET dept_id='$a', dept_name='$b' WHERE dept_id='$a'";
  $result = $conn->prepare($sql);
  $result->execute();
  session_start();
  $type="Edited a department";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();
  echo "Updated successfully!";
}

 ?>

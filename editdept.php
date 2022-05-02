<?php
include "connect.php";
$a = $_POST['deptid'];
$sql="SELECT * FROM dept_tbl WHERE dept_id='$a'";
$result=mysqli_query($conn,$sql);
$b=mysqli_fetch_object($result);
echo json_encode($b);
 ?>

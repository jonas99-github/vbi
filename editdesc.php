<?php
include "connect.php";
$a = $_POST['descid'];
$sql="SELECT * FROM eq_desc WHERE eq_desc_id='$a'";
$result=mysqli_query($conn,$sql);
$b=mysqli_fetch_object($result);
echo json_encode($b);
 ?>

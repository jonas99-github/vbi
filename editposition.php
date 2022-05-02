<?php
include "connect.php";
$a = $_POST['posid'];
$sql="SELECT * FROM position WHERE pos_id='$a'";
$result=mysqli_query($conn,$sql);
$b=mysqli_fetch_object($result);
echo json_encode($b);
 ?>

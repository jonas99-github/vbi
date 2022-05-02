<?php
include "connect.php";
$a = $_POST['brandid'];
$sql="SELECT * FROM brand WHERE brandid='$a'";
$result=mysqli_query($conn,$sql);
$b=mysqli_fetch_object($result);
echo json_encode($b);
 ?>

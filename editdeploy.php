<?php
include "connect.php";
$a = $_POST['deployid'];
$sql="SELECT * FROM deployment WHERE deply_id='$a'";
$result=mysqli_query($conn,$sql);
$b=mysqli_fetch_object($result);
echo json_encode($b);
 ?>

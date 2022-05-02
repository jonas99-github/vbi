<?php
include('connect.php');

$invId=$_GET['invId'];
$sql="SELECT * FROM eq_inv WHERE eq_inv_id='$invId'";
$result=mysqli_query($conn, $sql);

$a=mysqli_fetch_object($result);
echo json_encode($a);    //returning the json string
 ?>
 
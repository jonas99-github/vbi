<?php
include('connect.php');

$a=$_GET['transfer'];
$sql="SELECT * FROM deployment WHERE deply_id='$a'";
$result=mysqli_query($conn, $sql);

$a=mysqli_fetch_object($result);
echo json_encode($a);    //returning the json string
 ?>

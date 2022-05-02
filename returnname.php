<?php
include('connect.php');

$name=$_GET['name'];
$sql="SELECT * FROM empl_tbl WHERE empl_no='$name'";
$result=mysqli_query($conn, $sql);

$a=mysqli_fetch_object($result);
echo json_encode($a);    //returning the json string
 ?>

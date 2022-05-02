<?php
include "connect.php";
$a = $_POST['aa'];
$sql="DELETE FROM save_reorder WHERE id='$a'";
$result=$conn->prepare($sql);
$result->execute();
header("location:reorder.php");
 ?>

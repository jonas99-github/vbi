<?php
include "connect.php";

$b = $_POST['qty'];
$c = $_POST['unit'];
$d = $_POST['pdesc'];
$e = $_POST['unitcost'];
$sql="INSERT INTO save_reorder(qty,unit,pdesc,unit_cost) VALUES('$b','$c','$d','$e')";
$result=$conn->prepare($sql);
$result->execute();
header("location:reorder.php");
 ?>

<?php
include('connect.php');
$sql="DELETE FROM brand";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM eq_desc";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM eq_inv";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM empl_tbl";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM deployment";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM position";
$result= $conn->prepare($sql);
$result->execute();
$sql="DELETE FROM dept_tbl";
$result= $conn->prepare($sql);
$result->execute();

 ?>

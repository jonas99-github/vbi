<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>
<body>
<?php
$position=$_SESSION['SESS_ROLE'];
if($position=='Admin Staff'){
header("location:dashboard.php");
}
if($position=='IT Admin'){
header("location:dashboard.php");
}
if($position=='HR and Admin Manager'){
header("location:equipment.php?section=");
}
if($position=='HR Generalist'){
header("location:search.php");
}
if($position=='President'){
	header("location:users.php");
}
 ?>

</body>
</html>

<?php
include('header.php');
$a = $_POST['user_id'];
$c = $_POST['firstname'];
$d = $_POST['lastname'];
$e = $_POST['role'];
$f = $_POST['username'];
$g = $_POST['password'];
$h = $_POST['date_created'];

if($e=='President'){
	echo "<div style= 'margin-left:400px;color:red;margin-top:200px;'><strong>Transaction failed. The system cannot add more than one President Account.</strong><br><br><a href='users.php' class='btn btn-success' style='margin-left:200px;'>Go back to users page</a></div>";
}
else{
// query
$sql = "INSERT INTO usr_tbl(usr_id,empl_firstname,middlename,empl_lastname,role,usr,psw,date_created)
VALUES ('$a','$c','$i','$d','$e','$f','$g','$h')";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("location:users.php");
}
?>

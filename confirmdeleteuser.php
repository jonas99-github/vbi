<?php
include "header.php";
$a=$_GET['user'];
$sql="SELECT * FROM usr_tbl WHERE usr_id = '$a' ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$b=$row['empl_firstname'];
	$c=$row['empl_lastname'];
echo "<div style='margin-top:200px;'>";
echo "<label>" . "You have tried to delete user <strong>" . $b . " " . $c . "</strong></label><br>";
echo 'Press "Yes" to delete user. Press "No" to cancel deletion: ';
echo "<a href='deleteuser.php?id=$a' class='btn btn-danger'>Yes</a>" . " " . "<a href='users.php' class='btn btn-success'>No</a>";
echo "</div>";
}
?>
<?php
session_start();
include('connect.php');
$a = $_POST['loc_id'];
$b = $_POST['location'];
$c = $_POST['date_created'];
//HttpQueryString
$sql ="INSERT into location (loc_id,location,date_created) VALUES('$a','$b','$c')";

if (mysqli_query($conn, $sql)) {
     header("location: addloc.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 ?>

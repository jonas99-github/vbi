<?php
include ('connect.php');

///new data
$id = $_POST['id'];
$a = $_POST['empl_firstname'];
$b = $_POST['empl_lastname'];
$c = $_POST['role'];
$d = $_POST['usr'];
$e = $_POST['psw'];
$f = $_POST['date_created'];

 //query
 $sql = "UPDATE usr_tbl SET empl_firstname='$a', empl_lastname='$b',  role='$c', usr='$d', psw='$e', date_created='$f' WHERE usr_id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: users.php");
} else {
    echo "Error updating record: " . $conn->error;
}


 ?>

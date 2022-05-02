<?php
include 'connect.php';
session_start();
$a = $_GET['val'];
$b = $_GET['emp'];
$_SESSION['transfer_sess']=$a;
header("location:about.php?section=deployment_history&action=&selaction=&emp_no=$b")

?>

<?php
include "connect.php";
$a=$_POST['q'];
header("location:dashboard.php?q=$a");
 ?>

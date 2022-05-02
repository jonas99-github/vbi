<?php
include "connect.php";
$a=$_POST['q'];
header("location:equipment.php?section=all&q=$a");
 ?>

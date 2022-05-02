<?php
include "header.php";
$a=$_GET['q'];
$state=$_GET['state'];
$_SESSION['state']=$state;
if(!empty($a)){
header("location:equipment.php?section=&q=$a");
}
if(empty($a)){
  header("location:equipment.php?section=");
}
 ?>

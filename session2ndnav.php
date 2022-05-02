<?php
include "header.php";
$a=$_GET['q'];
$b=$_GET['section'];
$_SESSION['section']=$b;
if(!empty($a)){
header("location:equipment.php?section=&q=$a");
}
if(empty($a)){
  header("location:equipment.php?section=");
}
 ?>

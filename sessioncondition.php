<?php
include "header.php";
$a=$_GET['q'];
$condition=$_GET['condition'];
$_SESSION['condition']=$condition;
if(!empty($a)){
header("location:equipment.php?section=&q=$a");
}
if(empty($a)){
  header("location:equipment.php?section=");
}
 ?>

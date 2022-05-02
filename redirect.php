<?php
$a=$_GET['p'];
if($a=='dept'){
  header("location:adddept.php");
}
else if ($a=='pos'){
  header("location:addposition.php");
}
else if($a=='deploy'){
  header("location:adddeply.php");
}
else if($a=='desc'){
  header("location:description.php");
}
else if($a=='brand'){
  header("location:description.php");
}
else{
    header("location:location.php");
}
 ?>

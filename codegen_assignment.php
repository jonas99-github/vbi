<?php
include "connect.php";
session_start();
$e=$_POST['emp_no'];
$f=$_POST['loc'];
$_SESSION['loc_assign']=$f;

//PARId
function createRandomPARId() {
  $chars = "003232303232023232023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}
$parid='PAR-'.createRandomPARId();
header("location:deleteall_assignment.php?emp_no=$e&parid=$parid&remark=");
?>

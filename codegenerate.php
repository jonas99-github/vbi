<?php
include "connect.php";
session_start();
$e=$_GET['emp_no'];
$_SESSION['empl_assign']=$e;
//ASNo
function createRandomASno() {
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
$asno='AS-'.createRandomASno();
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
header("location:deleteall.php?emp_no=$e&asno=$asno&parid=$parid&remark=");
?>

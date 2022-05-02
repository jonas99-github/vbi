<?php
include "connect.php";
session_start();
$e=$_POST['loc'];
$a=$_POST['choosepar'];
$_SESSION['empl_assign']=$e;
echo $e;
echo $a;


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

header("location:deleteall_undis.php?loc_proj=$e&asno=$asno&parid=$a&remark=");

?>

<?php
include "connect.php";
session_start();
$emp=$_POST['emp'];
$aboutname=$_POST['aboutname'];
$a = $_POST['employeinfo'];
$b = $_POST['locc'];
$c = $_POST['date_transfered'];
$d = $_POST['employeeinfo'];
$_SESSION['aboutname']=$aboutname;

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

$sql2="SELECT * FROM addeq_temp WHERE emp_no='$emp'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $inv=$row2['invid'];
  $remark=$row2['remark_temp'];
  $par=$row2['par_transfer'];
$sql="INSERT INTO temp_assign(assign_id,par_id,eq_inv_id,empl_no,remarks_assign,par_tempassign) VALUES('$asno','$parid','$inv','$emp','$remark','$par')";
$result = $conn->prepare($sql);
$result->execute();
}
$sql3="DELETE FROM addeq_temp";
$result3=$conn->prepare($sql3);
$result3->execute();
header("location:assign-transfer.php?emp_no=$a&asno=$asno&parid=$parid&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&selection=&rad=&loc=&remark=&employee=$d");
?>

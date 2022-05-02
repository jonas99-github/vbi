<?php
include "connect.php";
$l=$_POST['aboutname'];
$emp=$_POST['empl'];
$prid=$_POST['prid'];
$a=$_POST['asid'];
$b=$_POST['invi'];
$c=$_POST['tag'];
$d=$_POST['eqdesc'];
$e=$_POST['brand'];
$f=$_POST['serial'];
$g=$_POST['model'];
$h=$_POST['rad'];
$i=$_POST['selection'];
$j=$_POST['loc'];
$k=$_POST['par_tempassign'];



$sql3="SELECT * FROM eq_inv WHERE eq_inv_id='$b'";
$result3=mysqli_query($conn, $sql3);
while($row3=mysqli_fetch_assoc($result3)){
  $emp=$row3['empl_no'];
}
if(empty($emp)){
$sql2 = "UPDATE eq_inv SET eq_condition='Available/Unassigned' WHERE eq_inv_id='$b'";
$result2 = $conn->prepare($sql2);
$result2->execute();
$sql ="DELETE from temp_assign WHERE eq_inv_id='$b'";
$result = $conn->prepare($sql);
$result->execute();
}
else{
  $sql4 = "UPDATE eq_inv SET par='$k' WHERE eq_inv_id='$b'";
  $result4 = $conn->prepare($sql4);
  $result4->execute();

  $sql ="DELETE from temp_assign WHERE eq_inv_id='$b'";
  $result = $conn->prepare($sql);
  $result->execute();
}
header("location:assign-transfer.php?emp_no=$emp&asno=$a&parid=$prid&inv_id=$b&tag_no=$c&eqdesc=$d&brand=$e&serial_no=$f&model_no=$g&rad=$h&selection=$i&loc=$j&remark=&employee=$l");

 ?>

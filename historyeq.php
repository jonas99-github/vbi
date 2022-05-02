<?php
include "connect.php";
$a=$_POST['id'];
$sql="SELECT * FROM eq_history WHERE eqid='$a' ORDER BY hid DESC";
$result=mysqli_query($conn,$sql);
$temp_arr=[];
while($b=mysqli_fetch_object($result)){

  $temp_arr[]=$b;
}
echo json_encode($temp_arr);

?>

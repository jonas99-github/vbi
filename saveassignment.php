<?php
include 'connect.php';
$b = $_POST['prid'];
$c = $_POST['empl'];
$d = $_POST['invid'];
$e = $_POST['brand'];
$f = $_POST['serial'];
$g = $_POST['model'];
$h = $_POST['loc'];
$i = $_POST['eqdesc'];
$j = $_POST['rad'];
$k = $_POST['selection'];
$l = $_POST['loc_assign'];
$m = $_POST['date_issued'];
session_start();
$o=$_SESSION['equipment'];
foreach($o as $data){
  $value=$data['eq_inv_id'];
  $sql6="SELECT * FROM eq_inv WHERE eq_inv_id='$value' ";
  $result6=mysqli_query($conn,$sql6);
  while($row6=mysqli_fetch_assoc($result6)){
    $invid=$row6['eq_inv_id'];
    $eqdesc=$row6['eqdesc'];
    $brand=$row6['brand'];
    $serial=$row6['serial_no'];
    $model=$row6['model_no'];
    $ipadd=$row6['ip_add'];
    $state=$row6['eq_state'];
    $remarks=$row6['remarks'];
    $sql5="INSERT INTO prty_ackn_rcpt(par_no,transfer_empl_no,invid_transfer,eqdesc_transfer,brand_transfer,serial_transfer,model_transfer,ipadd_transfer,remarks_transfer,location_transfer,dateissued) VALUES('$b','$c','$invid','$eqdesc','$brand','$serial','$model','$ipadd','$remarks','$l','$m')";
    $result5=$conn->prepare($sql5);
    $result5->execute();
  }
$sql2 ="UPDATE eq_inv SET empl_no='$c',date_issued='$m',curr_equip_loc='$l',par='$b',remarks='$remarks', eq_condition='assigned' WHERE eq_inv_id='$value' ";
$result2 = $conn->prepare($sql2);
$result2->execute();


$type="Assigned an Equipment";
$pos=$_SESSION['SESS_ROLE'];
date_default_timezone_set('Asia/Manila');
$date=date('F j, Y g:i:a  ');
$sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date,transac_loc,transac_empl) VALUES('$type','$pos','$value','$date','$l','$c')";
$result7 = $conn->prepare($sql7);
$result7->execute();

$sql4="INSERT INTO eq_history(eqid,employee_no,par_no,date_issued_his) VALUES('$value','$c','$b','$m')";
$result4=$conn->prepare($sql4);
$result4->execute();
}
header("location:undistributed.php?loc=$l&assign=yes");

?>

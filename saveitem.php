<?php
include("connect.php");
session_start();
$id=$_POST['invid'];
$user=$_SESSION['SESS_ROLE'];
$a = $_POST['eqdesc'];
$a2 = $_POST['brand'];
$b = $_POST['tag_no'];
$c = $_POST['serial_no'];
$d = $_POST['model_no'];
$e = $_POST['ip_add'];
$f = $_POST['eq_state'];
$g = $_POST['eq_condition'];
$h = $_POST['date_purch'];
$i = $_POST['price'];
$j = $_POST['loc'];
$k = $_POST['remarks'];

date_default_timezone_set('Asia/Manila');
$type="Added an Equipment";
$date=date('F j, Y g:i:a  ');
$sql = "INSERT INTO eq_inv(eq_inv_id,eqdesc,brand,tag_no,serial_no,model_no,ip_add,eq_state,eq_condition,date_purch,price,curr_equip_loc,remarks) VALUES ('$id','$a','$a2','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')";

if (mysqli_query($conn, $sql)) {

$sql2="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date,transac_loc,transac_remark) VALUES ('$type','$user','$id','$date','$j','$k')";
$result2 = $conn->prepare($sql2);
$result2->execute();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("location:equipment.php?section=addeq");
?>

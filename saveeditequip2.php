<?php
include "connect.php";
$emp = $_POST['emp'];
$a = $_POST['id'];
$b = $_POST['tag'];
$c = $_POST['serial'];
$d = $_POST['model'];
$e = $_POST['ip'];
$f = $_POST['state'];
$g = $_POST['condition'];
$h = $_POST['date_iss'];
$i = $_POST['date_purch'];
$j = $_POST['price'];
$k = $_POST['loc'];
$l = $_POST['remarks'];
$sql="UPDATE eq_inv set tag_no='$b',serial_no='$c',model_no='$d',ip_add='$e',eq_state='$f',eq_condition='$g',date_issued='$h',date_purch='$i',price='$j',curr_equip_loc='$k',remarks='$l' WHERE eq_inv_id='$a'";

if ($conn->query($sql) === TRUE) {
  header("location:about.php?section=equipment&action=&selaction=equipment&emp_no=$emp");
} else {
    echo "Error updating record: " . $conn->error;
}
?>

<?php
session_start();
include('connect.php');
$a = $_POST['assign_id'];
$b = $_POST['parid'];
$c = $_POST['inv_id']; 
$d = $_POST['deploy_no'];
$e = $_POST['remarks_assign'];
$f = $_POST['selectdrop'];
$g = $_POST['loca'];
$h = $_POST['radbut'];


//HttpQueryString
$sql = "INSERT into temp_assign_undis (temp_assign_id,temp_par_id,temp_eq_inv_id,temp_deploy_no,temp_remarks_assign) VALUES('$a','$b','$c','$d','$e')";
if ($conn->query($sql) === TRUE) {
echo "success";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql2 = "UPDATE eq_inv SET eq_condition='Undistributed' WHERE eq_inv_id='$c'";
$result2 = $conn->prepare($sql2);
$result2->execute();

header("location:assign_undistributed.php?loc_proj=$d&asno=$a&parid=$b&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&rad=$h&selection=$f&loc=$g");


?>

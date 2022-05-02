<?php
include "connect.php";
$a=$_POST['number_empl'];
$sql="SELECT * FROM eq_inv WHERE empl_no='$a'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0){
  echo "Unable to delete profile: Assigned equipment to this employee must be remove first. Please coordinate with the IT ADMIN to remove the assigned equipment.";
}
else{
//echo "Profile deleted successfully";
$sql3="SELECT * FROM empl_tbl WHERE empl_no='$a'";
$result3=mysqli_query($conn,$sql3);
while($row3=mysqli_fetch_assoc($result3)){
$b=$row3['empl_firstname'];
$c=$row3['middlename'];
$d=$row3['empl_lastname'];
$e=$row3['position'];
$f=$row3['dept_id'];
$g=$row3['empl_status'];
$h=$row3['date_created'];
$i=$row3['deploy'];
$j=$row3['hired'];
$k=$row3['remarks_prof'];

$sql4="INSERT into archive(arch_empl_no,arch_firstname,arch_middlename,arch_lastname,arch_position,arch_dept_id,arch_status,arch_date_created,arch_deploy,arch_hired,arch_remarks) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')";
if (mysqli_query($conn, $sql4)) {

    $sql2="DELETE FROM empl_tbl WHERE empl_no='$a'";
    $result2=$conn->prepare($sql2);
    $result2->execute();
        echo "Profile deleted successfully!";

} else {
      echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
}

}
}
 ?>

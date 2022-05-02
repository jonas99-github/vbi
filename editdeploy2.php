<?php
include "connect.php";
$a = $_POST['deployid'];
$b = $_POST['deployment'];    //post is working

$sql2="SELECT * FROM deployment WHERE deployment='$b'";
$result2=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result2);
 if ($count > 0) {
   $row2=mysqli_fetch_assoc($result2);
      if($b==$row2["deployment"]){
        echo "Deployment already exist";
      }
}
else{
  $sql="UPDATE deployment SET deply_id='$a', deployment='$b' WHERE deply_id='$a'";
  $result = $conn->prepare($sql);
  $result->execute();

  session_start();
  $type="Edited a deployment";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();
  echo "Updated successfully!";
}

 ?>

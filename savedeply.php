<?php
session_start();
include('connect.php');
$a = $_POST['deply_id'];
$b = $_POST['deploy'];
$c = $_POST['date_created'];
//HttpQueryString
$sql ="INSERT into deployment (deply_id,deployment,date_created) VALUES('$a','$b','$c')";

if (mysqli_query($conn, $sql)) {
  session_start();
  $type="Added a deployment";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
  $result7 = $conn->prepare($sql7);
  $result7->execute();
     header("location: adddeply.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 ?>

<?php
include "connect.php";
$a = $_POST['descid'];
$b = $_POST['eqdesc'];//post is working

$sql2="SELECT * FROM eq_desc WHERE eqdesc='$b'";
$result2=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result2);
 if ($count > 0) {
   $row2=mysqli_fetch_assoc($result2);
      if($b==$row2["eqdesc"]){
        echo "Equipment description already exist";
      }
        $conn->close();
}
else{
  $sql="UPDATE eq_desc SET eq_desc_id='$a', eqdesc='$b' WHERE eq_desc_id='$a'";
  $result = $conn->prepare($sql);
  $result->execute();
  session_start();
  $type="Edited an Equipment Description";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
  $result3 = $conn->prepare($sql3);
  $result3->execute();

  echo "Updated successfully!";
  $conn->close();
}

 ?>

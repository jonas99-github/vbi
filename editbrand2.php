<?php
include "connect.php";
$a = $_POST['brandid'];
$b = $_POST['brand'];

$sql2="SELECT * FROM brand WHERE brand='$b'";
$result2=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result2);
 if ($count > 0) {
   $row2=mysqli_fetch_assoc($result2);
      if($b==$row2["brand"]){
        echo "Brand name already exist";
      }
}
else{
  $sql="UPDATE brand SET brandid='$a', brand='$b' WHERE brandid='$a'";
  $result = $conn->prepare($sql);
  $result->execute();
  session_start();
  $type="Edited a Brand";
  $pos=$_SESSION['SESS_ROLE'];
  date_default_timezone_set('Asia/Manila');
  $date=date('F j, Y g:i:a  ');
  $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
  $result3 = $conn->prepare($sql3);
  $result3->execute();
  echo "Updated successfully!";
}

 ?>

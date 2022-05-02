<?php
include "connect.php";
$a = $_POST['brand'];
$sql2="SELECT * FROM brand WHERE brandid='$a'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $brand=$row2['brand'];

    $sql="DELETE FROM brand WHERE brandid='$a'";
      if (mysqli_query($conn, $sql)) {
        session_start();
        $type="Deleted an Equipment Brand";
        $pos=$_SESSION['SESS_ROLE'];
        date_default_timezone_set('Asia/Manila');
        $date=date('F j, Y g:i:a  ');
        $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$brand','$date')";
        $result3 = $conn->prepare($sql3);
        $result3->execute();

    echo "The following EQ Description was deleted: ". $a." "."- ".$row2['brand'];
      $conn -> close();

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>

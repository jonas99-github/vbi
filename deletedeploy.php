<?php
include "header.php";
$a = $_GET['deploy'];
$sql2="SELECT * FROM deployment WHERE deply_id='$a'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){

    $sql="DELETE FROM deployment WHERE deply_id='$a'";
      if (mysqli_query($conn, $sql)) {
$b=$row2['deployment'];
        $type="Deleted a deployment";
        $pos=$_SESSION['SESS_ROLE'];
        date_default_timezone_set('Asia/Manila');
        $date=date('F j, Y g:i:a  ');
        $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
        $result7 = $conn->prepare($sql7);
        $result7->execute();

    echo "The following Deployment was deleted:&nbsp". $a."&nbsp"."- ".$row2['deployment'];

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<br><br><br>
<!--<label>Click this button to UNDO the operation  :</label>&nbsp<button class="btn btn-primary">UNDO</button>-->

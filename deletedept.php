<?php
include "header.php";
$a = $_GET['dept'];
$sql2="SELECT * FROM dept_tbl WHERE dept_id='$a'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
$b=$row2['dept_name'];
    $sql="DELETE FROM dept_tbl WHERE dept_id='$a'";
      if (mysqli_query($conn, $sql)) {

        $type="Deleted a department";
        $pos=$_SESSION['SESS_ROLE'];
        date_default_timezone_set('Asia/Manila');
        $date=date('F j, Y g:i:a  ');
        $sql7="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$b','$date')";
        $result7 = $conn->prepare($sql7);
        $result7->execute();
    echo "The following Department was deleted:&nbsp". $a."&nbsp"."- ".$row2['dept_name'];

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>
<br><br><br>
<!--<label>Click this button to UNDO the operation  :</label>&nbsp<button class="btn btn-primary">UNDO</button>-->

<?php
include "connect.php";
$a = $_POST['desc'];

$sql2="SELECT * FROM eq_desc WHERE eq_desc_id='$a'";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  $desc=$row2['eqdesc'];

    $sql="DELETE FROM eq_desc WHERE eq_desc_id='$a'";
      if (mysqli_query($conn, $sql)) {
        session_start();
        $type="Deleted a Description";
        $pos=$_SESSION['SESS_ROLE'];
        date_default_timezone_set('Asia/Manila');
        $date=date('F j, Y g:i:a  ');
        $sql3="INSERT INTO transac_inv(transac_type,transac_pos,transac_eqid,transac_date) VALUES('$type','$pos','$desc','$date')";
        $result3 = $conn->prepare($sql3);
        $result3->execute();

    echo "The following EQ Description was deleted: ". "ID: " . $a." "."- ".$row2['eqdesc'];


    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>

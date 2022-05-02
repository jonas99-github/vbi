<?php
$a=$_POST['loc'];
echo $a;
header("location:undistributed.php?loc=$a&assign=yes");
?>
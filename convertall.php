<?php
include "connect.php";
$sql13="UPDATE eq_inv SET eq_condition='Available/Unassigned'";
$result13 = $conn->prepare($sql13);
$result13->execute();
?>

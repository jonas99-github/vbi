<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>

<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='IT Admin'){
    ?>
<div class="first-header">
  <ul>
  <li><a href="equip_assign.php">Equipment Assignments</a><li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="">Make Reorder Request</a><li>
  <li><a href="">Monitoring</a><li>
  <li><a href="">Activity Log</a><li>
  <li style="float:right "><a href="logout.php">LOGOUT</a></li>
  <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'];?></li>
  </ul>
</div>
    <?php
}
if($position=='Admin Staff')
{
  ?>
  <div class="first-header-astaff">
    <ul>
  <li><a href="equip_assign.php">Equipment Assignments</a><li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="">Monitoring</a><li>
  <li><a href="">Activity Log</a><li>
  <li style="float:right "><a href="logout.php">LOGOUT</a></li>
  <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'];?></li>
  </ul>
</div>
<?php
}
?>

        <div class="aboutcontent-div"><br><br>
<center><h2>Equipment Assignment</h2></center>

<div class="profile-div">
    <br><br>

</div>
</body>
<html>

<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>

<body>

<div class="header"><h2>Reports</h2><?php echo "Welcome " . $_SESSION['SESS_USERNAME'] ."   "; ?>
<a href="logout.php">LOGOUT</a>
</div>
<ul>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="equip_assign.php">Equipment Assignment</a></li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
	<li><a href="newequipment.php">New equipment</a></li>
	<li><a href="status.php">Status</a></li>
  <li><a href="par.php">Prop. Acknowledgement Receipts</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="actlog.php">Activity Log</a></li>

</ul>


<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="">Home</a></li>
    <li><a href="">About</a></li>
    <li><a href="">Products</a>
      <ul class="submenu">
        <li><a href="">Tops</a></li>
        <li><a href="">Bottoms</a></li>
        <li><a href="">Footwear</a></li>
      </ul>
    </li>
    <li><a href="">Contact us</a></li>
  </ul>
</nav>
</body>
<html>

<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>

<body>

<div class="header"><h2>Activity Log</h2><?php echo "Welcome " . $_SESSION['SESS_USERNAME'] ."   "; ?>
<a href="logout.php">LOGOUT</a>
</div>
<ul>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="equip_assign.php">Equipment Assignment</a></li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="par.php">Prop. Acknowledgement Receipts</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="actlog.php">Activity Log</a></li>

</ul>


<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="equipment.php">View all equipment</a></li>
    <li><a href="new_equip.php">New Equipment</a></li>
    <li><a href="person_ic.php">Person In charge</a></li>
    <li><a href="repair.php">For Repair</a></li>
    <li><a href="actlog.php">Activity Log</a></li>
      </ul>
    </li>
    <li><a href="">Contact us</a></li>
  </ul>
</nav>
</body>
<html>

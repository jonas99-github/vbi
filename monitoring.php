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
  <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="130" id="imgnav"></a>
  <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
  <li><a href="dashboard.php">Employees</a><li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="monitoring.php">Monitoring</a><li>
  <li><a href="">Make Reorder Request</a><li>
  <li><a href="users.php">Accounts</a></li>
  <li style="float:right "><a href="logout.php">LOGOUT</a></li>
  <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'];?></li>
  </ul>
</div>
    <?php
}
if($position=='Admin Staff')
{
  ?>
  <div class="first-header-astaff">
    <ul>
    <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
    <li><a href="equipment.php">Equipment Inventory</a></li>
    <li><a href="monitoring.php">Monitoring</a><li>
    <li><a href="">Make Reorder Request</a><li>
    <li><a href="">Activity Logs</a><li>
    <li><a href="users.php">Accounts</a></li>
    <li style="float:right "><a href="logout.php">LOGOUT</a></li>
    <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
  </ul>
</div>
<?php
}
if($position=='HR and Admin Manager')
{
  ?>
  <div class="first-header">
    <ul>
      <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="130" id="imgnav"></a>
      <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
      <li><a href="transactions.php">Transactions</a><li>
      <li><a href="equipment.php">Equipment Inventory</a></li>
      <li><a href="monitoring.php">Monitoring</a><li>
      <li><a href="users.php">Accounts</a></li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
  </div>
  <?php
}
if($position=='IT Admin')
{
  ?>
<div class="vertical-nav">
  <ul>
      <li><a href="monitoring.php">Transaction Feeds</a></li>
      <li><a href="undistributed.php">Undistributed Equipment</a></li>
      <li><a href="">Incomplete Data</a></li>
      <li><a href="repair.php">For Repair</a></li>
        </ul>
        </div>
        <?php
      }
      if($position=='HR and Admin Manager')
      {
        ?>
        <div class="vertical-nav">
          <ul>
              <li><a href="">Equipment Expenses</a></li>
              <li><a href="">Undistributed Equipment</a></li>
              <li><a href="">Incomplete Data</a></li>
              <li><a href="">For Repair</a></li>
                </ul>
                </div>
              <?php
            }
               ?>
        <div class="aboutcontent-div"><br><br>
<center><h2>Equipment Expenses</h2></center>


<div class="profile-div">
    <br><br>
<h1><i>-->Under Construction<--</h1>
  </div>
</div>
<div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
<html>

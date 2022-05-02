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
?>
<div class="vertical-nav">
  <ul>
    <li><a href="monitoring.php">Transaction Feeds</a></li>
    <li><a href="undistributed.php">Undistributed Equipment</a></li>
    <li><a href="">Incomplete Data</a></li>
    <li><a href="repair.php">For Repair</a></li>
        </ul>
        </div>
        <div class="aboutcontent-div"><br><br>
<center><h2>For Repair Equipment</h2></center>

<div class="profile-div">
    <br><br>
  <table id = "equipments" >
  <thead>
    <tr>
    <th width="12%">Date Issued</th>
    <th width="12%">Employee No.</th>
    <th width="12%">Person In Charge</th>
        <th width="12%">Assignment ID</th>
          <th width="12%">Remarks</th>
  </tr>
  </thead>

  <tbody>
<?php
  $sql=("SELECT * FROM eq_assign_tbl ORDER BY date_assigned DESC");
  $result=mysqli_query($conn, $sql);
  for($i=0; $row = mysqli_fetch_assoc($result); $i++){
    $emp_no=$row['empl_no'];
    $sql2=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
      $result2=mysqli_query($conn, $sql2);
  for($i=0; $row2 = mysqli_fetch_assoc($result2); $i++){
    $fname=$row2['empl_firstname'];
    $lname=$row2['empl_lastname'];
    $middlename=$row2['middlename'];
  }
  ?>
  <td><?php echo $row['date_assigned']; ?></td>
  <td><?php echo $row['empl_no']; ?></td>
  <td><?php echo $row['eq_assign_id']; ?></td>
  <td><?php echo $row['serial_no']; ?></td>
  <td><?php echo $row['remarks']; ?></td>
</tbody>
  <?php
  }
  ?>
  </table>
  </div>
</div>
</body>
<html>

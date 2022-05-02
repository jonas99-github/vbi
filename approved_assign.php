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
<div class="vertical-nav">
  <img src="icon/logo2.png" alt="logo" height= "60" widtht="60" id="assign-img" >
  <ul>
    <li><a href="equip_assign.php">Make Assignment</a></li>
      <li><a href="pending_assign.php">Pending</a></li>
        <li><a href="approved_assign.php">Approved</a></li>
          <li><a href="par.php">Propoerty Acknowledgement Receipt</a></li>
        </ul>
        </div>
        <div class="aboutcontent-div"><br><br>
<center><h2>Approved Equipment Assigments</h2></center>

<div class="profile-div">
    <br><br>
  <table id = "equipments" >
  <thead>
    <tr>
    <th width="12%">Date Assigned</th>
    <th width="12%">Employee No.</th>
    <th width="12%">First Name</th>
    <th width="12%">Middle Name</th>
    <th width="12%">Last Name</th>
      <th width="12%">Serial No.</th>
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
  <td><?php echo $row['eq_assign_id']; ?></td>
  <td><?php echo $row['empl_no']; ?></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$fname}</a><br>"; ?></a></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$middlename}</a><br>"; ?></a></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$lname}</a><br>"; ?></a></td>
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

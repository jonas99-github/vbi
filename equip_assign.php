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
  <li><a href="equip_assign.php">Equipment Assignment</a><li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="">Make Reorder Request</a><li>
  <li><a href="">Monitoring</a><li>
  <li><a href="">Activity Log</a><li>
  <li><a href="users.php">Manage Users</a></li>
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
    <h5>-->Search Engine Here<--</h5>
    <li><a href="equip_assign.php?emp_no=<?php echo $emp_no;?>">Make Assignment</a></li>
      <li><a href="undistributed.php">Undistributed Equipment</a></li>
        </ul>
        </div>
        <div class="aboutcontent-div"><br><br>
<center><h2>Assign equipment</h2></center>


<div class="profile-div">
    <br><br>
  <table id = "equipments" >
  <thead>
    <tr>
    <th width="12%">Employee No.</th>
    <th width="12%">Employee First Name</th>
    <th width="12%">Employee Middlename</th>
    <th width="12%">Employee Last Name</th>
  </tr>
  </thead>

  <tbody>
<?php
  $sql=("SELECT * FROM empl_tbl ORDER BY empl_no");
  $result=mysqli_query($conn, $sql);
  for($i=0; $row = mysqli_fetch_assoc($result); $i++){
    $emp_no=$row['empl_no'];
  ?>
  <td><?php echo $row['empl_no']; ?></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['empl_firstname']}</a><br>"; ?></a></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['middlename']}</a><br>"; ?></a></td>
  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['empl_lastname']}</a><br>"; ?></a></td>
  </tbody>
  <?php
  }
  ?>
  </table>
  </div>
</div>
</body>
<html>

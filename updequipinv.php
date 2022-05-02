<!DOCTYPE html>
<body>
<?php
include('header.php');
$id=$_GET['id'];
$emp=$_GET['emp_no'];
$sql="SELECT * FROM eq_inv WHERE eq_inv_id='$id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
 ?>
 <div class="first-header">
   <ul>
     <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="130" id="imgnav"></a>
     <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
     <li><a href="dashboard.php">Employees</a></li>
     <li><a href="equipment.php">Equipment Inventory</a></li>
     <li><a href="monitoring.php">Monitoring</a><li>
     <li><a href="">Make Reorder Request</a><li>
     <li><a href="users.php">Accounts</a></li>
     <li style="float:right "><a href="logout.php">LOGOUT</a></li>
     <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
 </ul>
 </div>
 <div class="navi-mngempl">
   <h2 style="text-align:center;">Update Equipment</h2>
   <HR>
<form action="saveeditequip2.php" method="POST">
<input type="hidden" name="emp" value="<?php echo $emp;?>">
<span>ID </span>
<input type="text" name="id" value="<?php echo $row['eq_inv_id'];?>" readonly><br><br>
<span>Equipment Description: </span><input type="text" name="desc" value="<?php echo $row['eqdesc'];?>" style="height:30px; width:267px;" readonly>
<span>Brand: </span><input type="text" name="brand" value="<?php echo $row['brand'];?>" style="height:30px; width:267px;">
<span>Tag no.: </span>
<input type="text" name="tag" value="<?php echo $row['tag_no'];?>" style="height:30px; width:267px;"><br><br>
<span>Serial no.: </span>
<input type="text" name="serial" value="<?php echo $row['serial_no'];?>" style="height:30px; width:267px;">
<span>Model no.: </span>
<input type="text" name="model" value="<?php echo $row['model_no'];?>" style="height:30px; width:267px;">
<span>IP Address: </span>
<input type="text" name="ip" value="<?php echo $row['ip_add'];?>" style="height:30px; width:267px;"><br><br>
<span>State</span>
<select name="state" style="height:30px; width:267px;">
  <option><?php echo $row['eq_state'];?></option>
  <option>New</option>
  <option>Old</option>
  <option>Unknown state</option>
</select>
<span>Condition</span>
<select name="condition" style="height:30px; width:267px;">
  <option><?php echo $row['eq_condition'];?></option>
    <option>Available/Unassigned</option>
  <option>Assigned</option>
  <option>For repair</option>
  <option>Missing Parts</option>
  <option>Missing equipment</option>
  <option>Malfunctioning</option>
  <option>Refurbished</option>
  <option>Unknown condition</option>
</select>
<span>Date Issued: </span>
<input type="date" name="date_iss" value="<?php echo $row['date_issued'];?>" style="height:30px; width:267px;"><br><br>
<span>Date Purchased: </span><input type="date" name="date_purch" value="<?php echo $row['date_purch'];?>" style="height:30px; width:267px;">
<span>Price: </span>
<input type="text" name="price" value="<?php echo $row['price'];?>" style="height:30px; width:267px;">
<span>Location: </span>
<select name="loc" style="height:30px; width:267px;">

  <option><?php echo $row['curr_equip_loc'];?></option>
<?php
$sql2="SELECT * FROM deployment";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
  ?>
  <option><?php echo $row2['deployment'];?></option>
  <?php
}
 ?>
</select><br><br>
<span>Remarks: </span><textarea name="remarks" style="height:30px; width:267px;"><?php echo $row['remarks'];?></textarea><br><br>
<input type="submit" name="submit" value="Update" style="margin-left:500px; height:30px;width:265px;">
</form>
<?php
}
 ?>
</div>
</body>
</html>

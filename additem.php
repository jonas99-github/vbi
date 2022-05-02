<!DOCTYPE html>
<head><title>Verzontal PH</title>
  <?php include('header.php');
  //invid
  function createRandominvid() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {
      $num = rand() % 33;
      $tmp = substr($chars, $num, 1);
      $pass = $pass . $tmp;
      $i++;
    }
    return $pass;
  }
  $invid='EQ-'.createRandominvid();
  ?>
</head>
<body>
  <div class="first-header">
    <ul>
      <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="100" id="imgnav"></a>
      <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."</li>
      <li><a href="dashboard.php">Employees</a><li>
      <li><a href="equipment.php">Equipment Inventory</a></li>
      <li><a href="monitoring.php">Monitoring</a><li>
      <li><a href="">Make Reorder Request</a><li>
      <li><a href="users.php">Accounts</a></li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
  </div>
  	<div class="navi-mngempl">
      <h2 style="text-align:center">Add Equipment</h2>
      <hr>

  <div class="form-addempl">
<form action="saveitem.php" method="POST" class="form-addempl">
<span>ID </span><input type="text" name="invid" value="<?php echo $invid;?>" style="width:265px;" readonly><br><br>
<span>Equipment Description </span><br><select name="eqdesc" style="height:30px;width:265px;" required>
      <option></option>
<?php
$sql=("SELECT * FROM eq_desc GROUP BY eqdesc");
$result=mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
 ?>
  <option><?php echo $row['eqdesc'];?></option>
  <?php
   }
   ?>
</select><br>

<span>Brand </span><br><select name="brand" style="height:30px;width:265px;" required>
      <option></option>
<?php
$sql=("SELECT * FROM brand GROUP BY brand");
$result=mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
 ?>
  <option><?php echo $row['brand'];?></option>
  <?php
   }
   ?>
</select><br>
  Tag No.<br> <input type="text" name="tag_no" style="height:30px;width:265px;"><br>
  Serial No. <br><input type="text" name="serial_no" style="height:30px;width:265px;"><br>
  Model No. <br><input type="text" name="model_no" style="height:30px;width:265px;"><br>
  IP Address <br> <input type="text" name="ip_add" style="height:30px;width:265px;"><br>
  <span>State <br></span>
<select name="eq_state" style="height:30px;width:265px;">
  <option></option>
  <option>New</option>
  <option>Old</option>
</select><br>
<span>Condition </span><br>
<select name="eq_condition">
<option></option>
<option>Available/Unassigned</option>
<option>For repair</option>
<option>Missing parts</option>
<option>Missing</option>
<option>Malfunctioning</option>
<option>Condemned</option>
</select><br>
  <span>Date Purchased </span><br>
  <input type="date" name="date_purch" style="height:30px;width:265px;"><br>
  <span>Price </span><br>
  <input type="text" name="price"><br>
  <span>Equipment Location: </span><br>
  <select name="loc" style="height:30px;width:265px;" required>
        <option></option>
  <?php
  $sql=("SELECT * FROM deployment");
  $result=mysqli_query($conn, $sql);
  for($i=0; $row = mysqli_fetch_assoc($result); $i++){
   ?>
    <option><?php echo $row['deployment'];?></option>
    <?php
     }
     ?>
  </select><br>

<span>Remarks </span><br><textarea name="remarks" style="height:30px;width:265px;"></textarea><br>
  <input type="submit" value="Submit" style="width:267px;">
</form>



</body>
</html>

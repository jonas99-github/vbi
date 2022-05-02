<!DOCTYPE html>
<head><title>Verzontal Equip. Monitoring</title>
<?php
include ("header.php");
$parid=$_GET['parid'];
$inv_id=$_GET['inv_id'];
$tag=$_GET['tag_no'];
$eqdesc=$_GET['eqdesc'];
$brand=$_GET['brand'];
$serial_no=$_GET['serial_no'];
$model_no=$_GET['model_no'];
$emp_no=$_GET['emp_no'];
$selection=$_GET['selection'];
$rad=$_GET['rad'];
$loc=$_GET['loc'];
$remark=$_GET['remark'];
$assignemp=$_SESSION['loc_assign'];
$a=$_SESSION['equipment'];
?>
</head>
<body>
  <div class="first-header" style="padding:23px;">
    <ul>
    <a href="" style="float:left; margin-top:5px;margin-left:0px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li>Assignment of undistributed equipment</li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'];?></li>
    </ul>
  </div>

<div style="border: 0.5px solid #D3D3D3;margin:10px;border-radius:10px;background-color:white;">
<?php
  $sqla1=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
  $resulta1=mysqli_query($conn, $sqla1);
  while($rowa1 = mysqli_fetch_assoc($resulta1)){
    $dept=$rowa1['dept_id'];
    ?>
    <div style="background-color:; text-align:right; position:absolute;margin:10px;">
      <strong style="margin-right:100px;font-size:20px;"><a href="about.php?section=equipment&action=&selaction=equipment&emp_no=<?php echo $emp_no;?>" style="color:inherit; text-decoration:none;"><?php echo $rowa1['empl_firstname'];?> <?php echo " ";?> <?php echo $rowa1['middlename'];?> <?php echo " ";?> <?php echo $rowa1['empl_lastname'];?></a></strong><label style="text-align:right;margin-left:700px;">PAR/MR:&nbsp</label><input type="text" class="form-control" style="width:140px;" value="<?php echo $_GET['parid'];?>" readonly>
    </div><br>
    <?php
}
$sql11=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
$result11=mysqli_query($conn, $sql11);
while($row11 = mysqli_fetch_assoc($result11)){
 ?>
<div
<div class="assign-save">
<form action="saveassignment.php" method="POST" id="dd">
<span class="span-assign">DEP/PRJ SITE :</span><input type="text" class="form-control" name="loc_assign" value="<?php echo $row11['deploy'];?>" readonly style="background-color:#ccc;margin-left:23px;width:400px;"><br>
<span class="span-assign">Date Issued :</span><input type="date" style="width:180px;margin-left:36px;"class="form-control" name="date_issued" required><br>
<input type="hidden" name="prid" value="<?php echo $parid;?>">
<input type="hidden" name="empl" value="<?php echo $emp_no; ?>">
<input type="hidden" name="invid" value="<?php echo $inv_id;?>">
<input type="hidden" name="tag" value="<?php echo $tag; ?>">
<input type="hidden" name="eqdesc" value="<?php echo $eqdesc; ?>">
<input type="hidden" name="brand" value="<?php echo $brand; ?>">
<input type="hidden" name="serial" value="<?php echo $serial_no; ?>">
<input type="hidden" name="model" value="<?php echo $model_no; ?>">
<input type="hidden" name="rad" value="<?php echo $rad; ?>">
<input type="hidden" name="selection" value="<?php echo $selection; ?>">
<input type="hidden" name="loc" value="<?php echo $loc; ?>">

<?php
$sql99="SELECT * FROM empl_tbl WHERE empl_no='$emp_no'";
$result99=$conn->query($sql99);
$row99=$result99->fetch_assoc();
?>
<input type="hidden"  name="loc2" value="<?php echo $row99['deploy']; ?>">
<input type="checkbox" id="vehicle1" name="" value="" required> I affirm the correctness of the assignment of these equipment.
<input type="submit" class="btn btn-primary" value="SAVE" style="float:left;margin-left:1150px;width:88px;margin-top:0;height:30px;">
</form>
<form action="assignment_redirect.php" method="POST">
 <input type="hidden" name="loc" value="<?php echo $row99['deploy']; ?>">
 <input type="submit" class="btn btn-warning" value="CANCEL" style="margin-left:1245px;margin-top:-60px;height:30px;">
</form>
</div>
<?php
}
?>
</div><br>
<div id="srcdocsave">
  <table class= "tablediv-srcdoc-save">
  <thead>
    <tr>
    <th width="7%">ACTION</th>
    <th width="12%">PAR No</th>
    <th width="7%">EQ ID</th>
    <th width="12%">DESC</th>
    <th width="12%">BRAND</th>
    <th width="12%">SERIAL No</th>
    <th width="12%">MODEL No</th>
    <th width="12%">IP Add</th>
    <th width="12%">TAG No</th>
    <th width="12%">State</th>
    <th width="12%">Condition</th>
    <th width="12%">Remark/Comment</th>
  </tr>
  </thead>
  <?php
  $sql9=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
  $result9=mysqli_query($conn, $sql9);
  for($i=0; $row9 = mysqli_fetch_assoc($result9); $i++){
  }
  foreach($a as $data){
    $value=$data['eq_inv_id'];
  
  $sql8=("SELECT * FROM eq_inv WHERE eq_inv_id='$value' ");
  $result8=mysqli_query($conn, $sql8);
  for($i=0; $row8 = mysqli_fetch_assoc($result8); $i++){
    ?>
  <tbody>
    <td>
      <form action="remove_assigment.php#srcdocsave" method="POST">
        <input type="hidden" name="invi" value="<?php echo $row8['eq_inv_id']; ?>">
        <input type="hidden" name="prid" value="<?php echo $parid;?>">
        <input type="hidden" name="empl" value="<?php echo $emp_no;?>">
        <input type="hidden" name="tag" value="<?php echo $tag; ?>">
        <input type="hidden" name="eqdesc" value="<?php echo $eqdesc; ?>">
        <input type="hidden" name="brand" value="<?php echo $brand; ?>">
        <input type="hidden" name="serial" value="<?php echo $serial_no; ?>">
        <input type="hidden" name="model" value="<?php echo $model_no; ?>">
        <input type="hidden" name="rad" value="<?php echo $rad; ?>">
        <input type="hidden" name="selection" value="<?php echo $selection; ?>">
        <input type="hidden" name="loc" value="<?php echo $locat; ?>">
        <input type="submit" name="submit" value="Remove">
      </form></td>

   <td><?php echo $parid; ?></td>
   <td><?php echo $row8['eq_inv_id']; ?></td>
   <td><?php echo $row8['eqdesc']; ?></td>
   <td><?php echo $row8['brand']; ?></td>
   <td><?php echo $row8['serial_no']; ?></td>
   <td><?php echo $row8['model_no']; ?></td>
   <td><?php echo $row8['ip_add']; ?></td>
   <td><?php echo $row8['tag_no']; ?></td>
   <td><?php echo $row8['eq_state']; ?></td>
   <td><?php echo $row8['eq_condition']; ?></td>
   <td><?php echo $row8['remarks']; ?></td>
     <?php
   }
 }
     ?>
</tbody>
</table>
</div>
</body>
</html>

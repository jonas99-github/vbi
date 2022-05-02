<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php
include ("header.php");
$asno=$_GET['asno'];
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
$assignemp=$_SESSION['empl_assign'];
?>
<script type="text/javascript">
function handleSelect(elm)
{
window.location ="assign.php?emp_no=<?php echo $emp_no;?>&asno=<?php echo $_GET['asno'];?>&parid=<?php echo $_GET['parid']; ?>&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&rad=<?php echo $rad;?>&loc=<?php echo $loc;?>&selection="+elm.value;
}
function handleRadio(elm2)
{
window.location ="assign.php?emp_no=<?php echo $emp_no;?>&asno=<?php echo $_GET['asno'];?>&parid=<?php echo $_GET['parid']; ?>&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&loc=<?php echo $loc;?>&selection=<?php echo $selection;?>&rad="+elm2.value;
}
</script>
</head>
<body>
  <div class="first-header" style="padding:23px;">
    <ul>
    <a href="" style="float:left; margin-top:5px;margin-left:0px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li>Assign equipment</li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'];?></li>
    </ul>
  </div>

<?php
  $sqla1=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
  $resulta1=mysqli_query($conn, $sqla1);
  while($rowa1 = mysqli_fetch_assoc($resulta1)){
    $dept=$rowa1['dept_id'];
    ?>
    <div style="background-color:; text-align:right; position:absolute; margin-top:20px;margin-left:920px;">
      <strong style="margin-right:100px;font-size:20px;"><a href="about.php?section=equipment&action=&selaction=equipment&emp_no=<?php echo $emp_no;?>" style="color:inherit; text-decoration:none;"><?php echo $rowa1['empl_firstname'];?> <?php echo " ";?> <?php echo $rowa1['middlename'];?> <?php echo " ";?> <?php echo $rowa1['empl_lastname'];?></a></strong>
    </div>
    <?php
}

  $sql=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
  $result=mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    $locat=$row['deploy'];
 ?>
 <div class="srcdoc">
   <form action="temp_save.php#srcdocsave" method="POST" class="">
     <input type="hidden" name="selectdrop" value="<?php echo $selection;?>">
     <input type="hidden" name="loca" value="<?php echo $loc;?>">
     <input type="hidden" name="radbut" value="<?php echo $rad;?>">
     <span class="span-assign">Employee No. :</span><input type="text"  name="empl_no" readonly class="form-control" style="width:130px;margin-bottom:5px;"  value="<?php echo $emp_no;?>"><br>
     <span class="span-assign">First Name:</span><input type="text"  name="fname" class="form-control" style="width:130px;" readonly required value="<?php echo $row['empl_firstname'];?>">
     <span class="span-assign">Middle Name:</span><input type="text"  name="mname" class="form-control" style="width:130px;margin-bottom:5px;" readonly value="<?php echo $row['middlename'];?>">
     <span class="span-assign">Last Name:</span><input type="text" name="lname" class="form-control" style="width:130px;margin-bottom:5px;margin-left:2px;" readonly required value="<?php echo $row['empl_lastname'];?>"><br>
     <span class="span-assign">Assign ID:</span><input type="text" class="form-control" style="width:130px;margin-bottom:5px;margin-left:9px;" name="assign_id" value="<?php echo $asno;?>" readonly>
     <span class="span-assign">PAR ID:</span><input type="text" class="form-control" style="width:130px;" name="parid" value="<?php echo $parid;?>" readonly><br>
     <span><strong>EQ ID:</strong></span><input type="text" name="inv_id" class="form-control" style="width:130px;margin-left:30px;" value="<?php echo $inv_id;?>" readonly>
     <span class="span-assign">Tag No. :</span><input type="text" name="tag_no" class="form-control" style="width:130px;margin-bottom:5px;" readonly value="<?php echo $tag; ?>" ><br>
     <span class="span-assign">EQ Desc. :</span><input type="text" name="eq_desc" class="form-control" style="width:130px;margin-bottom:5px;margin-left:10px;" readonly  value="<?php echo $eqdesc;?>">
     <span class="span-assign">Brand :</span><input type="text" name="brand" class="form-control" style="width:130px;margin-bottom:5px;" readonly value="<?php echo $brand;?>"><br>
     <span class="span-assign">Serial <br> Number :</span><input type="text" name="serial_no" class="form-control" style="width:130px;margin-bottom:5px;margin-left:10px;" readonly value="<?php echo $serial_no;?>"><br>
     <span class="span-assign">Model Number :</span><input type="text" name="model_no" class="form-control" style="width:130px;margin-bottom:5px;" readonly value="<?php echo $model_no;?>">
     <span class="span-assign">Remarks :</span><textarea name="remarks_assign" class="form-control" style="width:130px;margin-bottom:5px;"><?php echo $remark;?></textarea><br><br>
     <center><input type="submit" name="submit"  class="btn btn-primary"value="ADD EQUIPMENT"></a><br></center>
</form>
</div>
<?php
}
?>

<div class="form-group col-md-4" style="margin-top:10px;margin-left:160px;position:absolute;">
<span style="margin-left:-173px;">Select equipment description and state:</span>
<select name="selectdesc" class="form-control" onchange="javascript:handleSelect(this)">
    <option>--<?php echo $selection;?>--</option>
        <?php
    $sql4="SELECT * FROM eq_desc GROUP BY eqdesc";
    $result4=mysqli_query($conn, $sql4);
    for($i=0; $row4 = mysqli_fetch_assoc($result4); $i++){
     ?>
     <option><?php echo $row4['eqdesc'];?></option>
<?php
}
     ?>
</select>
</div>
<div style="margin-top:40px;	margin-left:600px;position:relative;">
    <input type="radio" name="age" value="new" onchange="javascript:handleRadio(this)" <?php echo $_GET['rad'] === 'new' ? 'checked' : '' ?>>New
    <input type="radio" name="age" value="old" onchange="javascript:handleRadio(this)" <?php echo $_GET['rad'] === 'old' ? 'checked' : '' ?>>Old
    <input type="radio" name="age" value="Unknown State" onchange="javascript:handleRadio(this)" <?php echo $_GET['rad'] === 'Unknown State' ? 'checked' : '' ?>>Unknown

    <div style="margin-left:500px; background-color:maroon; padding-right:330px;">
    <?php
    $sql2="SELECT*FROM empl_tbl WHERE empl_no='$emp_no'";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
      }
      ?>
  </div>
</div>
</div>

  <div class="assign-srcdoc-sidenav">
  <h3 style="text-align:center;position:sticky;top:0;background-color:#61892f;font-family:sans-serif;">Locations</h3>
      <ul>
<?php
if(!empty($selection)){
$sql5=("SELECT * FROM eq_inv WHERE eqdesc='$selection' AND (eq_condition='Available/Unassigned' OR eq_condition='Unknown condition') GROUP BY curr_equip_loc");
$result5=mysqli_query($conn, $sql5);
while($row5 = mysqli_fetch_assoc($result5)){
$location=$row5['curr_equip_loc'];
$rowcount=mysqli_num_rows($result5);
?>
<ul>
        <?php echo "<li><a href='assign.php?emp_no=$emp_no&asno=$asno&parid=$parid&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&date=&rad=$rad&selection=$selection&loc=$location'> $location</a></li>"; ?>
      </ul>
    <?php
  }
}
    ?>
  </div>

<div class="assign-srcdoc">
  <table class= "tablediv-srcdoc">
  <thead>
    <tr>
    <th width="12%">EQ ID</th>
    <th width="12%">DESC</th>
    <th width="12%">BRAND</th>
    <th width="12%">SERIAL NO</th>
    <th width="12%">STATE</th>
    <th width="12%">DATE PURCHASED</th>
    <th width="12%">Location</th>
    <th width="5%">ACTION</th>
  </tr>
  </thead>
  <tbody>
  <?php

  $sql7=("SELECT * FROM eq_inv WHERE eqdesc='$selection' AND (eq_condition='Available/Unassigned' OR eq_condition='Unknown condition') AND eq_state='$rad' AND curr_equip_loc='$loc'");
  $result7=mysqli_query($conn, $sql7);
  for($i=0; $row7 = mysqli_fetch_assoc($result7); $i++){
    ?>
  <td><?php echo $row7['eq_inv_id']; ?></td>
  <td><?php echo $row7['eqdesc']; ?></td>
  <td><?php echo $row7['brand']; ?></td>
  <td><?php echo $row7['serial_no']; ?></td>
  <td><?php echo $row7['eq_state']; ?></td>
  <td><?php echo $row7['date_purch']; ?></td>
  <td><?php echo $row7['curr_equip_loc']; ?></td>

  <td><a href="assign.php?emp_no=<?php echo $emp_no;?>&asno=<?php echo $_GET['asno'];?>&parid=<?php echo $_GET['parid']; ?>&inv_id=<?php echo $row7['eq_inv_id'];?>&tag_no=<?php echo $row7['tag_no'];?>&ip_add=<?php echo $row7['ip_add'];?>&eqdesc=<?php echo $row7['eqdesc'];?>&brand=<?php echo $row7['brand'];?>&serial_no=<?php echo $row7['serial_no']; ?>&model_no=<?php echo $row7['model_no'];?>&remark=<?php echo $row7['remarks'];?>&rad=<?php echo $rad;?>&selection=<?php echo $selection;?>&loc=<?php echo $loc;?>&date=" class="btn btn-outline-primary">Add</a></td>
  </tbody>
  <?php
  }
  ?>
  </table>
</div>
<?php
if(isset($rowcount)){
   ?>
<h6>Equipment is available in: <?php echo $rowcount;?> location(s)</h6>
<?php
}
if(empty($rowcount)){
  ?>
  <h6>Equipment is available in: 0 location(s)</h6>
  <?php
  }

$sql11=("SELECT * FROM empl_tbl WHERE empl_no='$emp_no'");
$result11=mysqli_query($conn, $sql11);
while($row11 = mysqli_fetch_assoc($result11)){
 ?>
 <div class="assign-save">
<form action="saveassign.php" method="POST" id="dd">
<span class="span-assign">Location :</span><input type="text" class="form-control" name="loc_assign" value="<?php echo $row11['deploy'];?>" readonly style="margin-left:23px;background-color:#ccc;width:600px;"><br>
<span class="span-assign">Date Issued :</span><input type="date" style="width:180px;"class="form-control" name="date_issued" required><br>
<input type="hidden" name="assignid" value="<?php echo $asno;?>">
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
$sql99="SELECT * FROM temp_assign WHERE assign_id='$asno'";
$result99=$conn->query($sql99);
$row99=$result99->fetch_assoc();
?>
<input type="hidden"  name="loc2" value="<?php echo $row99['location_assign']; ?>">
<input type="submit" class="btn btn-primary" value="SAVE" style="float:left;margin-top:20px;height:30px;">
</form><br><br>
<form action="cancel.php" method="POST">
 <input type="hidden" name="cancel_empl" value="<?php echo $assignemp;?>">
 <input type="submit" class="btn btn-warning" value="CANCEL" style="margin-left:590px;margin-top:-60px;height:30px;">
</form>
</div>
<?php
}
?>
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
    $depti=$row9['dept_id'];
  }
  if(empty($depti)){
  $sql8=("SELECT * FROM temp_assign INNER JOIN eq_inv on temp_assign.eq_inv_id=eq_inv.eq_inv_id INNER JOIN empl_tbl on temp_assign.empl_no=empl_tbl.empl_no");
  $result8=mysqli_query($conn, $sql8);
  for($i=0; $row8 = mysqli_fetch_assoc($result8); $i++){
    ?>
  <tbody>
    <td>
      <form action="removeassign.php#srcdocsave" method="POST">
        <input type="hidden" name="asid" value="<?php echo $row8['assign_id']; ?>">
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

   <td><?php echo $row8['par_id']; ?></td>
   <td><?php echo $row8['eq_inv_id']; ?></td>
   <td><?php echo $row8['eqdesc']; ?></td>
   <td><?php echo $row8['brand']; ?></td>
   <td><?php echo $row8['serial_no']; ?></td>
   <td><?php echo $row8['model_no']; ?></td>
   <td><?php echo $row8['ip_add']; ?></td>
   <td><?php echo $row8['tag_no']; ?></td>
   <td><?php echo $row8['eq_state']; ?></td>
   <td><?php echo $row8['eq_condition']; ?></td>
   <td><?php echo $row8['remarks_assign']; ?></td>
     <?php
   }
 }
 if(!empty($depti)){
   $sql8=("SELECT * FROM temp_assign INNER JOIN eq_inv on temp_assign.eq_inv_id=eq_inv.eq_inv_id INNER JOIN empl_tbl on temp_assign.empl_no=empl_tbl.empl_no");
   $result8=mysqli_query($conn, $sql8);
   for($i=0; $row8 = mysqli_fetch_assoc($result8); $i++){
     ?>
   <tbody>
     <td>
         <form action="removeassign.php#srcdocsave" method="POST">
           <input type="hidden" name="asid" value="<?php echo $row8['assign_id']; ?>">
           <input type="hidden" name="prid" value="<?php echo $parid;?>">
           <input type="hidden" name="empl" value="<?php echo $emp_no; ?>">
           <input type="hidden" name="invi" value="<?php echo $row8['eq_inv_id']; ?>">
           <input type="hidden" name="tag" value="<?php echo $tag; ?>">
           <input type="hidden" name="eqdesc" value="<?php echo $eqdesc; ?>">
           <input type="hidden" name="brand" value="<?php echo $brand; ?>">
           <input type="hidden" name="serial" value="<?php echo $serial_no; ?>">
           <input type="hidden" name="model" value="<?php echo $model_no; ?>">
           <input type="hidden" name="rad" value="<?php echo $rad; ?>">
           <input type="hidden" name="selection" value="<?php echo $selection; ?>">
           <input type="hidden" name="loc" value="<?php echo $loc; ?>">
           <input type="submit" name="submit" value="Remove">
         </form></td>
    <td><?php echo $row8['par_id']; ?></td>
    <td><?php echo $row8['eq_inv_id']; ?></td>
    <td><?php echo $row8['eqdesc']; ?></td>
    <td><?php echo $row8['brand']; ?></td>
    <td><?php echo $row8['serial_no']; ?></td>
    <td><?php echo $row8['model_no']; ?></td>
    <td><?php echo $row8['ip_add']; ?></td>
    <td><?php echo $row8['tag_no']; ?></td>
    <td><?php echo $row8['eq_state']; ?></td>
    <td><?php echo $row8['eq_condition']; ?></td>
    <td><?php echo $row8['remarks_assign']; ?></td>
  <?php
}
}
     ?>
</tbody>
</table>
</div>
</body>
</html>

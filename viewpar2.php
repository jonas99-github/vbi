<!DOCTYPE html>
<html>
<head><title></title>
<?php include ("header.php");
$par= $_GET['par'];
?>
</head>
<body style="background-color:white;">

          <center><img src="icon/logo.png" height="100" width="380" style="float:center" ></center>
<center><label style="color:blue;">Purok 3, Bagumbayan, Daraga, Albay; Telefax: (052) 483 4153; E-mail: verzontal@yahoo.com</label></center>
            <center><h3>Administration Division<h3></center>
<center><h2>Property Acknowledgement</h2></center>
<strong><?php echo $par;?></strong><br><br>
<?php
$sql2="SELECT * FROM prty_ackn_rcpt WHERE par_no='$par' GROUP BY par_no";
$result2=mysqli_query($conn, $sql2);
while($row2=mysqli_fetch_assoc($result2)){
  ?>
<span>Date:&nbsp</span><strong><?php echo $row2['dateissued'];?></strong>
<?php
}
 ?>
<div style="margin-left:10px;">
    <br><br>
<table style="text-align:center;"><tr>
  <th width="12%">Description</th>
  <th width="12%">Brand</th>
  <th width="12%">Serial No.</th>
  <th width="12%">Model No.</th>
  <th width="12%">Remarks</th>
  <th width="12%">Deployed to (Location):</th>
      </tr>
      <?php
        $sql="SELECT * FROM prty_ackn_rcpt WHERE par_no='$par'";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
          $invid=$row['invid_transfer'];
          ?>
      <tbody>
        <td><?php echo $row['eqdesc_transfer'];?></td>
        <td><?php echo $row['brand_transfer'];?></td>
        <td><?php echo $row['serial_transfer'];?></td>
        <td><?php echo $row['model_transfer'];?></td>
        <td><textarea style="border:none;border-color:transparent;">[<?php
          $sql2="SELECT * FROM eq_inv WHERE eq_inv_id='$invid'";
          $result2=mysqli_query($conn,$sql2);
          while($row2=mysqli_fetch_assoc($result2)){
          echo $row2['eq_state'];
            }?>]    <?php echo $row['remarks_transfer'];?></textarea></td>
        <td><?php echo $row['transfer_empl_no'];?></td>
      
      </tbody>
      <?php
    }
     ?>
    </table>
    <div style="margin-top:200px;margin-left:100px;position:absolute;">
      <label>PREPARED BY:</label><br><br><br>
      <input type="text" name="prepared" placeholder="                             Insert name of Employee" style="width:500px;margin-left:-100px;height:30px;
border:none;border-color: transparent;" required><br>
      <label>__________________________________</label><br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label>Administration</label><br><br>
      <label>Date:&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp<input type="date" name="datepar" style="border: none;
border-color: transparent;">
    </div>

<div style="right:0;margin-top:200px;position:absolute;">
  <label>NOTED BY:</label><br><br><br>
  <input type="text" name="notedby" placeholder="                                       Insert name of Employee" style="width:500px;margin-left:-150px;height:30px;
border:none;border-color: transparent;" required><br>
  <label style="margin-top:6px;">__________________________________</label><br><BR><BR>
  <label>Date:&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp<input type="date" name="datepar" style="border: none;
border-color: transparent;">
</div>
<div style="margin-left:1100px;margin-top:550px;padding-bottom:200px;">
  <button id="button1" class="btn btn-primary" onclick="myFunction()">PRINT</button>
</div>
<script>
function myFunction(){
  document.getElementById("button1").style.display = "none";
  window.print();
  window.location.reload();
}
</script>
</body>
<html>

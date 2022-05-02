<!DOCTYPE html>
<html>
<head><title>Reorder</title>
<?php
include "header.php";
 ?>
</head>
<body>
   <div class="first-header">
         <ul>
    <a href="dashboard.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
    <li>
      <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
        <section style="float:left;">
      <form id="search-form" action="search-session.php" method="POST" class="">
      <input type="text" id="search-input" name="q" style="border-radius: 5px;" placeholder="Search equipment" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
      <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;font-size:12px;">
    </form>
  </section>
  <?php
  if(isset($a)){
    ?>
  <section style="float:left;">
    <form id="clear-search" action="equipment.php?section=" method="POST">
<input type="submit" name="submit" style="margin-left:3px;font-size:12px;" value="Clear search" class="btn btn-danger">
    </form>
  </section>
  <?php
}
 ?>
  </div>
    </li>
    <li><a href="dashboard.php">Employees</a></li>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <li><a href="reorder.php">Make Reorder Request</a></li>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <a href="manual.php" style="color:black;">Manual</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>

<div style="padding-bottom:100%;background-color:white;margin-left:200px;margin-right:200px;">
  <div class="alert alert-primary" role="alert" style="text-align:center;font-size:25px;"><strong>Reorder Request</strong></div>

<form action="savereorder.php" method="POST">
 <span style="margin-left:10px;color:#878787;">QUANTITY</span>
  <input type="number" placeholder="0" name="qty" class="form-control" style="width:300px;margin:10px;margin-left:107px;" required><br>
  <span style="margin-left:10px;color:#878787;">UNIT</span>
  <input type="text" name="unit" class="form-control" style="width:300px;margin:10px;margin-left:147px;" required><br>
  <span style="margin-left:10px;color:#878787;">PRODUCT DESCRIPTION</span>
  <input type="text" name="pdesc" class="form-control" style="width:300px;margin:10px;"><br>
<span style="margin-left:10px;color:#878787;">UNIT COST</span> 
  <input type="number" step="0.00" placeholder="0.00" name="unitcost" class="form-control" style="width:300px;margin:10px;margin-left:105px;" required><br>
  <input type="submit" name="submit" value="ADD" class="btn btn-primary" style="margin-left:413px;">
</form><br><br>

<table class="reorderTable" id="resultTable" data-responsive="table" style="margin-left:20px; margin-right:20px;color:white;background-color:#0389BC;text-align: center;border-color:#0389BC;">
  <thead>
    <th style=" border: 1px solid #0389BC;" width="12%">QUANTITY</th>
    <th style=" border: 1px solid #0389BC;" width="12%">UNIT</th>
    <th style=" border: 1px solid #0389BC;" width="12%">PRODUCT DESCRIPTION</th>
    <th style=" border: 1px solid #0389BC;" width="12%">UNIT COST</th>
    <th style=" border: 1px solid #0389BC;" width="12%">SUB TOTAL</th>
    <th style=" border: 1px solid #0389BC;" width="7%">Action</th>
  </thead>
  <tbody>
    <?php
    $sql2="SELECT * FROM save_reorder";
    $result=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result)){
      ?>
    <tr>
        <td style=" border: 1px solid #0389BC;background-color:white;color:black;"><?php echo $row2['qty'];?></td>
        <td style=" border: 1px solid #0389BC;background-color:white;color:black;"><?php echo $row2['unit'];?></td>
        <td style=" border: 1px solid #0389BC;background-color:white;color:black;"><?php echo $row2['pdesc'];?></td>
        <td style=" border: 1px solid #0389BC;background-color:white;color:black;"><?php echo $row2['unit_cost'];?></td>
        <?php
        $a=$row2['qty'];
        $b=$row2['unit_cost'];
         ?>
          <td style=" border: 1px solid #0389BC;background-color:white;color:black;"><?php echo $a * $b;?> </td>
        <td width="90" style=" border: 1px solid #0389BC;"><button class="btn btn-mini btn-warning" style=" border: 1px solid #0389BC;" value="<?php echo $row2['id'];?>" onclick="delorder(this)"><i class="icon icon-remove"></i> Cancel </button></td>
    </tr>
<?php
}
 ?>
    <thead>
      <tr>
        <th colspan="1" style="border: 1px solid #0389BC; "></th>
        <th colspan="1" style="border: 1px solid #0389BC; "></th>
        <th colspan="2" style="font-size: 12px; text-align: right;border: 1px solid #0389BC; font-size: 12px; color: 'WHITE';"><strong>GRAND TOTAL:</strong></th>
        <td style="border: 1px solid #0389BC;background-color:white;color:black;">
          <?php
          $total=0;
          $sql3="SELECT * FROM save_reorder";
          $result3=mysqli_query($conn,$sql3);
          while($row3=mysqli_fetch_assoc($result3)){
                $aaa=$row3['qty']; 
                $bbb=$row3['unit_cost'];
                $res=$aaa*$bbb;
                $total += $res;
              }  echo "<label style='color:red;'><strong>" . $total . "</strong></label>";
          ?></td><th colspan="5" style="border: 1px solid #0389BC;"></th>
      </tr>
    </thead>
  </tbody>
</table>
<br><br>
<form action="viewreorder.php" method="POST">
  <div style="width:100%;">
  <input type="date" name="date_reorder" style="float:right;width:200px;" class="form-control" required>
  <label style="float:right;">Date*:&nbsp</label>
  <label>Project:</label>
  <input type="text" name="project" class="form-control" style="margin-left:11px;width:356px;" placeholder="Project description"><br><br>
  <label>Location*:</label>
  <select name="location" class="form-control" style="width:400px;" required>
    <option></option>
    <?php
    $sql="SELECT * FROM deployment";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      ?>
    <option><?php echo $row['deployment'];?></option>
    <?php
  }
   ?>
  </select><br><br>
  <label>Title*:</label>
  <input type="text" name="title" class="form-control" placeholder="Title" style="margin-left:28px;width:400px" required><br>
<br>
<input type="submit" name="submit" class="btn btn-primary" style="margin-left:380px;">
</form>
</div>

</div>
<script>
function delorder(details){
  var aa=details.value;
  $.ajax({
    url: "delorder.php",
    type: "POST",
    data: {"aa" : aa},
    success: function(response){
      window.location.reload();
    }

  });
}
</script>
</body>
</html>

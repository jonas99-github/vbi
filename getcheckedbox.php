<!DOCTYPE html>
<head><title>Undistributed</title>
  <?php include ("header.php"); ?>
  <body>
   <?php
   $a=$_GET['loc'];
   $position=$_SESSION['SESS_ROLE'];
   if($position=='IT Admin' ){
    ?>
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
      <?php
      if($position=='HR and Admin Manager'){
        ?>
        <li><a href="manage_empl.php">Manage Employee</a></li>
        <?php
      }
      ?>
      <li><a href="equipment.php?section=">Equipment Inventory</a></li>
      <?php
      if($position=='HR and Admin Manager'){
        ?>
        <li><a href="undistributed.php">Undistributed</a></li>
        <?php
      }
      ?>
      <?php
      if($position=='IT Admin'){
       ?>
       <li><a href="undistributed.php">Undistributed</a></li>
       <li><a href="reorder.php">Make Reorder Request</a></li>
       <?php
     }
     ?>
     <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
       <?php echo $_SESSION['SESS_ROLE'];?>
       <div class="dropdown-content">
        <a href="transaction.php" style="color:black; ">Transactions</a>
        <a href="users.php" style="color:black; ">Accounts</a>
        <a href="" style="color:black;">Help</a>
        <a href="logout.php" style="color:black;">Log Out</a>
      </div>

    </div>
  </ul>
</div>
<div style="background-color:white;margin-top:50px;height:300px;margin-left:300px;margin-right:300px;overflow-y:auto;border-radius:3px;border:0.5px solid #D3D3D3;">
  <h4 style="margin-left:10px;">Choose an employee from <?php echo $a;?>:</h4>
  <div style="margin-top:60px;margin-left:320px;">

    <form action="codegen_assignment.php" method="POST">
     <input type="hidden" name="loc" value="<?php echo $a;?>">
     <select name="emp_no" class="form-control" style="width:300px;height:35px;" required>
       <option></option>
       <?php

       $sql2="SELECT * FROM empl_tbl WHERE deploy='$a' ";
       $result2=mysqli_query($conn,$sql2);
       while($row2=mysqli_fetch_assoc($result2)){
        ?>
        <option value="<?php echo $row2['empl_no'];?>"><?php echo $row2['empl_firstname'] . " " . $row2['middlename'] . " " . $row2['empl_lastname'];?></option>
        <?php
      }
      ?>
    </select><br><br><br>
    <input type="submit" name="submit" class="btn btn-primary" style="margin-left:220px;">
  </form>
</div>
<div style="margin-top:-160px;margin-left:10px;">
  <label>Equipment to be assigned:</label>
  <div>
    <?php
  }
  ?>
  <?php
if(isset($_POST['submit'])){//to run PHP script on submit
  if(!empty($_POST['item'])){
     $datas = array();
    // Loop to store and display values of individual checked checkbox.
    foreach($_POST['item'] as $selected){
     $sql="SELECT * FROM eq_inv WHERE eq_inv_id='$selected' ";
     $result=mysqli_query($conn,$sql);
    
     while($row=mysqli_fetch_assoc($result)){
      $datas[] = $row;
    }
 }
  foreach($datas as $data){
      $_SESSION['equipment']=$datas;
     echo  $data['eq_inv_id'] . " / ". $data['eqdesc'] . "<br>";
   }
}
}
?>
</div>
</div>
</div>
</body>
</html>

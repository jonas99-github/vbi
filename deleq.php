<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
?>
</head>

<body>
  <?php
  $position=$_SESSION['SESS_ROLE'];
  if($position=='IT Admin' || $position=='Admin Staff'){
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
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <li><a href="reorder.php">Make Reorder Request</a></li>
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
    <?php
}
if($position=='HR and Admin Manager')
{
  ?>
   <div class="first-header">
         <ul>
    <a href="search.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li>
        <div id="searchdiv-form" style="float:left;margin-top:-1px;margin-left:16px;">
          <section style="float:left;">
        <form id="search-form" action="search-emp-session.php" method="POST" class="">
        <input type="text" id="search-input" name="q" style="border-radius: 5px;" class="class-form" placeholder="Search employee" value="<?php  echo isset($_GET['q']) ? $_GET['q'] : null; ?>">
        <input type="submit" name="submit-button" value="Search" class="btn btn-info" style="width:80px;">
      </form>
    </section>
    <?php
    if(isset($a)){
      ?>
    <section style="float:left;">
      <form id="clear-search" action="search.php" method="POST">
        <input type="submit" name="submit" style="margin-left:3px;" value="Clear search" class="btn btn-danger">
      </form>
    </section>
    <?php
  }
   ?>
    </div>
      </li>
    <li><a href="search.php">Employees</a></li>
    <?php
     if($position=='HR and Admin Manager' || $position=='HR Generalist'){
      ?>
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <?php
  }
     if($position=='HR and Admin Manager'){
      ?>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <?php
  }
  ?>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <?php
          if($position=='HR and Admin Manager'){
           ?>
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <?php
        }
        ?>
         <a href="" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
  <?php
}
  ?>
<div class="vertical-nav">
  <ul>
      <li><a href="transaction.php">Transaction Feeds</a></li>
      <li><a href="deleq.php">Deleted Equipment</a></li>
      <hr />
        </ul></div>
    <div style="background-color:white;margin-left:399px;margin-right:350px;font-size:30px;font-family:arial;border-color:#DCDCDC;border-style:solid;border-width:1px;border-radius:2px;color:#060737;">Deleted Equipment</div>
        <div class="aboutcontent-div-transac"><br><br> <br><br>                                       
    <?php
    $sql="SELECT * FROM transac_inv WHERE transac_type = 'Deleted an Equipment' ORDER BY transac_uid DESC";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
      ?>
      <div style="border-style:solid;border-color:#DCDCDC;border-width:1px;border-radius:5px;margin:10px;background-color:white;width:600px;">
        <?php
              if ($row['transac_type']=='Deleted an Equipment'){
                  $qq=$row['transac_eqid'];
                  $sql6="SELECT * FROM deletedeq WHERE deleted_eqid='$qq'";
                  $result6=mysqli_query($conn,$sql6);
                  while($row6=mysqli_fetch_assoc($result6)){
                    $fd=$row6['deleted_eqdesc'];
                  echo "Unique ID: " . $row['transac_uid'] . "<label style='float:right;'>" . $row['transac_date'] . "</label><br>";

                  echo $row['transac_pos'] . " " . $row['transac_type'] . ": " . "<a href='equipment.php?section=all&q=$qq'>" . $fd . "</a>" . "<br>" . $row['transac_loc'];
                }
              }
             ?>
      </div>
      <?php
       }
       ?>
</div>
<div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
<html>

<!DOCTYPE html>
<head><title></title>
  <?php include('header.php');
  $position=$_SESSION['SESS_ROLE'];
?>
</head>
<body>
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
       <?php
     if($position=='IT Admin' || $position=='Admin Staff' ){
      ?>
       <li><a href="dashboard.php">Employees</a></li>
       <?php
     }
     if($position=='HR and Admin Manager' || $position=='HR Generalist'){
      ?>
    <li><a href="search.php">Employees</a></li>
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <?php
  }
     if($position=='HR and Admin Manager' || $position=='IT Admin' || $position=='Admin Staff'){
      ?>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
    <?php
  }
    if($position=='IT Admin' || $position=='Admin Staff'){
  ?>
    <li><a href="reorder.php">Make Reorder Request</a></li>
    <?php
  }
  ?>
   <div class="dropdown" style="float:right;margin-right:40px;margin-top:-15px;">
   <?php echo $_SESSION['SESS_ROLE'];?>
        <div class="dropdown-content">
          <?php
          if($position=='HR and Admin Manager' || $position=='IT Admin' || $position=='Admin Staff'){
           ?>
          <a href="transaction.php" style="color:black; ">Transactions</a>
          <a href="users.php" style="color:black; ">Accounts</a>
          <?php
        }
        ?>
         <a href="manual.php" style="color:black;">Manual</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
  <h6 style="text-align:center;">Deleted Profiles List</h6>
<div class="container">
<table class="table table-bordered" style="margin-top:50px;">
  <thead>
    <th style="text-align:center;">Employee Number</th>
    <th style="text-align:center;">Employee Name</th>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * FROM archive";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      ?>
    <tr>
      <td style="text-align:center;"><?php echo $row['arch_empl_no'];?></td>
      <td style="text-align:center;"><?php echo $row['arch_firstname']." ".$row['arch_middlename']." ".$row['arch_lastname'];?></td>
    </tr>
    <?php
  }
   ?>
  </tbody>
</table>
</div>
</body>
</html

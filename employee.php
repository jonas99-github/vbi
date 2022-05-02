<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
  $position=$_SESSION['SESS_ROLE'];
  ?>
</head>
<body>
  <div class="first-header">
    <ul>
      <?php
      if($position=='IT Admin'){
        ?>
      <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="100" id="imgnav"></a>
      <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."</li>
      <li><a href="dashboard.php">Employees</a><li>
      <li><a href="equipment.php">Equipment Inventory</a></li>
      <li><a href="monitoring.php">Monitoring</a><li>
      <li><a href="">Make Reorder Request</a><li>
      <li><a href="users.php">Accounts</a></li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>

      <?php
    }
      if($position=='HR Generalist'){
        ?>
      <a href="dashboard.php" style="float:left; margin-top:3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
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
        <li><a href="manage_empl.php">Manage Employee</a><li>
        <li style="float:right "><a href="logout.php">LOGOUT</a></li>
        <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
        <?php
      }
       ?>
    </ul>
  </div>
  <div class="profile-nav">
  <ul>
  <li><a href="timeline.php?emp_no=<?php echo $_GET['emp_no']; ?>">Timeline</a></li>
  <li><a href="about.php?section=employee&action=&selaction=&emp_no=<?php echo $_GET['emp_no']; ?>">About</a><li>
  </ul>
  </div>
	<!-- Information -->
	<div class="navi-mngempl"><br>
    <h2 style="text-align:center">Edit Employee Information</h2>
    <hr>

<div class="form-addempl">
  <?php
  $emp=$_GET['emp_no'];
  $sql2="SELECT * FROM empl_tbl WHERE empl_no='$emp'";
  $result2=mysqli_query($conn,$sql2);
  while($row2=mysqli_fetch_assoc($result2)){
    $pos=$row2['position'];
    $dept=$row2['dept_id'];
     ?>
  <form action="saveeditempl.php" method="POST" class="form-addempl">
  <span class="emp">Employee Number </span>
  <input type="text" id ="empl_no" name="emp"  class="form-control" value="<?php echo $row2['empl_no'];?>" style="background-color:#ccc;width:200px;" readonly><br><br>

  <span class="fname">First Name</span>
  <span class="mname">Middle Name</span>
  <span class="lname">Last Name</span><br>

  <input type="text" id ="firstname" name="firstname"  class="form-control" style="width:205px; height:30px;" value="<?php echo $row2['empl_firstname'];?>">
  <input type="text" id ="middlename" name="middlename" class="form-control"  style="width:205px; height:30px;" value="<?php echo $row2['middlename'];?>">
  <input type="text" id ="lastname" name="lastname"  class="form-control" style="width:205px; height:30px;" value="<?php echo $row2['empl_lastname'];?>"><br><br>

    <span>Position</span><br>
    <select name="pos"  class="form-control" style="width:265px; height:40px;">
      <?php
      $sql3="SELECT * FROM position WHERE pos_id='$pos'";
      $result3=mysqli_query($conn,$sql3);
      while($row3=mysqli_fetch_assoc($result3)){
        ?>
      <option><?php echo $row3['position'];?></option>

      <?php
    }
    ?>
    <option></option>
    <?php
      $sql="SELECT * FROM position";
      $result=mysqli_query($conn, $sql);
      for($i=0; $row = mysqli_fetch_assoc($result); $i++){
      ?>
        <option><?php echo $row['position']; ?></option>
        <?php
      }

      ?>
    </select><br><br>

    <span>Department</span><br>
    <select name="dept"  class="form-control" style="width:265px; height:40px;">
    <?php
    $sql4="SELECT * FROM dept_tbl WHERE dept_id='$dept'";
    $result4=mysqli_query($conn,$sql4);
    while($row4=mysqli_fetch_assoc($result4)){
      ?>
    <option><?php echo $row4['dept_name'];?></option>
      <?php
    }
    ?>
    <option></option>
    <?php
      $sql5="SELECT * FROM dept_tbl";
      $result5=mysqli_query($conn, $sql5);
      for($i=0; $row5 = mysqli_fetch_assoc($result5); $i++){
      ?>
        <option><?php echo $row5['dept_name']; ?></option>
        <?php
      }
      ?>
    </select><br><br>

    <span>Deployment</span><br>
                        <input type="text" name="deploy" style="width:565px; height:40px;" class="form-control" value="<?php echo $row2['deploy']; ?>" readonly>
                         <br><br>
    <span>Status</span><br>
    <select name="status" class="form-control" style="width:265px; height:40px;">
      <option><?php echo $row2['empl_status']; ?></option>
      <option>Regular/Permanent</option>
      <option>Probationary</option>
      <option>Project-Based</option>
    </select><br><br>

      <span>Date Hired</span><br><input type="date" id ="date_hired" class="form-control" name="hired" style="width:265px; height:30px;" value="<?php echo $row2['hired']; ?>"><br><br>

    <span>Date Created</span><br><input type="date" class="form-control" id ="date_created" name="date_created" style="width:265px; height:30px;" value="<?php echo $row2['date_created']; ?>"><br><br>

    <span>Remarks</span><br><textarea name="remarks_prof" class="form-control"  style="height:100px; width:290px; "><?php echo $row2['remarks_prof']; ?></textarea><br><br>
    <input type="submit" id ="submit" name="submit" class="btn btn-primary" value="Submit" style="width:267px;margin-left:600px;">
    <?php
  }
   ?>
</form>
  </div>
</div>
</body>
</html>

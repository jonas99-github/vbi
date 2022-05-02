<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php");
$position=$_SESSION['SESS_ROLE'];
//emplno
function createRandomemplno() {
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
$emplno='EMPL-'.createRandomemplno();

//Deployment changes ID
function createRandomtid() {
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
$deployid='TID-'.createRandomtid();
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
	<!-- Information -->
	<div class="navi-mngempl"><br>
    <h2 style="text-align:center">Add an Employee</h2>
    <hr>
    <ul>
      <li><a href="manage_empl.php">Add Employee</a></li><br>
      <li><a href="addposition.php">Add Position</a></li><br>
      <li><a href="adddept.php">Add Department</a></li><br>
      <li><a href="adddeply.php">Add Deployment/PRJ SITE</a></li><br>
    </ul>

<div class="form-addempl">
  <form action="saveempl.php" method="POST" class="form-addempl">
  <input type="hidden" name="tid" value="<?php echo $deployid;?>">
  <span class="emp">Employee Number </span><input type="text" id ="empl_no" name="empl_no" required><br><br><span class="fname">First Name</span><span class="mname">Middle Name</span><span class="lname">Last Name</span><br>

  <input type="text" id ="firstname" name="firstname" style="width:205px; height:30px;" required>
  <input type="text" id ="middlename" name="middlename" style="width:205px; height:30px;">
  <input type="text" id ="lastname" name="lastname" style="width:205px; height:30px;" required><br><br>
    <span>Position</span><br>
    <select name="pos_dept" style="width:265px;height:30px;" required>
      <option></option>
      <?php $sql="SELECT * FROM position";
      $result=mysqli_query($conn, $sql);
      for($i=0; $row = mysqli_fetch_assoc($result); $i++){
      ?>
        <option><?php echo $row['position']; ?></option>
        <?php
      }
      ?>
    </select><br><br>
    <span>Department</span><br>
    <select name="dept" style="width:265px;height:30px;" required>
      <option></option>
      <?php $sql="SELECT * FROM dept_tbl";
      $result=mysqli_query($conn, $sql);
      for($i=0; $row = mysqli_fetch_assoc($result); $i++){
      ?>
        <option><?php echo $row['dept_name']; ?></option>
        <?php
      }

      ?>
    </select><br><br>
                        <span>Deployment</span><br>
                        <select name="deploy" style="width:265px; height:30px;" required>
                          <option></option>
                          <?php $sql="SELECT * FROM deployment";
                          $result=mysqli_query($conn, $sql);
                          for($i=0; $row = mysqli_fetch_assoc($result); $i++){
                          ?>
                            <option><?php echo $row['deployment']; ?></option>
                            <?php
                          }

                          ?>
                        </select><br><br>
    <span>Status</span><br>
    <select name="status" style="width:265px; height:30px;">
      <option></option>
      <option>Regular/Permanent</option>
      <option>Probationary</option>
      <option>Project-Based</option>
    </select><br><br>
      <span>Date Hired</span><br><input type="date" id ="date_hired" name="hired" style="width:265px; height:30px;"><br><br>
    <span>Date Created</span><br><input type="date" id ="date_created" name="date_created" style="width:265px; height:30px;" required><br><br>
    <input type="submit" id ="submit" name="submit" class="" value="Submit" style="width:267px;">
</form>
  </div>
</body>
</html>

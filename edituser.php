<!DOCTYPE html>
<html>
<head><title>Edit User</title>
</head>
<body>
<?php
include('header.php');
$position=$_SESSION['SESS_ROLE'];

if ($position=='IT Admin'){
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
<?php
}

if($position=='President'){
    ?>
    <div class="first-header" style="padding:38px;">
    <ul>
      <a href="users.php" style="float:left; margin-top:-3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
    </div>
    <?php
  }
  if($position=='HR and Admin Manager'){
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
    <li><a href="manage_empl.php">Manage Employee</a></li>
    <li><a href="equipment.php?section=">Equipment Inventory</a></li>
    <li><a href="undistributed.php">Undistributed</a></li>
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
?>
<div class="navi-mngempl">
<form action="saveedituser.php" method="post" class="form-addempl">
  <center><h4><i></i> Edit User</h4></center>
  <hr>
  <?php
  $id=$_GET['id'];
$sql = ("SELECT * FROM usr_tbl WHERE usr_id='$id'");
$result = mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
?>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <span>First Name : </span><input type="text" style="width:265px; height:30px;margin:5px;" name="empl_firstname" value="<?php echo $row['empl_firstname']; ?>" /><br>
    <span>Last Name : </span><input type="text" style="width:265px; height:30px; margin:5px;" name="empl_lastname" value="<?php echo $row['empl_lastname']; ?>"/><br>
    <span>Role : </span>
    <select name="role" style="width:265px; height:30px; margin:5px; margin-left:55px; " >
      <option><?php echo $row['role']; ?></option>
      <option>IT Admin</option>
      <option>HR and Admin Manager</option>
      <option>HR Generalist</option>
      <option>Admin Staff</option>
      <option>President</option>
    </select><br>
    <span>Username : </span><input type="text" style="width:265px; height:30px;margin:5px;" name="usr" value="<?php echo $row['usr']; ?>" /><br>
    <span>Password : </span><input type="password" style="width:265px; height:30px;margin:5px;" name="psw" value="<?php echo $row['psw']; ?>" /><br>
    <span>Date Created : </span><input type="date" style="width:265px; height:30px;margin:5px;" name="date_created" value="<?php echo $row['date_created']; ?>" /><br>
    <?php
  }
  ?>
  </select><br>
  <div>
    <button style="width:267px;"><i></i> Save Changes</button>
  </div>
</div>
</form>

</body>
</html>

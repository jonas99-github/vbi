<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>
<body>
	<?php
	//emplno
	function createRandomuser() {
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
	$user='USER-'.createRandomuser();
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
          <a href="manual.php" style="color:black;">Manual</a>
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
			<a href="" style="float:left; margin-top:-3px;margin-left:6px;"><img src="icon/logo.png" alt="logo" height="45" width="140" id="imgnav"></a>
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
<br><br>
<?php 
if($position=='IT Admin' || $position=='HR and Admin Manager')
{
	?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
  Add user
  </button>
<?php
}
?>
  <!-- The Modal -->
 <div class="modal fade" id="myModal">
	 <div class="modal-dialog">
		 <div class="modal-content">

			 <!-- Modal Header -->
			 <div class="modal-header">
				 <h4 class="modal-title">Add User</h4>
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
			 </div>

			 <!-- Modal body -->
			 <div class="modal-body">
				 <form class="" action="adduser.php" id=""
	 					method="post" enctype="multipart/form-data">
	 					<div>
	 							<div>
	 									<label>User Identification: </label><span id="user_id"
	 											class="info"></span>
	 							</div>
	 							<div>
	 									<input type="text" id="user_id" name="user_id"
	 											class="inputBox" value="<?php echo $user;?>" readonly style="background-color:#ccc;" />
	 							</div>
	 					</div>
	 					<div>
	 							<div>
	 									<label>First Name: </label><span id="firstname_lbl"
	 											class="info"></span>
	 							</div>
	 							<div>
	 									<input type="text" id="firstname" name="firstname"
	 											class="inputBox" Required />
	 							</div>
	 					</div>
	 					<div>
	 							<div>
	 									<label>Last Name: </label><span id="lastname_lbl"
	 											class="info"></span>
	 							</div>
	 							<div>
	 									<input type="text" id="lastname" name="lastname"
	 											class="inputBox" Required/>
	 							</div>
	 					</div>
	 					<span class="info">Role : </span><br><br>
	 					<select name="role">
	 					<option></option>
	 			        <option>IT Admin</option>
	 			        <option>Admin Staff</option>
	 					<option>HR and Admin Manager</option>
	 					<option>HR Generalist</option>
	 			    </select><br><br>
	 					<div>
	 							<div>
	 									<label>Username: </label><span id="usern"
	 											class="info"></span>
	 							</div>
	 							<div>
	 									<input type="text" id="username" name="username"
	 											class="inputBox" Required/>
	 							</div>
	 					</div>
	 					<div>
	 							<div>
	 									<label>Password: </label><span id="passw"
	 											class="info"></span>
	 							</div>
	 							<div>
									 
	 									<input type="password" id="password" name="password"
	 											class="inputBox" Required/>
	 							</div>
	 					</div>
	 					<div>
	 							<div>
	 									<label>Date Created: </label><span id="date-info"
	 											class="info"></span>
	 							</div>
	 							<div>
	 									<input type="date" id="date_created" name="date_created"
	 											class="inputBox" Required />
	 							</div>
	 					</div>
	 					<div>
	 							<input type="submit" id="send" name="send" value="Submit" />
	 					</div>
	 			</form>
			 </div>

			 <!-- Modal footer -->
			 <div class="modal-footer">
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			 </div>

		 </div>
	 </div>
 </div>

<?php
if (! empty($_POST["send"])) {
$empl_no = filter_var($_POST["empl_no"], FILTER_SANITIZE_STRING);
$firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
$lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_EMAIL);
$role = filter_var($_POST["role"], FILTER_SANITIZE_STRING);
$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$date_created = filter_var($_POST["date_created"], FILTER_SANITIZE_STRING);
}
?>
<script>
/*$(document).ready(function () {
$("#contact-icon").click(function () {
		$("#contact-popup").show();
});
});
*/
</script>
<br><br>
<table class = "tablediv-srcdoc-save" >
<thead>
	<tr>
	<th width="12%">User ID</th>
	<th width="12%">Employee First Name</th>
	<th width="12%">Employee Last Name</th>
	<th width="12%">Role</th>
	<th width="12%">Username</th>
	<th width="12%">Password</th>
	<th width="12%">Date Created</th>
	<?php
	if($position=='IT Admin' || $position=='HR and Admin Manager')
	{
		?>
	<th width="12%"> Action </th>
	<?php
}
?>
</tr>
</thead>
<tbody>
<?php
$sql=("SELECT * FROM usr_tbl ORDER BY usr_id");
$result=mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
?>
<td><?php echo $row['usr_id']; ?></td>
<td><?php echo $row['empl_firstname']; ?></td>
<td><?php echo $row['empl_lastname']; ?></td>
<td><?php echo $row['role']; ?></td>
<td><?php echo $row['usr']; ?></td>
<?php
									 if($position=="President"){
										 ?>
										 <td><input type="text" style="background-color:inherit;border:none;text-align:center;" readonly value="<?php echo $row['psw']; ?>"></td>
												 <?php
									 }else{
												 ?>
<td><input type="password" style="background-color:inherit;border:none;text-align:center;" readonly value="<?php echo $row['psw']; ?>"></td>
									 <?php }?>
<td><?php echo $row['date_created']; ?></td>
<?php
	if($position=='IT Admin' || $position=='HR and Admin Manager')
	{
		?>
<td><a href="edituser.php?id=<?php echo $row['usr_id']; ?>"><button>Edit</button></a>
	  <button onclick="deleteU(this)" value="<?php echo $row['usr_id'];?>">Delete</button></td>
	  <?php
}
?>
</tbody>
<?php
}
?>
</table>
<script>
	function deleteU(details){
	if(confirm("Are you sure you want to delete this User?")){
		window.location="confirmdeleteuser.php?user=" + details.value;
	}
}
</script>
<div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
</html>

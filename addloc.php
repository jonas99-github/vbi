<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); include ("connect.php"); ?>
</head>
<body>
  <div class="first-header">
    <ul>
    <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
    <li><a href="search.php">Employees</a></li>
    <li><a href="manage_empl.php">Manage Employee</a><li>
      <li style="float:right "><a href="logout.php">LOGOUT</a></li>
      <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
  </div>

	<!-- Information -->
	<div class="navi-mngempl"><br>
    <h2>Add Location</h2>
    <ul>
      <li><a href="manage_empl.php">Add Employee</a></li><br>
      <li><a href="addposition.php">Add Position</a></li><br>
      <li><a href="adddept.php">Add Department</a></li><br>
        <li><a href="addloc.php">Add Location/Deployment</a></li><br>
    </ul>

<div class="form-addempl">
  <form action="saveloc.php" method="POST" class="form-addempl">
    <span>Location ID</span><br><input type="text" id ="loc_id" name="loc_id" class="" value="">
    <span>Location</span><br><input type="text" id ="location" name="location" class="" value="">
    <span>Date Created</span><br><input type="date" id ="date_created" name="date_created" class="" value=""><br><br>
    <input type="submit" id ="submit" name="submit" class="" value="Submit">
</form>
  </div>
</body>
</html>

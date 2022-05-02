<!DOCTYPE html>
<html>
<head><title></title>
<?php include('header.php');
$position=$_SESSION['SESS_ROLE'];
?>
 </head>
<body>
  <div class="first-header">
    <ul>
      <?php
      if($position=='HR and Admin Manager'){
        ?>
        <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="130" id="imgnav"></a>
        <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
        <li><a href="transactions.php">Transactions</a><li>
        <li><a href="equipment.php">Equipment Inventory</a></li>
        <li style="float:right "><a href="logout.php">LOGOUT</a></li>
        <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
        <?php
          }
            if($position=='IT Admin'){
         ?>
      <a href="dashboard.php"><img src="icon/logo.png" alt="logo" height="25" width="100" id="imgnav"></a>
			<li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name"></li>
	    <li><a href="dashboard.php">Employees</a><li>
	    <li><a href="equipment.php">Equipment Inventory</a></li>
	    <li><a href="">Make Reorder Request</a><li>
	    <li style="float:right "><a href="logout.php">LOGOUT</a></li>
	    <li style="float:right; margin-right:20px;"><?php echo $_SESSION['SESS_ROLE'] ."   "; ?></li>
      <?php
    }
     ?>
    </ul>
  </div>
	<!-- Information -->
	<div class="profile-div">
			<br><br>
		<table id = "employees" >
		<thead>
			<tr>
			<th width="12%">Employee No.</th>
			<th width="12%">Employee First Name</th>
      <th width="12%">Employee Middle Name</th>
			<th width="12%">Employee Last Name</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql=("SELECT * FROM empl_tbl ORDER BY empl_no");
		$result=mysqli_query($conn, $sql);
		for($i=0; $row = mysqli_fetch_assoc($result); $i++){
			$emp_no=$row['empl_no'];
		?>
		<td><?php echo $row['empl_no']; ?></td>
		<td><?php echo "<a href='about.php?section=equipment&emp_no=$emp_no'>{$row['empl_firstname']}</a><br>"; ?></a></td>
    <td><?php echo "<a href='about.php?section=equipment&emp_no=$emp_no'>{$row['middlename']}</a><br>"; ?></a></td>
	<td><?php echo "<a href='about.php?section=equipment&emp_no=$emp_no'>{$row['empl_lastname']}</a><br>"; ?></a></td>
		</tbody>
		<?php
		}
		?>
		</table>
		</div>
    <div class="footer">(C) 2019 Verzontal Builders Inc.</div>
</body>
</html>

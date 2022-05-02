<!DOCTYPE html>
<html>
<head><title></title>
<?php include('header.php');
$position=$_SESSION['SESS_ROLE'];
?>
 </head>
<body>
  <?php
    $a = isset($_GET['q']) ? $_GET['q'] : null;

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
          <a href="manual.php" style="color:black;">Help</a>
         <a href="logout.php" style="color:black;">Log Out</a>
        </div>
  </div>
  </ul>
</div>
  <a href="archivelist.php" class="btn btn-primary" style="margin-top:10px;height:30px;">Deleted profiles</a>

	<!-- Information -->
	<div class="employees-list">
			<br><br>
		<table id = "equipments" >
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
       if(isset($a)){
		$sql=("SELECT *
      FROM empl_tbl
      WHERE empl_firstname LIKE '%$a%'
         OR middlename LIKE '%$a%'
         OR empl_lastname LIKE '%$a%'
         OR empl_no LIKE '%$a%'
      ORDER BY empl_lastname
      , empl_firstname ASC");
  }
  else{
    		$sql=("SELECT *
          FROM empl_tbl
          ORDER BY empl_lastname
          , empl_firstname ASC");
  }
		$result=mysqli_query($conn, $sql);
		for($i=0; $row = mysqli_fetch_assoc($result); $i++){
			$emp_no=$row['empl_no'];
		?>
		<td><?php echo $row['empl_no']; ?></td>
		<td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['empl_firstname']}</a><br>"; ?></a></td>
    <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['middlename']}</a><br>"; ?></a></td>
	  <td><?php echo "<a href='timeline.php?emp_no=$emp_no'>{$row['empl_lastname']}</a><br>"; ?></a></td>
		</tbody>
		<?php
		}
		?>
		</table>
		</div>
</body>
</html>

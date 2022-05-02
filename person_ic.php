<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
<script type="text/javascript">
clicked = true;
    $(document).ready(function(){
        $("button").click(function(){
            if(clicked){
                $(this).css('background-color', 'red');
                clicked  = false;
            } else {
                $(this).css('background-color', '');
                clicked  = true;
            }
        });
    });
</script>
</head>

<body>

<div class="header"><section><h2 style="text-align:left;">Equipment Inventory</h2></section><?php echo "Welcome " . $_SESSION['SESS_USERNAME'] ."   "; ?>
<a href="logout.php">LOGOUT</a>
</div>
<ul>
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="equip_assign.php">Equipment Assignment</a></li>
  <li><a href="equipment.php">Equipment Inventory</a></li>
  <li><a href="reports.php">Reports</a></li>
  <li><a href="actlog.php">Activity Log</a></li>

</ul>

<center><h3>Equipment issued to a person in charge</h3></center>
<center><h4>Total:</h4></center>
<nav class="navigation">
  <ul class="mainmenu">
    <li><a href="equipment.php">View all equipment</a></li>
    <li><a href="new_equip.php">New Equipment</a></li>
    <li><a href="person_ic.php">Person In charge</a></li>
    <li><a href="repair.php">For Repair</a></li>
    <li><a href="actlog.php">Activity Log</a></li>

  </ul>
</nav>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">

<a href="additem.php"><button type="button"class = "additem">..</button></a>
<br><br>
<div class="equipinv-table">
<table id = "equipments" >
<thead>
	<tr>
	<th width="12%"> eq_assign </th>
	<th width="12%"> eq_desc_id </th>
	<th width="12%"> brand </th>
	<th width="12%"> tag_no </th>
	<th width="12%"> serial_no </th>
	<th width="12%"> Model No. </th>
	<th width="12%"> IP Address </th>
	<th width="12%"> Dept ID </th>
	<th width="12%"> Location </th>
	<th width="12%"> Date Issued </th>
	<th width="12%"> Used or not Used</th>
	<th width="12%"> Equiment Status </th>
	<th width="12%"> Equipment Condition </th>
	<th width="12%"> Date Purchased </th>
	<th width="12%"> Price </th>
	<th width="12%"> Remarks </th>

</tr>
</thead>
<tbody>

<?php

		$sql = ("SELECT * FROM eq_inv ORDER BY eq_inv_id ASC");
		$result = mysqli_query($conn, $sql);
		for($i=0; $row = mysqli_fetch_assoc($result); $i++){
	?>
	<td><?php echo $row['eq_assign_id']; ?></td>
	<td><?php echo $row['eq_desc_id']; ?></td>
	<td><?php echo $row['brand']; ?></td>
	<td><?php echo $row['tag_no']; ?></td>
	<td><?php echo $row['serial_no']; ?></td>
	<td><?php echo $row['model_no']; ?></td>
	<td><?php echo $row['ip_add']; ?></td>
	<td><?php echo $row['dept_id']; ?></td>
	<td><?php echo $row['loc_id']; ?></td>
	<td><?php echo $row['date_issued']; ?></td>
	<td><?php echo $row['is_assigned']; ?></td>
	<td><?php echo $row['eq_sts']; ?></td>
	<td><?php echo $row['eq_condition']; ?></td>
	<td><?php echo $row['date_purch']; ?> </td>
	<td><?php echo $row['price']; ?></td>
	<td><?php echo $row['remarks']; ?></td>

<?php
}
?>
</tbody>
</table>
</div>

</body>
<html>

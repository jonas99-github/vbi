<html>
<head>
<?php include('connect.php');
include('header.php');
?>
</head>
<body>
<br>
<a href="additem.php"><button type="button"class = "additem">Add Item</button></a>
<br><br>
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
</body>
</html>

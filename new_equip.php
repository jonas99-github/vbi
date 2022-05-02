<!DOCTYPE html>
<html>
<head><title>Verzontal Equip. Monitoring</title>
<?php include ("header.php"); ?>
</head>

<body>

  <div class="first-header">
    <ul>
    <li><a href="equip_assign.php">Equipment Assignment</a><li>
    <li><a href="equipment.php">Equipment Inventory</a></li>
    <li><a href="">Make Reorder Request</a><li>
    <li><a href="">Activity Logs</a><li>
    <li><a href="users.php">Manage Users</a></li>
    <li style="float:right "><a href="logout.php">LOGOUT</a></li>
    <li style="float:right; margin-right:20px;"><?php echo "Welcome " . $_SESSION['SESS_ROLE'] ."   "; ?></li>
    </ul>
  </div>
  <div class="itad_2ndheader">
    <ul>
      <li><a href="equipment.php">Search Equipment</a></li>
        <li><a href="new_equip.php">New Equipment</a></li>
          <li><a href="repair.php">For Repair</a></li>
          </ul>
  </div>

<center><h3>New Equipment</h3></center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">

<div class="filters">
  <h3>Filter Results</h3>
  <span>CONDITION</span>
  <form action="" method="POST" class="">
  <input type="radio" name="condition"> All Condition <br>
  <input type="radio" name="condition"> New <br>
  <input type="radio" name="condition"> Old <br>
  </form>
  <span>STATE</span>
  <form action="" method="POST" class="filters2">
  <input type="radio" name="State" value="Functioning"> All State <br>
  <input type="radio" name="State" value="Available Unassigned"><em class="filters2">Available/<br>Unassigned</em> <br>
  <input type="radio" name="State" value="Functioning"> Functioning <br>
  <input type="radio" name="State" value="For Repair"> For Repair <br>
  <input type="radio" name="State" value="Missing Parts"> Missing Parts <br>
  <input type="radio" name="State" value="Missing"> Missing <br>
  <input type="radio" name="State" value="Condemned"> Condemned <br>
  </form>
</div>

<a href="additem.php"><button type="button"class = "additem">Add Equipment</button></a>
<br><br>
<div class="equipinv-table">
<table id = "equipments" >
<thead>
	<tr>
	<th width="12%"> Assignment Id </th>
  <th width="12%"> Equipment Id </th>
	<th width="12%"> EQ Description </th>
	<th width="12%"> Brand </th>
	<th width="12%"> Tag No </th>
	<th width="12%"> Serial No </th>
	<th width="12%"> Model No </th>
	<th width="12%"> IP Address </th>
	<th width="12%"> Date Issued </th>
  <th width="12%"> State </th>
  <th width="12%"> Condition </th>
	<th width="12%"> Date Purchased </th>
	<th width="12%"> Price </th>
  <th width="12%"> Location </th>
	<th width="12%"> Remarks </th>
  <th width="12%"> Action </th>
</tr>
</thead>
<tbody>

<?php
		$sql = ("SELECT * from eq_inv inner join eq_desc on eq_inv.eq_desc_id=eq_desc.eq_desc_id");
		$result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)) {

?>
        	<td><?php echo $row['eq_assign_id']; ?></td>
        	<td><?php echo $row['eq_desc_id']; ?></td>
          <td><?php echo $row['eqdesc']; ?></td>
          <td><?php echo $row['brand']; ?></td>
        	<td><?php echo $row['tag_no']; ?></td>
        	<td><?php echo $row['serial_no']; ?></td>
        	<td><?php echo $row['model_no']; ?></td>
        	<td><?php echo $row['ip_add']; ?></td>

        	<td><?php echo $row['date_issued']; ?></td>
        	<td><?php echo $row['eq_state']; ?></td>
        	<td><?php echo $row['eq_condition']; ?></td>
        	<td><?php echo $row['date_purch']; ?> </td>
        	<td><?php echo $row['price']; ?></td>
          <td><?php echo $row['curr_equip_loc']; ?></td>
        	<td><?php echo $row['remarks']; ?></td>
          <?php
          }
          ?>
</tbody>
</table>
</div>
</body>
</html>

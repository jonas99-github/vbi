<!DOCTYPE html>
<html>
<head><title>Edit User</title>
</head>
<body>
<?php
session_start();
include('connect.php');
$id=$_GET['id'];
$sql = ("SELECT * FROM usr_tbl WHERE usr_id='$id'");
$result = mysqli_query($conn, $sql);
for($i=0; $row = mysqli_fetch_assoc($result); $i++){
?>

<form action="saveedituser.php" method="post">
  <center><h4><i></i> Edit User</h4></center>
  <hr>
  <div id="">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <span>First Name : </span><input type="text" style="width:265px; height:30px;" name="empl_firstname" value="<?php echo $row['empl_firstname']; ?>" /><br>
    <span>Last Name : </span><input type="text" style="width:265px; height:30px;" name="empl_lastname" value="<?php echo $row['empl_lastname']; ?>" /><br>
    <span>Position : </span>
    <select name="position" style="width:265px; height:30px; margin-left:-5px;">
      <option><?php echo $row['position']; ?></option>
        <option>option1</option>
        <option>option2</option>
    </select><br>
    <span>Department : </span>
    <select name="dept_id" style="width:265px; height:30px; margin-left:-5px;" value="<?php echo $row['dept_id']; ?>">
        <option><?php echo $row['dept_id']; ?></option>
        <option>Dept1</option>
    </select><br>
    <span>Username : </span><input type="text" style="width:265px; height:30px;" name="usr" value="<?php echo $row['usr']; ?>" /><br>
    <span>Password : </span><input type="password" style="width:265px; height:30px;" name="psw" value="<?php echo $row['psw']; ?>" /><br>
    <span>Birthdate : </span><input type="password" style="width:265px; height:30px;" name="birthdate" value="<?php echo $row['birthdate']; ?>" /><br>
    <span>Email : </span><input type="email" style="width:265px; height:30px;" name="email" value="<?php echo $row['email']; ?>" /><br>
    <span>Mobile Number : </span><input type="text" style="width:265px; height:30px;" name="mbl_no" value="<?php echo $row['mbl_no']; ?>" /><br>
    <span>Date Created : </span><input type="date" style="width:265px; height:30px;" name="date_created" value="<?php echo $row['date_created']; ?>" /><br>
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


<?php
include ("connect.php");
session_start();

$username = $_POST["uname"];
$password = $_POST["psw"];

$sql = "SELECT * FROM usr_tbl WHERE usr='$username' AND psw='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);

if($result) {
 if($row > 0) {

		 session_regenerate_id();
		 $member = mysqli_fetch_assoc($result);
		 $_SESSION['SESS_USERNAME'] = $member['usr'];
     $_SESSION['SESS_ROLE'] = $member['role'];
		 $person = $_SESSION['SESS_USERNAME'];
     $empl_role = $_SESSION['SESS_ROLE'];
     $_SESSION['state']="allstate";
     $_SESSION['condition']="allcondition";
     $_SESSION['section']="all";
		 header("Location:regulator.php?username=$person&role=$empl_role");
	 }
 
	 else {
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
</head>
<body>
<?php
		 echo "<div style='margin-top:200px;text-align:center;font-size:23px;'>
		 <div class='alert alert-danger' style='width:500px;margin-left:410px;' role='alert'>The username or password you've entered is incorrect.</div><label style='text-decoration: underline;color:blue;font-size:15px;margin-left:400px;' onclick='aa1()'>Forgot password?</label><br><br>";
		 echo "<a href='index.php'>Go back</a></div>";
	 }
}
?>
</body>
</html>

<script>
	function aa1(){
	alert("Coordinate with the IT Admin or HR and Admin Manager to get your password.");
}
</script>

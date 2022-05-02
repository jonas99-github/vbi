<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "emonitoringvdb";

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error) {
	echo "<img src='icon/failed.png'height='70' width='75' style='margin-left:300px;margin-top:80px;'><h2 style='margin-left:300px;margin-top:30px;color:#282828;'>Connection Failure. <br><br> Check the MySQL in the XAMPP Control Panel.<br><br><br><button style='background-color:#1A73E8;color:white;height:30px;width:70px;border-radius:4px;border:none;' onclick='window.location.reload()'>Reload</button></h2><br>";
die("Connection failed: " . $conn->connect_error);
header("location:index.php");

}
?>

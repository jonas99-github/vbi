<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_USERNAME']) || (trim($_SESSION['SESS_USERNAME']) == '')) {
		   echo("<script>location.href = './index.php';</script>");
		exit();
	}
?>

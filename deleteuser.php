
<?php
	include('connect.php');
	$id=$_GET['id'];
	
	$sql2="SELECT * FROM usr_tbl WHERE usr_id='$id' ";
	$result2=mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_assoc($result2)){
		$a=$row2['role'];
	
	
	if($a=='President'){
		echo "<div style='margin-top:200px;margin-left:350px;'><strong style='color:red'>Failed to delete user. </strong>The system cannot delete a user with a 'President' access type.<br><br><br><br><br><a href='users.php' style='float:right;margin-right:380px;padding:10px;background-color:#28A745;border-radius:5px;text-decoration:none;color:white;' class='bt btn-success' >Go back</a></div>"; 
	}
	else{
		echo "failed";
	}
	
}
		
/*
	$sql="DELETE FROM usr_tbl WHERE usr_id= '$id'";
	if (mysqli_query($conn, $sql)){
			header("location: users.php");
	}
	
	
}
*/
?>

<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if(isset($_SESSION['link'])){
	foreach($_SESSION['link'] as $data){
		echo $data . "<br>";
	}
}

?>

</body>
</html>

<!DOCTYPE html>
<html>
<body>
<p id="demo"></p>

<?php
session_start();
if(isset($_SESSION['equipment'])){
	foreach($_SESSION['equipment'] as $data){
     echo  $data['eq_inv_id'] . " / ". $data['eqdesc'] . "<br>";
   }
}
else{
	echo "fail";
}
?>
</body>
</html>

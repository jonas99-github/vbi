<?php
include "connect.php";
session_start();
$a=$_SESSION['equipment'];
$b=$_POST['empl'];
$c=$_POST['invi'];
$d=$_POST['prid'];

echo $c;
$index=array_search($c, array_column($a,'eq_inv_id'));
if($index !== false){
	$a[$index]['eq_inv_id'] = '';
	$_SESSION['equipment']=array_values($a);
}
else {
	echo "fail";
}

//return $a;
print_r($a);

$url="assignment.php?emp_no=$b&parid=$d&inv_id=&tag_no=&eqdesc=&brand=&serial_no=&model_no=&remark=&rad=$e&selection=$c&loc=$d";
header("location:$url");

?>

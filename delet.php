<?php
session_start();
?>


<?php

$con=new mysqli('localhost','root','','registration_new');
$id=$_SESSION['uid'];
echo $id;
if(!isset($_SESSION['uid'])){
	header('location:adminloginform.php');
	exit();
}
if($con->connect_error){
	echo $con->connect_error;
	exit();
}

$stmt=$con->prepare("DELETE FROM `student` WHERE `id`=?");

if($stmt==true){
	$stmt->bind_param("i",$id);
	
	$stmt->execute();
	
 echo "Recoed is deleted";
	
	$stmt->close();
	$con->close();
	exit();
}
else{
	echo "False hai bhaiya";
}

?>
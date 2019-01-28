<?php
session_start();
?>


<?php

$con=new mysqli('localhost','root','','registration_new');
$id=$_SESSION['uid'];
$name=$_SESSION['uname'];
$address=$_SESSION['uaddress'];
$phone=$_SESSION['uphone'];
$email=$_SESSION['uemail'];



if(!isset($_SESSION['uid'])){
	header('location:adminloginform.php');
	exit();
}

if($con->connect_error){
	echo $con->connect_error;
	exit();
}

$stmt=$con->prepare("SELECT `id`,`name`,`address`,`phone`,`email` FROM `student` WHERE `id`=? AND `name`=? AND `address`=? AND `phone`=? AND `email`=?");

if($stmt==true){
	$stmt->bind_param("issis",$id,$name,$address,$phone,$email);
	$stmt->bind_result($Id,$Name,$Address,$Phone,$Email);
	$stmt->execute();
	
	$stmt->fetch();
	if(!empty($Id)){//
	?>
	
	<table style="border:1px solid grey;text-align:center;margin-top:10px;">
	<h3>STUDENT DETAILS</h3>
	<tr><td>STUDENT ID</td><td><?php echo $Id ?></td></tr>
	<tr><td>NAME</td><td><?php echo $Name ?></td></tr>
	<tr><td>Address</td><td><?php echo $Address ?></td></tr>
		<tr><td>PHONE</td><td><?php echo $Phone ?></td></tr>
			<tr><td>Email</td><td><?php echo $Email ?></td></tr>
	
	</table>
	
	<?php
	}
	else{
		echo "ERROR";
	}
	
	$stmt->close();
		$con->close();
		exit();
}
else{
	echo "Error";
}

?>
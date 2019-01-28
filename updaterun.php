<?php
session_start();
?>

<html>
<head>
<title>update admin</title>
</head>
<body>
<h1 style="text-align:center">Update Form</h1>
<br>
<div>

<form style="margin-top:40px;" action="#" method="post">
<table style="background-color:white;border:1px solid black;text-align:center;width:50%;" align="center">

<tr><td><b>ADDRESS : </td><td><textarea name="add" rows="5" cols="30"></textarea></td></tr>

<tr style="background-color:lightgrey;height:80px;"><td><b>PHONE NO : </td><td><input type="number" name="phone" style="height:30px;" required="required"></td></tr>

<tr style="height:80px;"><td><b>EMAIL ID: </td><td><input type="email" name="email" style="height:30px;" required="required" size="35"></td></tr>

<tr align="center" style="background-color:lightgrey;"><td colspan="2"><input type="submit" value="SUBMIT" name="sub" style="height:30px;width:80px"></td></tr>
</table>
</form>

</div>
</body>
</html>

<?php
if(isset($_POST['sub'])){

$con=new mysqli('localhost','root','','registration_new');
$id=$_SESSION['uid'];
$name=$_SESSION['uname'];
$address=$_POST['add'];
$phone=$_POST['phone'];
$email=$_POST['email'];



if(!isset($_SESSION['uid'])){
	header('location:adminloginform.php');
	exit();
}

if($con->connect_error){
	echo $con->connect_error;
	exit();
}

$stmt=$con->prepare("UPDATE `student` SET `address`=?,`phone`=?,`email`=? WHERE `id`=?");

if($stmt==true){
	$stmt->bind_param("sisi",$address,$phone,$email,$id);

	$stmt->execute();
header('location:updatefinal.php');
//echo "<h4 align='center'>Record Updated Successfully</h4>";
	
	$stmt->close();
		$con->close();
		exit();
}
else{
	echo "NOT Updated";
}
}
?>
<?php
session_start();
?>
<?php
if(!isset($_SESSION['uid'])){
	header('location:adminloginform.php');
	exit();
}

else{
$id=$_SESSION['uid'];
$con=new mysqli('localhost','root','','registration_new');

$sql="SELECT * FROM `admin` WHERE id=$id";

$run=$con->query($sql);

if($run->num_rows>0){
	$data=$run->fetch_assoc();
	?>
    <html>
	
	<body style="background-color:lightgrey;">
	<h5 style="text-align:right;margin-right:20px;margin-top:20px;"><a style="text-decoration:none; color:black" href="adminlogout.php">LOGOUT</a></h5>
    
	<table align="center"  style="border:1px solid black;text-align:center;margin-top:50px;height:50px;width:20%;background-color:white;">
	<tr colspan="2"><td><?php echo "<b>Welcome ".$data['name']."</b>";?></td></tr>
	<tr><tr>
	<tr colspan="2"><td><a href="admininsert.php" style="text-decoration:none;color:red;" >INSERT DATA</a></td></tr><tr><tr>
	<tr colspan="2"><td><a href="viewadmin.php" style="text-decoration:none;color:purple;">VIEW DATA</a></td></tr><tr><tr>
	<tr colspan="2"><td><a href="deleteform.php" style="color:blue;text-decoration:none;">DELETE DATA</a></td></tr><tr><tr>
	<tr colspan="2"><td><a href="updatead.php" style="color:green;text-decoration:none;">UPDATE DATA</a></td></tr>
	</table>

	
	</body>
	</html>

	<?php
		
}

}
?>
<?php
session_start();
?>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
<h1>ADMIN LOGIN</h1>
<br>
<div>
<form method="post" action="#">

<label for="uname"><b>USERNAME : </b></label>
<input type="text" name="uname" required="required">
<br><br>
<label for="pass"><b>PASSWORD : </b></label>
<input type="password" name="pass" required="required">
<br><br>

<input type="submit" name="sub">

</form>
</div>

</body>
</html>

<?php

if(isset($_POST['sub'])){
$name=$_POST['uname'];
$pass=$_POST['pass'];

$con=new mysqli('localhost','root','','registration_new');
$query="SELECT * FROM `admin`";
$num=0;
$result=$con->query($query);

if($result->num_rows>0){
	while($data=$result->fetch_assoc()){
		if($data['name']==$name && $data['password']==$pass){
			$_SESSION['uid']=$data['id'];
			header('location:adminlogindash.php');
		}
	}
}
if($num==0){
	echo "Invalid USERNAME and PASSWORD";
}


}
?>
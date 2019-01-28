<?php
session_start();
?>

<html>
<head>
<title>view admin</title>
</head>
<body>
<h1>Details Form</h1>
<br>
<div>
<form method="post" action="#">

<label for="uname"><b>NAME : </b></label>
<input type="text" name="uname" required="required">
<br><br>
<label for="pass"><b>EMAIL : </b></label>
<input type="email" name="email" required="required">
<br><br>

<input type="submit" name="sub">

</form>
</div>
</body>
</html>

<?php

if(isset($_POST['sub'])){
$name=$_POST['uname'];
$email=$_POST['email'];

$con=new mysqli('localhost','root','','registration_new');
$query="SELECT * FROM `student`";
$num=0;
$result=$con->query($query);

if($result->num_rows>0){
	while($data=$result->fetch_assoc()){
		if($data['name']==$name && $data['email']==$email){
			$_SESSION['uid']=$data['id'];
			$_SESSION['uname']=$data['name'];
			$_SESSION['uaddress']=$data['address'];
			$_SESSION['uphone']=$data['phone'];
			$_SESSION['uemail']=$data['email'];
			header('location:adminshow.php');
		}
	}
}
if($num==0){
	echo "No Record Found";
}


}
?>
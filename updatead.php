<?php
session_start();
?>

<html>
<head>
<title>update admin</title>
</head>
<body>
<h1>Update Form</h1>
<br>
<div>
<form method="post" action="#">


<label for="pass"><b>ID : </b></label>
<input type="number" name="idd" required="required">
<br><br>

<label for="uname"><b>NAME : </b></label>
<input type="text" name="uname" required="required">
<br><br>

<input type="submit" name="sub">

</form>
</div>
</body>
</html>

<?php

if(isset($_POST['sub'])){
$name=$_POST['uname'];
$id=$_POST['idd'];

$con=new mysqli('localhost','root','','registration_new');
$query="SELECT * FROM `student`";
$num=0;
$result=$con->query($query);

if($result->num_rows>0){
	while($data=$result->fetch_assoc()){
		if($data['name']==$name && $data['id']==$id){
			$_SESSION['uid']=$data['id'];
			$_SESSION['uname']=$data['name'];
			header('location:updaterun.php');
		}
	}
}
if($num==0){
	echo "No Record Found";
}


}
?>
<html>
<head>
<title>Registration Form</title>
<script>

function CheckForm(form){
if(form.pass.value.length<8 && form.pass1.value.length<8){
	alert("Error: password must contain atleast 8 characters");
	form.pass.focus();
	return false;
}

if(form.pass.value!=form.pass1.value){
		alert("Error: Password does not match");
	form.pass.focus();
	return false;
}


	}



</script>

</head>

<body style="background-color:#fff2e6;">
<h5 style="text-align:right;margin-right:20px;margin-top:10px;"><a href="adminloginform.php" style="text-decoration: none;">ADMIN LOGIN</a></h5>
<h1 style="text-align:center;margin-top:30px;">Registration Form</h1>
<form style="margin-top:80px;" action="insert.php" method="post" onsubmit="return CheckForm(this);">
<table style="background-color:white;border:1px solid black;text-align:center;width:50%;" align="center">
<tr style="background-color:lightgrey;height:80px;width:5px;"><td><b>NAME : </td><td><input style="height:30px;" type="text" name="name" required="required" size="35"></td></tr>

<tr><td><b>ADDRESS : </td><td><textarea name="add" rows="5" cols="30"></textarea></td></tr>

<tr style="background-color:lightgrey;height:80px;"><td><b>PHONE NO : </td><td><input type="number" name="phone" style="height:30px;" required="required"></td></tr>

<tr style="height:80px;"><td><b>EMAIL ID: </td><td><input type="email" name="email" style="height:30px;" required="required" size="35"></td></tr>

<tr style="background-color:lightgrey;height:80px;"><td><b>CREATE PASSWORD :  </td><td><input type="password" style="height:30px;" name="pass" required="required" size="35"></td></tr>

<tr style="height:80px;"><td><b>CONFIRM PASSWORD : </td><td><input type="password" name="pass1" style="height:30px;" required="required" size="35"></td></tr>
<tr align="center" style="background-color:lightgrey;"><td colspan="2"><input type="submit" value="SUBMIT" name="sub" style="height:30px;width:80px"></td></tr>
</table>
</form>

</body>

</html>

<?php

$name=trim($_POST['name']);
$address=trim($_POST['add']);
$phone=trim($_POST['phone']);
$email=trim($_POST['email']);
$pass=trim($_POST['pass']);
$pass1=trim($_POST['pass1']);



if($pass!=$pass1){
	echo "Password must be same";
	exit();
}

$record=0;
$con=new mysqli('localhost','root','','registration_new');


$sql="SELECT * FROM `student`";
$run=$con->query($sql);

if($run->num_rows>0){
	
while($data = $run->fetch_assoc()){

if($data['email']==$email){
	echo "Email is already registered  "."<a href='index.php'>submit another response</a>";
	$record=$record+1;
}

}

}

if($record==0){
	$stmt=$con->prepare("INSERT INTO `student`(`name`, `address`, `phone`, `email`, `password`) VALUES (?,?,?,?,?)");
	
	if($stmt==true){
		$stmt->bind_param("ssiss",$Name,$Address,$Phone,$Email,$Password);
		
		$Name=$name;
		$Address=$address;
		$Phone=$phone;
		$Email=$email;
		$Password=$pass;
		$stmt->execute();
	
		
		echo "Record Entered successfully "."<a href='index.php'>Submit another response</a>";
		$stmt->close();
		$con->close();
		exit();
	}
	
	else{
		echo "Data did not inserted";
	}
}
?>
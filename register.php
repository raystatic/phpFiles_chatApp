<?php

include 'config.php';
//include 'uploadImage.php';

$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

$sql="select email from user where email='$email';";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);
if ($resultCheck>0) {
	echo "User already exist with this email address";
}
else
{

	$sql3 ="SELECT img_id FROM profile ORDER BY img_id ASC";
	 
	$res = mysqli_query($conn,$sql3);
	 
	$id = 0;
	 
	while($row = mysqli_fetch_array($res))
	{
	 	$id = $row['img_id'];
	}

	$sql2="insert into user (name, email, password, img_id) values ('$name', '$email', '$password', '$id');";
	$result2=mysqli_query($conn,$sql2) ;

	if ($result2) {
		echo "Regiteration Successfull";
	}
	else
	{
		echo "Error in registration";
	}	
}


?>
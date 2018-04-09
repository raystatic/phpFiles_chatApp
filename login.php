<?php

include 'config.php';

$email=$_POST["email"];
$password=$_POST["password"];

$sql="select email from user where email='$email' AND password='$password';";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);

// echo "$resultCheck";

if ($resultCheck>0) {
	echo "login success";
}
else
{
	echo "Invalid email or password";
}

?>
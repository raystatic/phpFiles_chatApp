<?php

include 'config.php';

$email=$_POST["email"];
$password=$_POST["password"];

$sql="select * from user where email='$email' AND password='$password';";
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($result)) {
	$img_id=$row['img_id'];
	$Name=$row['name'];
	$Email=$row['email'];
	$Password=$row['password'];

}

$sql2="select img_name from profile where img_id='$img_id';";
$res2=mysqli_query($conn,$sql2);

while($row=mysqli_fetch_array($res2))
{
	$imagePath=$row['img_name'];
}

//$imagePath="uploads/42.jpg";

$image=file_get_contents($imagePath);
$encodedImage=base64_encode($image);

echo json_encode(array("encodedImage"=>$encodedImage,"name"=>$Name,"email"=>$Email,"password"=>$Password));



?>
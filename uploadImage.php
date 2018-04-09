<?php

include 'config.php';

$image=$_POST["image"];

//var_dump($image);

$sql ="SELECT img_id FROM profile ORDER BY img_id ASC";
 
$res = mysqli_query($conn,$sql);
 
$id = 0;
 
while($row = mysqli_fetch_array($res)){
 	$id = $row['img_id'];
}
 
 $path = "uploads/$id.jpg";
 $imageName="$id.jpg";
 
 $actualpath = "http://localhost/$path";
 
 $sql = "INSERT INTO profile (img_name) VALUES ('$path')";
 
 if(mysqli_query($conn,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 }

else 
{
	echo "Error in uploading image";
}

?>
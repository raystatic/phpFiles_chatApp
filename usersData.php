<?php

include 'config.php';

$email=$_POST["email"];
$password=$_POST["password"];

$sql="select * from user where email!='$email';";
$result=mysqli_query($conn,$sql);

$image_id=array();
$names=array();
$emails=array();

while ($row=mysqli_fetch_array($result)) {
	array_unshift($image_id, $row["img_id"]);
	array_unshift($names, $row["name"]);
	array_unshift($emails, $row["email"]);

}

$image_path=array();
$images=array();
$encodedImages=array();
$index=0;

$num_images=count($image_id);

for($i=($num_images-1); $i>=0; --$i)
{
		$sql2="select img_name from profile where img_id='$image_id[$i]';";
		$res2=mysqli_query($conn,$sql2);

		while($row2=mysqli_fetch_assoc($res2))
		{
			array_unshift($image_path, $row2["img_name"]);
		}

}

for ($i=($num_images-1); $i>=0 ; $i--) 
{ 
	array_unshift($images, file_get_contents($image_path["$i"]));
}


for ($i=($num_images-1); $i>=0 ; $i--) 
{ 
	array_unshift($encodedImages, base64_encode($images["$i"]));
}

for ($i=($num_images-1); $i>=0 ; $i--) 
{ 
	$users=array("encodedImage"=>$encodedImages, "names"=>$names, "emails"=>$emails);
}

echo json_encode($users);

?>
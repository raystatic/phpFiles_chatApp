<?php



$server="localhost";
$username="root";
$password="select_ray";
$db="phpProject";

$conn=mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	echo "db connection faluire..";
}

?>
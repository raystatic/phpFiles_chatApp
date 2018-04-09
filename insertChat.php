<?php

include 'config.php';

$myEmail=$_POST["myEmail"];
$friendEmail=$_POST["friendEmail"];
$msg=$_POST["msg"];

$sql="insert into chats (sender, reciever, msg) values ('$myEmail', '$friendEmail', '$msg');";
$result=mysqli_query($conn,$sql);

echo "$myEmail<br>";
echo "$friendEmail<br>";
echo "$msg<br>";

?>
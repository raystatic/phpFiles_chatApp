<?php

include 'config.php';

$myEmail=$_POST["myEmail"];
$friendEmail=$_POST["friendEmail"];
//$msg=$_POST["msg"];

// $sql="insert into chats (sender, reciever, msg) values ('$myEmail', '$friendEmail', '$msg');";
// $result=mysqli_query($conn,$sql);

$sql2="select * from chats where (sender='$myEmail' OR sender='$friendEmail') AND (reciever='$myEmail' OR reciever='$friendEmail') ;";
$result2=mysqli_query($conn,$sql2);

$msgs=array();
$senders=array();
$recievers=array();

while($row=mysqli_fetch_array($result2))
{
	array_unshift($msgs, $row["msg"]);
	array_unshift($senders, $row["sender"]);
	array_unshift($recievers, $row["reciever"]);
}

$num_msgs=count($msgs);

// for ($i=(num_msgs-1); $i>=0 ; $i--) { 
// 	$data=array("sender"=>$senders, "reciever"=>$recievers, "msg"=>$msgs);
// }

echo json_encode(array("sender"=>$senders, "reciever"=>$recievers, "msg"=>$msgs));

?>
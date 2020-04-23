<?php
require 'dbh.inc.php'; 
session_start();

$id = $_POST['item_id'];
$type = $_POST['type'];
$currentUserId= $_SESSION['userId'];
$textbox = $_POST['content'];

var_dump($currentUserId);
if(isset($currentUserId)){

	if($type == "text"){ $tableName = "userstext";}

	$sql = "UPDATE $tableName SET text ='$textbox'  WHERE  id=$id AND idUsers=$currentUserId";
	if (mysqli_query($conn, $sql)) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}	
}
mysqli_close($conn);
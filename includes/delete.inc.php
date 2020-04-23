<?php
require 'dbh.inc.php'; 
session_start();

$id = $_POST['item_id'];
$type = $_POST['type'];
$currentUserId= $_SESSION['userId'];
var_dump($currentUserId);
if(isset($currentUserId)){

	if($type == "text"){ $tableName = "userstext";}

	if($type == "image") { $tableName = "usersob";}

	$sql = "DELETE FROM $tableName WHERE id=$id AND idUsers=$currentUserId";
	if (mysqli_query($conn, $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}	
}
mysqli_close($conn);
 <?php

 session_start();
$currentUserId = $_SESSION['userId'];

$textbox = $_POST['textbox'];




if (isset($_POST['submit'])) {

require 'dbh.inc.php';
 


$sql = "INSERT INTO userstext (idUsers,text)
VALUES ('$currentUserId','$textbox')";
$result = $conn->query($sql);


header("Location:../index.php?response=success");
}



else {
  
header("Location:../index.php");
  exit();
}


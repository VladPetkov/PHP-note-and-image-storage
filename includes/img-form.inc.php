 <?php

 session_start();

$currentUserId = $_SESSION['userId'];
$file = $_FILES['img'];


$target = "../uploads/";

$target = $target . basename( $_FILES['img']['name']);
$changedTarget = str_replace("../","",$target);


//This gets all the other information from the form
if (isset($_POST['submit'])) {

require 'dbh.inc.php';
 

$isUploded = move_uploaded_file($_FILES['img']['tmp_name'], $target);



if($isUploded) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['img']['name']). " has been uploaded, and your information has been added to the directory";


$sql = "INSERT INTO usersob (idUsers,img)
VALUES ('$currentUserId','$changedTarget')";
$result = $conn->query($sql);

header("Location:../index.php?response=success");

}



}

else {
  
header("Location:../index.php");
  exit();
}


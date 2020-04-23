<?php
if (isset($_POST['signup-submit'])) {

require 'dbh.inc.php';

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pass'];
$passwordRepeat = $_POST['pass-repeat'];

 if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){

 	header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
 	exit();
 }

 else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
 	header("Location: ../signup.php?error=invalidmailuid");
 	exit();

 }

 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
 	header("Location: ../signup.php?error=invalidmail&uid=".$username);
 	exit();
 }
  else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)){
 	header("Location: ../signup.php?error=invalidiuid&mail=".$email);
 	exit();
 }

 else if ($password !== $passwordRepeat){
 	header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
 	exit();
 }
 else{
 	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
 	$stmt = mysqli_stmt_init($conn);
 	if(!mysqli_stmt_prepare($stmt, $sql)){
 		header("Location: ../signup.php?error=sqlerror");
 	exit();
 	}
 	else {
 		mysqli_stmt_bind_param($stmt,"s",$username);
 		mysqli_stmt_execute($stmt);
 		mysqli_stmt_store_result($stmt);
 		$resultCheck = mysqli_stmt_num_rows($stmt);
 		if($resultCheck > 0 ){
 			header("Location: ../signup.php?error=usertaken&mail=".$email);
 			exit();
 		}
 		else{
 			$sql = "INSERT INTO users(uidUsers,emailUsers,passUsers) VALUES (?,?,?)";
 			$stmt = mysqli_stmt_init($conn);
 			if(!mysqli_stmt_prepare($stmt, $sql)){
 				header("Location: ../signup.php?error=sqlerror");
 				exit();
 			}
 			else {
 				$hashedPass = password_hash($password, PASSWORD_DEFAULT );
 				mysqli_stmt_bind_param($stmt,"sss",$username, $email, $hashedPass);
 				mysqli_stmt_execute($stmt);
 				
 				
 				
 				$currentInsertedUserId=mysqli_insert_id($conn);
 				session_start();
 				$_SESSION["userId"]=$currentInsertedUserId;
 				header("Location: ../signup.php?signup=success");
 				header("Location: ../index.php");
 				exit();
 			}
 		}
 	 }
    } 
    myslqi_stmt_close($stmt);
    mysql_close($conn);
}
else {
	header("Location:../signup.php");
 	exit();

}
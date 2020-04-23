








<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/head.php' ; ?>

</head>
<body>

<?php  include 'includes/navbar.php';?>



<?php if(isset($_SESSION['userId'])){
	include 'includes/homepage.inc.php';
}
else{ 
	header('Location: login.php');



 }
?>

<?php include 'includes/scripts.php'; ?>

</body>
</html>





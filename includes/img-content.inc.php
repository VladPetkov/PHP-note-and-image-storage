<?php 

require 'dbh.inc.php'; 

$currentUserId= $_SESSION['userId'];

$sql = "SELECT * FROM usersob where idUsers = $currentUserId ORDER BY time DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$image = $row['img'];
      echo  "<div id='item".$row['id']."' style='width: 26rem;'>".
       $row["time"].
      "<button class='btn btn-sm btn-danger float-right' onclick='removeThis(\"image\",".$row['id'].")' >Remove</button>" .
      "<img class='img-thumbnail' src='$image' >" ."</div>" ;
       
    }
} else {
   echo "0 results";
}
$conn->close();

?>









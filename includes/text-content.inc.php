
<?php 

require 'dbh.inc.php'; 
$currentUserId= $_SESSION['userId'];

$sql = "SELECT * FROM userstext  where idUsers = $currentUserId ORDER BY time DESC ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row

       

    while($row = $result->fetch_assoc()) {

        echo  "<div id='item".$row['id'] ."'  style='width: 26rem;'>".
         $row["time"].
         "<button class='btn btn-sm btn-danger float-right 'onclick='removeThis(\"text\",".$row['id'].")'>Remove</button>".
         "<button data-row-id='".$row['id']."' data-toggle='modal' data-target='#EditModal' class='btn btn-sm btn-warning float-right'onclick='manageModal(".$row['id'].")'>Edit</button>".
         "<p id='content_".$row['id']."'class='font-weight-bold'>".
         $row["text"]."</p>"."</div>". "<br>";

    }
} else {
   echo "0 results";
}



$conn->close();


?>



<script type="text/javascript">
    
function manageModal(id){
    var element = document.querySelector('#content_'+ id );
    console.log(element.innerHTML);
    var editText = document.querySelector('#editText');
    editText.value = element.innerHTML;

var editTextId = document.querySelector('#editTextId');
    editTextId.value = id;
}

document.addEventListener("DOMContentLoaded", function(){
    var element = document.querySelector('#submitForm' );
    console.log(element);


element.addEventListener(
    "click",
    function(event){event.preventDefault();
         var editText = document.querySelector('#editText');
        var editTextId = document.querySelector('#editTextId');
        editThis("text", editTextId.value ,editText.value);
    },0
);

});






</script>
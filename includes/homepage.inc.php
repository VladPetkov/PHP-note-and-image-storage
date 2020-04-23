<?php require 'dbh.inc.php'; 
$pic= "img/responsive.png";

$currentUserId= $_SESSION['userId'];

$sql = "SELECT * FROM users where idUsers = $currentUserId ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $user = $row["uidUsers"];
    }
} else {
  //  echo "0 results";
}
//$conn->close();




?>







<div class="container py-3">
    <div class="row justify-content-center py-5">
      <div class="col-lg-6">
        <h3 class="pb-4"> Hello, <?php echo  $user; ?> </h3>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalCenter">Добави елемент!!! </button>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>




  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Моля изберете!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button type="button"    data-toggle="modal"  data-target="#exampleModalCenter2" class="btn btn-primary btn-lg"   class="close" data-dismiss="modal"  > Добави текст </button>
        <button type="button"  data-toggle="modal"  data-target="#exampleModalCenter3"   class="btn btn-primary btn-lg" class="close" data-dismiss="modal">Добави изображение </button>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- modal for  text-->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Моля въведете текст!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">  
<!-- open form for text-->

  <form method="post" action="includes/text-form.inc.php">
 
  <div class="form-group">
    
    <textarea class="form-control" name="textbox" id="exampleFormControlTextarea1" rows="10"></textarea>
    <br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<!-- close form for text-->
     </div>

    </div>
  </div>
</div>



<!-- modal for  img-->
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Моля изберете изображение!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">

                 <!-- open form for img -->
          <form method="post" action="includes/img-form.inc.php" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name ="img" class="form-control-file" id="exampleFormControlFile1">
              <br>
              <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
           </div>
        </form>
                <!-- close form for img -->
      </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">
 <?php require 'text-content.inc.php'; ?>
    </div>
    <div class="col ">
    <?php require 'img-content.inc.php'; ?>
    </div>
  </div>
</div>









<script type="text/javascript">
   /*AJAX Delete*/
   function removeThis(type,id){
   
       if(confirm('Are you sure you want to delete this item?')){
         
         $.ajax({
              type:'post',
              url:'includes/delete.inc.php',
              data:{type:type ,item_id:id},
              success:function(data){
              console.log(data);
                   $('#item'+id).hide('slow');
              }
         });
       }
       else{



       }
   }

  
/*AJAX Edit*/
function editThis(type,id,content){
   
       if(confirm('Are you sure you want to edit this item?')){
         
         $.ajax({
              type:'post',
              url:'includes/edit.inc.php',
              data:{type:type ,item_id:id,content:content},
              success:function(data){
              var modalCloseButton = document.querySelector("#dismissButton");
              modalCloseButton.click();
               var element = document.querySelector('#content_'+ id );
               element.innerHTML= content;
                     }
         });
       }
       else{



       }
   }


</script>


<!-- modal for edit text-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Моля въведете текст!</h5>
        <button type="button" class="close" data-dismiss="modal" id="dismissButton" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">  
<!-- open form for edit text-->

  <form method="post" action="includes/edit.inc.php">
 
  <div class="form-group">
    <input type="hidden" id="editTextId">
    <textarea class="form-control" name="textbox" id="editText" rows="10"></textarea>
    <br>
    <button type="submit" name="submit" id="submitForm" class="btn btn-primary">Submit</button>
  </div>
</form>
<!-- close form for edit text-->
     </div>

    </div>
  </div>
</div>

<?php 
     echo '
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <h5>';
         echo $_SESSION['msg'];
 echo'
         </h5>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
 </div>';
?>
<?php
if($_SESSION['role'] == 'USER'){
?>
<div class="row">
           <nav class="d-flex justify-content-between bg-secondary mt-3">
            
            <ul class="nav">
               <li class="nav-item">
                  <a class="btn btn-secondary btn-lg" href="add_user.php">
                  ADD
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-secondary btn-lg" href="edit_user.php">
                  UPDATE
                  </a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-secondary btn-lg" href="delete_user.php">
                  DELETE
                  </a>
               </li>
            </ul>
            </nav>
  </div>
  
<?php
 }
?>
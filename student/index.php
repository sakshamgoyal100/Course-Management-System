<?php

include('C:\xampp\htdocs\test\common\header.php'); 
include('C:\xampp\htdocs\test\common\nav.php');
     
     if(@$_SESSION['showMsg']) {

        $class = (@$_SESSION['showMsg']['type'] == 'delete') ? 'alert-danger' : 'alert-warning';

        echo "<div class='mt-3 alert ".$class." alert-dismissible fade show' id='alert' role='alert'>
             ".@$_SESSION['showMsg']['message']."
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
             </button> 
             </div>";
        unset($_SESSION['showMsg']);     
    }
?>

        <div class="mt-5">
            <h2>Student List</h2>
            <table class="table table-striped mt-3">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>

<?php
        // Fetching users from the database and displaying them in the table
        include 'C:\xampp\htdocs\test\common\config.php'; // This file contains the database connection settings
        $limit = 4 ;
         
        if (@$_GET['page']) {
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $offset = ($page - 1)* $limit ;

        $sql = "SELECT * FROM student LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['class']."</td>";

            if($_SESSION['role'] == 'USER'){
            echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='edit_user.php?id=".$row['id']."'>Edit</a><a class='btn btn-danger' href='delete_user.php?id=".$row['id']."'>Delete</a> </div> </td>";
            }
            if($_SESSION['role'] == 'TEACHER'){
            echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='#'>Details</a></div> </td>";
            }
            echo "</tr>";
        }
    
echo "</table>";
echo "</div>";

        $sql1 = "SELECT * FROM student";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

        if (mysqli_num_rows($result1) > 0) {
             $total_records = mysqli_num_rows($result1);
             $total_pages = ceil($total_records/$limit);

             echo "<ul class='pagination justify-content-center'>";
             for ($i=1; $i <= $total_pages ; $i++) {

                   if ($i == $page) {
                         $active = "active";
                     }else{
                         $active = "";
                     }

                   echo "<li class='page-item ".$active." '><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";
             } 
             echo "</ul>";
        }

include('C:\xampp\htdocs\test\common\footer.php');

?>

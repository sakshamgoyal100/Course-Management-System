    <?php
    include('C:\xampp\htdocs\test\common\header.php');
    ?>

    <!-- <div class="row bg-secondary h-25">
        <h4 class="text-capitalize text-white"> Hello Mr. <?= $_SESSION['name']; ?> </h4>
        <img height="100px" width="100px" src="image/<?= $_SESSION['name']; ?>.jpg" class="img-responsive">
    </div> -->
   
    <?php
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
    <h2>Course List</h2>
    <table class="table table-striped mt-3">
        <tr class="table-dark">
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Duration</th>
            <th>Course Price</th>
            <th>Course Start Date</th>
            <th>Course End Date</th>
            <th>Assigned Teacher</th>
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

            $sql = "SELECT * FROM course LEFT JOIN teacher ON course.teacher_id = teacher.id LIMIT {$offset},{$limit}";
            
            if($_SESSION['role'] == 'TEACHER'){

                  $sql = "SELECT * FROM course INNER JOIN teacher ON course.teacher_id = teacher.id AND teacher_id = ".$_SESSION['id']." LIMIT {$offset},{$limit}";
            }

            $result = mysqli_query($conn, $sql) or die("Query Failed.");
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['courseId']."</td>";
                echo "<td>".$row['courseName']."</td>";
                echo "<td>".$row['courseDuration']."</td>";
                echo "<td>".$row['coursePrice']."</td>";
                echo "<td>".$row['courseStartDate']."</td>";
                echo "<td>".$row['courseEndDate']."</td>";
                echo "<td>".$row['name']."</td>";        //Display assigned teacher's id
                
                if($_SESSION['role'] == 'USER'){
                echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='edit_user.php?courseId=".$row['courseId']."'>Edit</a><a class='btn btn-danger' href='delete_user.php?courseId=".$row['courseId']."'>Delete</a> </div> </td>";
                }
                if($_SESSION['role'] == 'TEACHER'){
                echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='#'>Details</a></div> </td>";
                }
                if($_SESSION['role'] == 'STUDENT'){
                echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='#'>Details</a><a class='btn btn-danger' href='#'>Details</a> </div> </td>";
                }


                echo "</tr>";
            }
        
    echo "</table>";
    echo "</div>";

             $sql1 = "SELECT * FROM course";

             if($_SESSION['role'] == 'TEACHER'){

                  $sql1 = "SELECT * FROM course INNER JOIN teacher ON course.teacher_id = teacher.id AND teacher_id = ".$_SESSION['id'];
                }

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

<?php
    include ('C:\xampp\htdocs\test\common\config.php');
    include ('C:\xampp\htdocs\test\common\header.php');

    $user = "SELECT COUNT(*) FROM user";
    $student = "SELECT COUNT(*) FROM student";
    $course = "SELECT COUNT(*) FROM course";
    $teacher = "SELECT COUNT(*) FROM teacher";
    
    $user_result = mysqli_query($conn, $user);
    $student_result = mysqli_query($conn, $student);
    $course_result = mysqli_query($conn, $course);
    $teacher_result = mysqli_query($conn, $teacher);

    // Check if queries were successful
    if (!$user_result || !$student_result || !$course_result || !$teacher_result) {
                die("Error executing queries: " . mysqli_error($conn));
    }

    // Fetch the counts as associative arrays
    $user_count = mysqli_fetch_assoc($user_result);
    $student_count = mysqli_fetch_assoc($student_result);
    $course_count = mysqli_fetch_assoc($course_result);
    $teacher_count = mysqli_fetch_assoc($teacher_result);

?>

<div class="row justify-content-around mt-3">
   <div class="card col-md-4 bg-danger text-white">
     <div class="card-body">
            <div class="card-text row">
                       <div class="col">
                         <i class="bi bi-globe" style="font-size: 7rem;"></i>
                       </div>
                       <div class="col">
                       <h2 class="text-end pt-5"><?php echo "".$user_count['COUNT(*)'].""; ?></h2>
                       <h4 class="text-end">USER</h4>
                       </div>
            </div>
     </div>
   </div>
   <div class="card col-md-4 bg-info text-white">
     <div class="card-body">
            <div class="card-text row">
                       <div class="col">
                         <i class="bi bi-file-person" style="font-size: 7rem;"></i>
                       </div>
                       <div class="col">
                       <h2 class="text-end pt-5"><?php echo "".$student_count['COUNT(*)'].""; ?></h2>
                       <h4 class="text-end">STUDENT</h4>
                       </div>
            </div>
     </div> 
   </div>
</div>
<div class="row justify-content-around mt-3">   
   <div class="card col-md-4 bg-warning text-white">
     <div class="card-body">
            <div class="card-text row">
                       <div class="col">
                         <i class="bi bi-book-fill" style="font-size: 7rem;"></i>
                       </div>
                       <div class="col">
                       <h2 class="text-end pt-5"><?php echo "".$course_count['COUNT(*)'].""; ?></h2>
                       <h4 class="text-end">COURSES</h4>
                       </div>
            </div>
     </div> 
   </div>
   <div class="card col-md-4 bg-success text-white">
     <div class="card-body">
            <div class="card-text row">
                       <div class="col">
                         <i class="bi bi-person-fill" style="font-size: 7rem;"></i>
                       </div>
                       <div class="col">
                       <h2 class="text-end pt-5"><?php echo "".$teacher_count['COUNT(*)'].""; ?></h2>
                       <h4 class="text-end">TEACHER</h4>
                       </div>
            </div>
     </div> 
   </div>
</div>      


<?php    
    include ('C:\xampp\htdocs\test\common\footer.php');
?>    
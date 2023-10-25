<?php
    include ('D:\xampp\htdocs\test\common\config.php');
    include ('D:\xampp\htdocs\test\common\header.php');

    $student = "SELECT COUNT(*) FROM student";
    $course = "SELECT COUNT(*) FROM course";
    $teacher = "SELECT COUNT(*) FROM teacher";
    
    $student_result = mysqli_query($conn, $student);
    $course_result = mysqli_query($conn, $course);
    $teacher_result = mysqli_query($conn, $teacher);

    // Check if queries were successful
    if (!$student_result || !$course_result || !$teacher_result) {
                die("Error executing queries: " . mysqli_error($conn));
    }

    // Fetch the counts as associative arrays
    $student_count = mysqli_fetch_assoc($student_result);
    $course_count = mysqli_fetch_assoc($course_result);
    $teacher_count = mysqli_fetch_assoc($teacher_result);

?>

<div class="row justify-content-around mt-5">
   <div class="card col-md-3 bg-info text-white">
     <div class="card-body">
            <div class="card-text row">
                       <div class="col">
                         <i class="bi bi-file-person" style="font-size: 7rem;"></i>
                       </div>
                       <div class="col">
                       <h2 class="text-end pt-5"><?php echo "".$student_count['COUNT(*)'].""; ?></h2>
                       <h4 class="text-end">STUDENTS</h4>
                       </div>
            </div>
     </div> 
   </div>
   <div class="card col-md-3 bg-warning text-white">
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
   <div class="card col-md-3 bg-success text-white">
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


<?php    
    include ('D:\xampp\htdocs\test\common\footer.php');
?>    
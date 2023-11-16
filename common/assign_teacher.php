<?php
    
    include ('C:\xampp\htdocs\test\common\config.php');
    include ('C:\xampp\htdocs\test\common\header.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $teacher_id  = $_POST['teacher_id'];
        $course_id  = $_POST['courseId'];
        
        if ($teacher_id !== "" && $course_id !== "" ) {
            
            $sql = "UPDATE course SET teacher_id='$teacher_id'  WHERE courseId=".$course_id;
            $result = mysqli_query($conn, $sql);

            if ($result) {

                $_SESSION['showMsg'] = array('message' => "Teacher Assigned to Course Successfully.", 'type' => 'assigned');
                header('Location: http://localhost/test/teacher/index.php'); // Redirect back to the main page after successful update
            } 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
        }else{

             echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
                   Please enter valid data.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button> 
                  </div>";

            }       
    }      

    
	
	$teacher_sql = "SELECT * FROM teacher";
	$teacher_result = mysqli_query($conn, $teacher_sql);

	$course_sql = "SELECT * FROM course";
	$course_result = mysqli_query($conn, $course_sql);
    
        
?>

    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="assign_teacher.php" method="post">
            <h4 class="text-center">Assign Teacher</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="teacher_id">Teacher Name</label>
                 <select name="teacher_id" class="form-select mt-3">
                         <option selected value="">Select Teacher Name</option>
                         <?php
                         while ($teacher= mysqli_fetch_assoc($teacher_result)) {
                         	echo "<option value='".$teacher['id']."'>".$teacher['name']."</option>";
                         }
                         ?>
                 </select>
           </div>
           <div class="form-group">
                 <label class="form-label mt-3" for="courseId">Course Name</label>
                 <select name="courseId" class="form-select mt-3">
                         <option selected value="">Select Course Name</option>
                         <?php
                         while ($course = mysqli_fetch_assoc($course_result)) {
                         	echo "<option value='".$course['courseId']."'>".$course['courseName']."</option>";
                         }
                         ?>
                 </select>
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-5">Assign Course</button>
    </form>

<?php        
   include ('C:\xampp\htdocs\test\common\footer.php');
?>         
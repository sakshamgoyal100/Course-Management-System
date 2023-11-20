<?php
    include ('C:\xampp\htdocs\test\common\config.php');
    include ('C:\xampp\htdocs\test\common\header.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $student_id  = $_POST['StudentId'];
        $course_id  = $_POST['CourseId'];

        if ($student_id && $course_id ) {

        	$sql = "SELECT MappingId FROM studentcoursemapping WHERE CourseId = '$course_id' AND StudentId = '$student_id'";
            $result = mysqli_query($conn, $sql);
            $mapping_data = mysqli_fetch_assoc($result);

            if(count($mapping_data) == 0){

                	$sql = "INSERT INTO studentcoursemapping (CourseId,StudentId) VALUES ('$course_id','$student_id')";
                	$result = mysqli_query($conn, $sql);

                	if ($result) {

    	                $_SESSION['showMsg'] = array('message' => "Course Assigned Successfully.", 'type' => 'assigned');
    	                header('Location: http://localhost/test/student/index.php'); // Redirect back to the main page after successful update
    	            }else{
    	                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    	               }

            }else{

            	echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
	             	This course is already assigned to this student
	              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
	              <span aria-hidden='true'>&times;</span>
	              </button> 
	              </div>";

            }

            
        }else{
         	echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
              Please Enter correct data.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button> 
              </div>";
         } 
        

    }
	
	$student_sql = "SELECT * FROM student";
	$student_result = mysqli_query($conn, $student_sql);


	$course_sql = "SELECT * FROM course";

    if($_SESSION['role'] == 'TEACHER'){
        $course_sql .= ' WHERE teacher_id = '.$_SESSION['id'];
    }

	$course_result = mysqli_query($conn, $course_sql);
    
        
?>

    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="assign_course.php" method="post">
            <h4 class="text-center">Assign Course</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="StudentId">Student Name</label>
                 <select name="StudentId" class="form-select mt-3">
                         <option selected value="">Select Student Name</option>
                         <?php
                         while ($student= mysqli_fetch_assoc($student_result)) {
                         	echo "<option value='".$student['id']."'>".$student['name']."</option>";
                         }
                         ?>
                 </select>
           </div>
           <div class="form-group">
                 <label class="form-label mt-3" for="CourseId">Course Name</label>
                 <select name="CourseId" class="form-select mt-3">
                         <option selected value="">Select Course Name</option>
                         <?php
                         while ($course = mysqli_fetch_assoc($course_result)) {
                         	echo "<option value='".$course['courseId']."'>".$course['courseName']."</option>";
                         }
                         ?>
                 </select>
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-5">Enroll Student</button>
    </form>

<?php        
   include ('C:\xampp\htdocs\test\common\footer.php');
?>         
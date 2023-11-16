<?php
    
    include ('C:\xampp\htdocs\test\common\config.php');
    include ('C:\xampp\htdocs\test\common\header.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id  = $_POST['studentId'];
        $course_id  = $_POST['courseId'];
        $grade  = $_POST['grade'];

        $teacher_name = $_SESSION['name'];

        if($_POST['courseId']){
            $course_sql = "SELECT * FROM course WHERE courseId=".$_POST['courseId'];
            $course_result = mysqli_query($conn, $course_sql);
            $course = mysqli_fetch_assoc($course_result);
            $course_duration = $course['courseDuration'];
            $course_name = $course['courseName'];
        }

        if($_POST['studentId']){

            $student_sql = "SELECT * FROM student WHERE id=".$_POST['studentId'];
            $student_result = mysqli_query($conn, $student_sql);
            $student = mysqli_fetch_assoc($student_result);
            $student_email = $student['email'];
            $student_name = $student['name'];

            $certificate_sql = "SELECT studentId, courseId FROM certificate WHERE studentId =".$_POST['studentId']." AND courseId =".$_POST['courseId'];
            $certificate_result = mysqli_query($conn, $certificate_sql);
        }
        
        if ($student_id !== "" && $course_id !== "" && ($certificate = mysqli_num_rows($certificate_result))== 0 ) {

            $sql = "INSERT INTO certificate (courseId,studentId,studentName,studentEmail,courseName, grade, courseDuration,teacherName) VALUES ('$course_id','$student_id','$student_name','$student_email','$course_name', '$grade', '$course_duration','$teacher_name')";

            $result = mysqli_query($conn, $sql);

            if ($result) {

                $last_insert_id = mysqli_insert_id($conn);

                $_SESSION['showMsg'] = array('message' => "Certificate Generated Successfully.", 'type' => 'generated');
                header('Location: http://localhost/test/common/view_certificate.php?certificate_id='.$last_insert_id.'&sendemail=true&redirect_url=test/student/index.php'); // Redirect back to the main page after successful update
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


	$course_sql = "SELECT * FROM course WHERE teacher_id=".$_SESSION['id'];
	$course_result = mysqli_query($conn, $course_sql);
        
?>

    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="generate_certificate.php" method="post">
            <h4 class="text-center">Certificate</h4>
           <div class="form-group">
                 <label class="form-label mt-3" for="courseId">Course Name</label>
                 <select name="courseId" class="form-select mt-3" id="coursedropdown">
                         <option selected value="">Select Course Name</option>
                         <?php
                         while ($course = mysqli_fetch_assoc($course_result)) {
                         	echo "<option value='".$course['courseId']."'>".$course['courseName']."</option>";
                         }
                         ?>
                 </select>
           </div>
           <div class="form-group">
                 <label class="form-label mt-3" for="studentId">Student Name</label>
                 <select name="studentId" class="form-select mt-3" id="studentresult">
                         <option selected value="">Select Student Name</option>
                         
                 </select>
           </div>
           <div class="form-group">
                 <label class="form-label mt-3" for="grade">Grade</label>
                 <select name="grade" class="form-select mt-3" >
                         <option selected value="">Select Grade</option>
                         <option value="A1">A1</option>
                         <option value="A2">A2</option>
                         <option value="B1">B1</option>
                         <option value="B2">B2</option>
                         <option value="C1">C1</option>
                 </select>
           </div>
           
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-5">Generate Certificate</button>
    </form>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#coursedropdown").change(function () {

                var course_id = $(this).val();
                var option = '<option selected value="">Select Student Name</option>'
                
                $.ajax({
                    url: "api.php", // Specify the correct URL
                    type: "GET",
                    data: { method: "getStudents", course_id : course_id }, // Pass data to the server
                    success: function (response) {

                        response = JSON.parse(response);

                        if(response['status'] == 'error'){

                            $('#studentresult').html(option);
                        }
                        else{

                            $(response['data']).each((key, value) => {
        
                                option += `<option value="${value['id']}">${value['name']}</option>`;
                            });

                            $('#studentresult').html(option);
                        }

                    }
                });
            });
        });

    </script>

<?php        
   include ('C:\xampp\htdocs\test\common\footer.php');
?>         
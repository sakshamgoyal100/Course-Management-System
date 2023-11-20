<?php 

include ('C:\xampp\htdocs\test\common\config.php');

	if(@$_GET['method']){
		$_GET['method']($conn);
	}
    if(@$_POST['method']){
        $_POST['method']($conn);
    }


function getStudents($conn){


	$student_sql = "SELECT * FROM student INNER JOIN studentcoursemapping ON student.id = studentcoursemapping.StudentId WHERE studentcoursemapping.courseId = ".$_GET['course_id'];

    $student_result = mysqli_query($conn, $student_sql);
    
    $students = array(); // Initialize an empty array to store all students

    while ($student = mysqli_fetch_assoc($student_result)) {
        $students[] = $student; // Add each student to the array
    }

    if(!empty($students)){

         die(json_encode(array('status' => 'success', 'data' => $students)));
    }
    else{

    	die(json_encode(array('status' => 'error', 'data' => $student)));
    }

}

function getReport($conn) {
    $certificate_sql = "SELECT grade , COUNT(grade) AS total FROM certificate WHERE courseId =" . $_GET['course_id'] . " GROUP BY grade";
    $certificate_result = mysqli_query($conn, $certificate_sql);
    
    $certificates = array(); // Initialize an empty array to store all certificates

    while ($certificate = mysqli_fetch_assoc($certificate_result)) {
        $certificates[] = $certificate; // Add each certificate to the array
    }

    if (!empty($certificates)) {
        $response = json_encode(array('status' => 'success', 'data' => $certificates));
        echo $response;
        die();
    } else {
        $response = json_encode(array('status' => 'error', 'message' => 'No records found'));
        echo $response;
        die();
    }
};







?>
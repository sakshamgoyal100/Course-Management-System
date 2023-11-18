<?php
     include('C:\xampp\htdocs\test\common\header.php');
     include 'C:\xampp\htdocs\test\common\config.php';
     
    if ($_SESSION['role'] == "USER") {
        
        $course_sql = "SELECT courseId,courseName FROM course";

    }else{

        $course_sql = "SELECT courseId,courseName FROM course WHERE teacher_id=".$_SESSION['id'];

    }


	//$course_sql = "SELECT courseName FROM course WHERE teacher_id=".$_SESSION['id'];
	$course_result = mysqli_query($conn, $course_sql);

     
?>
		<div class="mt-5">
		    <h2>Grade Report</h2>
		    
        <div class="row">
            <div class="col-md-6">
            <select name="courseId" class="form-select mt-3" id="coursedropdown">
                         <option selected value="">Select Course Name</option>
                         <?php
                         while ($course = mysqli_fetch_assoc($course_result)) {
                            echo "<option value='".$course['courseId']."'>".$course['courseName']."</option>";
                         }
                         ?>
            </select>    
		    <table class=" table table-striped mt-3">
			        <tr class="table-dark">
			            <th>Grade</th>
			            <th>No.Of Students</th>
			        </tr>
                    <tbody id="tableResult">
			           <tr>
                         <td><h3>Please select course.</h3></td>
                         <td></td>      
                       </tr>
                    </tbody>
            </table>
            </div>
        </div>        
    <script type="text/javascript">
    $(document).ready(function () {
        $("#coursedropdown").change(function () {

            var course_id = $(this).val();
            var table_content = ''; // Initialize the table_content variable

            $.ajax({
                url: "http://localhost/test/common/api.php",
                type: "GET",
                data: { method: "getReport", course_id : course_id },
                success: function (response) {
                    response = JSON.parse(response);

                    if(response['status'] == 'error'){
                        
                        table_content = '<tr><td><h3>'+response['message']+'</h3></td></tr>';

                    }else{

                        $(response['data']).each((key, value) => {
                            table_content += `<tr><td>${value['grade']}</td><td>${value['total']}</td></tr>`;
                        });
                    }

                    $('#tableResult').html(table_content);

                }
            });
        });
    });
</script>





<?php

	include('C:\xampp\htdocs\test\common\footer.php');                

?>
     

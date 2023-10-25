<?php
     include('D:\xampp\htdocs\test\common\header.php');
     include 'D:\xampp\htdocs\test\common\config.php';

     $certificate_sql = "SELECT * FROM certificate WHERE studentId='".$_SESSION['id']."'";
     $certificate_result = mysqli_query($conn, $certificate_sql) or die("Query Failed.");

    if(mysqli_num_rows($certificate_result) > 0){
?>
		<div class="mt-5">
		    <h2>Certificate List</h2>
		    <table class="table table-striped mt-3">
			        <tr class="table-dark">
			            <th>Student Name</th>
			            <th>Course Name</th>
			            <th>Course Duration</th>
			            <th>Grade</th>
			            <th>Teacher Name</th>
			            <th>Action</th>
			        </tr>
<?php
	    while ($certificate = mysqli_fetch_assoc($certificate_result)) {
	                echo "<tr>";
		                echo "<td>".$certificate['studentName']."</td>";
		                echo "<td>".$certificate['courseName']."</td>";
		                echo "<td>".$certificate['courseDuration']."</td>";
		                echo "<td>".$certificate['grade']."</td>";
		                echo "<td>".$certificate['teacherName']."</td>";
		                echo "<td> <div class='btn-group'> <a class='btn btn-warning ' href='http://localhost/test/common/view_certificate.php?certificate_id=".$certificate['certificate_id']."'>View Certificate</a></div> </td>";
	                echo "</tr>";
	           }
	        echo "</table>";   
	}else{
		echo "<h1>No Record Found.</h1>";
	}

	include('D:\xampp\htdocs\test\common\footer.php');                

?>
     

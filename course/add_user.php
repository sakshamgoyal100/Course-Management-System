<?php
    include ('D:\xampp\htdocs\test\common\config.php');
    include ('D:\xampp\htdocs\test\common\header.php');
    include('nav.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cname = $_POST['courseName'];
        $cduration = $_POST['courseDuration'];
        $cprice = $_POST['coursePrice'];
        $cstartdate = $_POST['courseStartDate'];
        $cenddate = $_POST['courseEndDate'];

        // if (@$_FILES['image']) {
        //     $file_name = $_FILES['image']['name'];
        //     $file_tmp = $_FILES['image']['tmp_name'];

        //     move_uploaded_file($file_tmp, "C:/xampp/htdocs/test/image/$name.jpg");
        // }
        

        $sql = "INSERT INTO course (courseName,courseDuration, coursePrice, courseStartDate,courseEndDate) VALUES ('$cname','$cduration', '$cprice', '$cstartdate','$cenddate')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['showMsg'] = array('message' => "Data added successfully.", 'type' => 'add');
            header('Location: index.php'); // Redirect back to the main page after successful insertion
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
    <form class="mx-auto w-25 mt-4 p-4 bg-white rounded border border-primary" action="add_user.php" method="post" enctype="multipart/form-data">
           <h4 class="text-center">Add User</h4>
           <div class="form-group">
                 <label class="form-label" for="courseName">Course Name</label>
                 <input type="text" name="courseName" class="form-control" id="courseName" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="courseDuration">Course Duration</label>
                 <input type="text" name="courseDuration" class="form-control" id="courseDuration" >
           </div>
           <div class="form-group"> 
                 <label class="form-label" for="coursePrice">Course Price</label>
                 <input type="text" name="coursePrice" class="form-control" id="coursePrice" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="courseStartDate">Course Start Date</label>
                 <input type="date" name="courseStartDate" class="form-control" id="courseStartDate" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="courseEndDate">Course End Date</label>
                 <input type="date" name="courseEndDate" class="form-control" id="courseEndDate" >
           </div>
           <!-- <div class="form-group">
                 <input class="form-control mt-2" type="file" name="image">
           </div> -->      
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-2">Add User</button>
    </form>


<?php
   include ('D:\xampp\htdocs\test\common\footer.php');
?>   
  
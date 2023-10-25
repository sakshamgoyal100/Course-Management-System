<?php
    include ('D:\xampp\htdocs\test\common\config.php');
    include ('D:\xampp\htdocs\test\common\header.php');
    include('nav.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cid  = $_POST['courseId'];
        $cname = $_POST['courseName'];
        $cduration = $_POST['courseDuration'];
        $cprice = $_POST['coursePrice'];
        $cstartdate = $_POST['courseStartDate'];
        $cenddate = $_POST['courseEndDate'];

        $sql = "UPDATE course SET courseName='$cname', courseDuration='$cduration', coursePrice='$cprice', courseStartDate='$cstartdate', courseEndDate='$cenddate' WHERE courseId=".$cid;
        if (mysqli_query($conn, $sql)) {
            $_SESSION['showMsg'] = array('message' => "Data updated successfully.", 'type' => 'update');
            header('Location: index.php'); // Redirect back to the main page after successful update
              } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
      }
        elseif (isset($_GET['courseId']) || isset($_GET['courseName']) ) {
            if (isset($_GET['courseId']) && $_GET['courseId'] !== "") {
                   $id = $_GET['courseId'];
                   $sql = "SELECT * FROM course WHERE courseId='$id'";
                   $result = mysqli_query($conn, $sql);
                   $user = mysqli_fetch_assoc($result);
            } else if (isset($_GET['courseName'])) {
                   $name = $_GET['courseName'];
                   $sql = "SELECT * FROM course WHERE courseName='$name'";
                   $result = mysqli_query($conn, $sql);
                   $user = mysqli_fetch_assoc($result);
                }

        
?>

    <form class="mx-auto w-25 mt-4 p-4 bg-white rounded border border-primary" action="edit_user.php" method="post">
           <h4 class="text-center">Update User</h4>
           <div class="form-group">
                 <input type="hidden" name="courseId" value="<?php echo $user['courseId']; ?>">
           </div> 
           <div class="form-group">
                 <label class="form-label" for="courseName">Course Name</label>
                 <input type="text" name="courseName" class="form-control" id="courseName" value="<?php echo $user['courseName']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="courseDuration">Course Duration</label>
                 <input type="text" name="courseDuration" class="form-control" id="courseDuration" value="<?php echo $user['courseDuration']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="coursePrice">Course Price</label>
                 <input type="text" name="coursePrice" class="form-control" id="coursePrice" value="<?php echo $user['coursePrice']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="courseStartDate">Course Start Date</label>
                 <input type="text" name="courseStartDate" class="form-control" id="courseStartDate" value="<?php echo $user['courseStartDate']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="courseEndDate">Course Start Date</label>
                 <input type="text" name="courseEndDate" class="form-control" id="courseEndDate" value="<?php echo $user['courseEndDate']; ?>" required >
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-4">Update Course</button>
    </form>
<?php } 
     elseif (!@($_GET['courseId'])) {
?>
    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="edit_user.php">
            <h4 class="text-center">Update Course</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="courseId">Course Id</label>
                 <input type="text" name="courseId" class="form-control mt-3" id="courseId">
           </div>
           <h4 class="text-center mt-3 text-secondary">OR</h4>
           <div class="form-group">
                 <label class="form-label mt-2" for="courseName">Course Name</label>
                 <input type="text" name="courseName" class="form-control mt-3" id="courseName">
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill my-4">Fetch Course Detail</button>
    </form>

<?php        
     }
   include ('D:\xampp\htdocs\test\common\footer.php');
?>   
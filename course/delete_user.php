<?php
    include 'D:\xampp\htdocs\test\common\config.php';
    include 'D:\xampp\htdocs\test\common\header.php';
    include('nav.php');
    if (isset($_GET['courseId']) || isset($_GET['courseName'])) {
        if (isset($_GET['courseId']) && $_GET['courseId'] !== "") {
            $id = $_GET['courseId'];
            $sql = "DELETE FROM course WHERE courseId=$id";
            $result = mysqli_query($conn, $sql);
        }else if (isset($_GET['courseName'])) {
            $name = $_GET['courseName'];
            $sql = "DELETE FROM course WHERE courseName='$name'";
            $result = mysqli_query($conn, $sql);
            }        
        if ($result) {
            $_SESSION['showMsg'] = array('message' => "Data deleted successfully.", 'type' => 'delete');
            header('Location: index.php'); // Redirect back to the main page after successful deletion
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
    elseif (!@($_GET['courseId'])) {
?>
    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="delete_user.php">
            <h4 class="text-center">Delete Course</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="courseId">Course Id</label>
                 <input type="text" name="courseId" class="form-control mt-3" id="courseId">
           </div>
           <h4 class="text-center mt-3 text-secondary">OR</h4>
           <div class="form-group">
                 <label class="form-label mt-2" for="courseName">Course Name</label>
                 <input type="text" name="courseName" class="form-control mt-3" id="courseName">
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill my-4">Delete record</button>
    </form>

<?php
    }        
    include ('D:\xampp\htdocs\test\common\footer.php');
?>

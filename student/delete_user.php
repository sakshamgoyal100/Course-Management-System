<?php
    include 'C:\xampp\htdocs\test\common\config.php';
    include 'C:\xampp\htdocs\test\common\header.php';
    include('C:\xampp\htdocs\test\common\nav.php');
    

    if (isset($_GET['id']) || isset($_GET['name'])) {

        if (isset($_GET['id']) && $_GET['id'] !== "") {
            
            $id = $_GET['id'];
            $sql = "DELETE FROM student WHERE id=$id";
            $result = mysqli_query($conn, $sql);

        }elseif(isset($_GET['name'])) {

            $name = $_GET['name'];
            $sql = "DELETE FROM student WHERE name='$name'";
            $result = mysqli_query($conn, $sql);

        }

        if ($result) {

            $_SESSION['showMsg'] = array('message' => "Data deleted successfully.", 'type' => 'delete');
            header('Location: index.php'); // Redirect back to the main page after successful deletion

        }else{
            
            echo "Error deleting record: " . mysqli_error($conn);

        }
    
    }elseif (!@($_GET['id'])) {
?>
    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="delete_user.php">
            <h4 class="text-center">Delete Student</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="id">ID</label>
                 <input type="text" name="id" class="form-control mt-3" id="id">
           </div>
           <h4 class="text-center mt-3 text-secondary">OR</h4>
           <div class="form-group">
                 <label class="form-label mt-2" for="name">NAME</label>
                 <input type="text" name="name" class="form-control mt-3" id="name">
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill my-4">Delete record</button>
    </form>

<?php
    }        
    include ('C:\xampp\htdocs\test\common\footer.php');
?>

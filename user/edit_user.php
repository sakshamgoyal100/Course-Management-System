<?php
    include ('C:\xampp\htdocs\test\common\config.php');
    include ('C:\xampp\htdocs\test\common\header.php');
    include('nav.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "UPDATE user SET name='$name', email='$email', mobile='$mobile' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['showMsg'] = array('message' => "Data updated successfully.", 'type' => 'update');
            header('Location: index.php'); // Redirect back to the main page after successful update
           
              } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
      }
        elseif (isset($_GET['id']) || isset($_GET['name']) ) {
            if (isset($_GET['id']) && $_GET['id'] !== "") {
                   $id = $_GET['id'];
                   $sql = "SELECT * FROM user WHERE id='$id'";
                   $result = mysqli_query($conn, $sql);
                   $user = mysqli_fetch_assoc($result);
            } else if (isset($_GET['name'])) {
                   $name = $_GET['name'];
                   $sql = "SELECT * FROM user WHERE name='$name'";
                   $result = mysqli_query($conn, $sql);
                   $user = mysqli_fetch_assoc($result);
                }

        
?>

    <form class="mx-auto w-25 mt-4 p-4 bg-white rounded border border-primary" action="edit_user.php" method="post">
           <h4 class="text-center">Update User</h4>
           <div class="form-group">
                 <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
           </div> 
           <div class="form-group">
                 <label class="form-label" for="name">Name</label>
                 <input type="text" name="name" class="form-control" id="name" value="<?php echo $user['name']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="Email">Email address</label>
                 <input type="email" name="email" class="form-control" id="Email" value="<?php echo $user['email']; ?>" required >
           </div>
           <div class="form-group">
                 <label class="form-label mt-4" for="mobile">Mobile</label>
                 <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $user['mobile']; ?>" required >
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-4">Update User</button>
    </form>
<?php } 
     elseif (!@($_GET['id'])) {
?>
    <form class="mx-auto w-25 mt-5 p-4 rounded border border-primary" action="edit_user.php">
            <h4 class="text-center">Update User</h4>
            <div class="form-group">
                 <label class="form-label mt-3" for="id">ID</label>
                 <input type="text" name="id" class="form-control mt-3" id="id">
           </div>
           <h4 class="text-center mt-3 text-secondary">OR</h4>
           <div class="form-group">
                 <label class="form-label mt-2" for="name">NAME</label>
                 <input type="text" name="name" class="form-control mt-3" id="name">
           </div>
                 <button type="submit" class="btn btn-primary w-100 rounded-pill my-4">Fetch User Detail</button>
    </form>

<?php        
     }
   include ('C:\xampp\htdocs\test\common\footer.php');
?>   
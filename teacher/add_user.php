<?php
    include ('D:\xampp\htdocs\test\common\config.php');
    include ('D:\xampp\htdocs\test\common\header.php');
    include('nav.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // if (@$_FILES['image']) {
        //     $file_name = $_FILES['image']['name'];
        //     $file_tmp = $_FILES['image']['tmp_name'];

        //     move_uploaded_file($file_tmp, "C:/xampp/htdocs/test/image/$name.jpg");
        // }
        

        $sql = "INSERT INTO teacher (name,password, email, mobile) VALUES ('$name','$password', '$email', '$mobile')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['showMsg'] = array('message' => "Data added successfully.", 'type' => 'add');
            header('Location: index.php'); // Redirect back to the main page after successful insertion
      
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>
    <form class="mx-auto w-25 mt-4 p-4 bg-white rounded border border-primary" action="add_user.php" method="post" enctype="multipart/form-data">
           <h4 class="text-center">Add Teacher</h4>
           <div class="form-group">
                 <label class="form-label" for="name">Name</label>
                 <input type="text" name="name" class="form-control" id="name" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="Email">Email address</label>
                 <input type="email" name="email" class="form-control" id="Email" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="Password">Password</label>
                 <input type="password" name="password" class="form-control" id="Password" >
           </div>
           <div class="form-group">
                 <label class="form-label" for="mobile">Mobile</label>
                 <input type="text" name="mobile" class="form-control" id="mobile" >
           </div>
           <!-- <div class="form-group">
                 <input class="form-control mt-2" type="file" name="image">
           </div> -->      
                 <button type="submit" class="btn btn-primary w-100 rounded-pill mt-2">Add Teacher</button>
    </form>


<?php
   include ('D:\xampp\htdocs\test\common\footer.php');
?>   
  
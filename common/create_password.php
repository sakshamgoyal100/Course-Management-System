<?php

  include ('D:\xampp\htdocs\test\common\config.php');

  session_start();


  if (@$_SESSION['email']) {
  	
  	$sql = "SELECT * FROM ".$_SESSION['role']." WHERE email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn, $sql) or die("Query died.");
    $user_data = mysqli_fetch_assoc($result);

  }else{

          header('Location: http://localhost/test/common/login.php');

  }

  if (@$_POST['password']) {
  	
  	$sql = "UPDATE ".$_SESSION['role']." SET password='".$_POST['password']."' WHERE email = '".$_SESSION['email']."'";
  	$result = mysqli_query($conn, $sql) or die("Query .");

  	if ($result) {
  		
  		$_SESSION['showMsg'] = array('message' => "Password updated successfully.", 'type' => 'update');
  	   header('Location: http://localhost/test/common/login.php');	
  	}
  }
  
?>  

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
    <div class="container-fluid">
            <div class="row bg-info py-2">
                 <h1 class="text-white text-center"> Course Management System</h1>
            </div>
    <form class="mx-auto w-25 mt-5 p-4 bg-white rounded border border-primary" action="create_password.php" method="post">
           <h3 class="text-center">Forgot Password</h3>
                  
           <div class="mb-3 form-group">
                 <label class="form-label mt-5" for="password">Create New Password</label>
                 <input type="password" name="password" class="form-control mt-3" placeholder="Enter new password">
                 <button type="submit" class="mt-5 btn btn-primary w-100 rounded-pill">Confirm</button>
           </div>
           
    </form>

<?php

include('D:\xampp\htdocs\test\common\footer.php');

?>  
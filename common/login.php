<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('config.php');

    $sql = "SELECT * FROM user where (email = '".$_POST['email'] ."' AND password = '".$_POST['password']."')";

    $result = mysqli_query($conn, $sql);

    foreach($result as $user){};

    if(!empty($user)){

        $_SESSION['role'] = "USER";
        $_SESSION['id'] = $user['id'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['mobile'] = $user['mobile'];
        header('Location: http://localhost/test/user/home.php');
    
    }

    $stu_sql = "SELECT * FROM student where (email = '".$_POST['email'] ."' AND password = '".$_POST['password']."')";

    $stu_result = mysqli_query($conn, $stu_sql);

    foreach($stu_result as $student){};

    if (!empty($student)) {

        $_SESSION['role'] = "STUDENT";
        $_SESSION['id'] = $student['id'];
        $_SESSION['name'] = $student['name'];
        $_SESSION['password'] = $student['password'];
        $_SESSION['email'] = $student['email'];
        $_SESSION['mobile'] = $student['mobile'];
        header('Location: http://localhost/test/student/home.php');
    
    }

    $tchr_sql = "SELECT * FROM teacher where (email = '".$_POST['email'] ."' AND password = '".$_POST['password']."')";

    $tchr_result = mysqli_query($conn, $tchr_sql);

    foreach($tchr_result as $teacher){};  

    if (!empty($teacher)) {
        
        $_SESSION['role'] = "TEACHER";
        $_SESSION['id'] = $teacher['id'];
        $_SESSION['name'] = $teacher['name'];
        $_SESSION['password'] = $teacher['password'];
        $_SESSION['email'] = $teacher['email'];
        $_SESSION['mobile'] = $teacher['mpbile'];
        header('Location: http://localhost/test/teacher/home.php');
    
    }else{

        echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
              Invalid user id
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button> 
              </div>";
    }

}
else{

    if(@$_SESSION['id']){

          header('Location: http://localhost/test/user/index.php');
      
          }
    elseif(@$_SESSION['showMsg']) {

            echo "<div class='mt-3 alert alert-success alert-dismissible fade show' id='alert' role='alert'>
                 ".@$_SESSION['showMsg']['message']."
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
                 </button> 
                 </div>";     
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
    <form class="mx-auto w-25 mt-5 p-4 bg-white rounded border border-primary" action="login.php" method="post">
           <h3 class="text-center">Login</h3>
           <div class="mt-5 mb-3 form-group">
                 <label class="form-label" for="Email">Email address</label>
                 <input type="email" name="email" class="form-control mt-3" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
           </div>
           <div class="mb-3 form-group">
                 <label class="form-label" for="Password">Password</label>
                 <input type="password" name="password" class="form-control mt-3" id="Password" placeholder="Password">
           </div>
                 <a href="http://localhost/test/common/forgot_password.php">Forgot Password?</a>
                 <button type="submit" class="mt-3 btn btn-primary w-100 rounded-pill">Submit</button>
    </form>
<?php

include('D:\xampp\htdocs\test\common\footer.php');

?>
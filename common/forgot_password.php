<?php

include ('C:\xampp\htdocs\test\common\config.php');

session_start();

if (@$_POST['email']) {
  
  $sql = "SELECT * FROM user WHERE email = '".$_POST['email']."'";
  $result = mysqli_query($conn, $sql) or die("Query Failed.");
  $user_data = mysqli_fetch_assoc($result);
  
  if (!empty($user_data)) {

          $_SESSION['role'] = "user";

      }else{
      
          $sql = "SELECT * FROM teacher WHERE email = '".$_POST['email']."'";
          $result = mysqli_query($conn, $sql) or die("Query Failed.");
          $teacher_data = mysqli_fetch_assoc($result);
          }

  if (!empty($teacher_data)) {

          $_SESSION['role'] = "teacher";

        }else{

                $sql = "SELECT * FROM student WHERE email = '".$_POST['email']."'";
                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                $student_data = mysqli_fetch_assoc($result);

  if (!empty($student_data)) {
                   
                   $_SESSION['role'] = "student";
        }else{

                    echo   "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
                            Please enter correct data.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button> 
                            </div>";  
                 }

    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date('Y-m-d H:i:s');
    $tenminutesLater = date('Y-m-d H:i:s', strtotime($currentDateTime . ' +10 minutes'));
    $otp = rand(1000, 9999);

    $sql = "SELECT * FROM forgotpassword WHERE email = '".$_POST['email']."'";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    $forgot_data = mysqli_fetch_assoc($result);
    //print_r($forgot_data);
    //die();

    if (!empty($forgot_data)) {

           $sql = "UPDATE forgotpassword SET otp='$otp',createdOn= '$currentDateTime' ,expirationTime='$tenminutesLater'  WHERE email='" . $user_data['email'] . "'";
           $result = mysqli_query($conn, $sql) or die("Query Failed.");
           $forgot_id = $forgot_data['id'];          



     }else{

          $sql = "INSERT INTO forgotpassword (email, otp, expirationTime) VALUES ('" . $user_data['email'] . "', '" .$otp. "', '" . $tenminutesLater . "')";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

          $forgot_id = mysqli_insert_id($conn);

      }

          if ($result) {

                

                $url = 'http://localhost/test/common/mail.php';

                $html = "Dear Sir / Madam,

                        Your One Time Password(OTP) is :

                        ".$otp."


                        Your OTP will expire in 10 minutes.


                        Do not share your OTP with anyone";

                // Data to be sent in the POST request (as an associative array)
                $data = [
                    'html' => $html,
                    'subject' => 'Forgot Password',
                    'email' => $_POST['email']
                ];

                // Initialize cURL session
                $curl = curl_init($url);

                // Set cURL options
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string
                curl_setopt($curl, CURLOPT_POST, true); // Set as POST request
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Set POST data
                // You can also set other options like headers, authentication, etc. as needed.

                $response = (array)json_decode(curl_exec($curl));

                if($response['status'] == 'success'){

                    $_SESSION['email'] = $user_data['email']; 
                    $_SESSION['otp'] = $otp;
                    $_SESSION['forgot_id'] = $forgot_id;

                    if(@$_POST['msg']){
                       
                       $_SESSION['msg'] = "OTP resent.";

                    }


                    header('Location: http://localhost/test/common/enter_otp.php');

                }else{
                   
                   echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
                   Your request cannot be processed at this moment.
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button> 
                  </div>";

                }
          }
    
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
    <form class="mx-auto w-25 mt-5 p-4 bg-white rounded border border-primary" action="forgot_password.php" method="post">
           <h3 class="text-center">Forgot Password</h3>
           <!-- <label class="form-label mt-3" for="role">Category</label>
                 <select name="role" class="form-select mt-3"required>
                         <option selected value="">Choose your role</option>
                         <option value="user">USER</option>
                         <option value="teacher">TEACHER</option>
                         <option value="student">STUDENT</option>
                  </select>  -->      
           <div class="mb-3 form-group">
                 <label class="form-label mt-3" for="email">Email address</label>
                 <input type="email" name="email" class="form-control mt-3" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                 <button type="submit" class="mt-3 btn btn-primary w-100 rounded-pill">Send Otp</button>
           </div>
           
    </form>

<?php

include('C:\xampp\htdocs\test\common\footer.php');

?>
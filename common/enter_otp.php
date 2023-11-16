<?php

  include ('C:\xampp\htdocs\test\common\config.php');

  session_start();

  date_default_timezone_set('Asia/Kolkata');
  $currentDateTime = date('Y-m-d H:i:s');

  $sql = "SELECT * FROM forgotpassword WHERE id=".$_SESSION['forgot_id'];
  $result = mysqli_query($conn, $sql) or die("Query die.");
  $user_data = mysqli_fetch_assoc($result);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	          
             
           if (@$_POST['otp'] == $_SESSION['otp'] && $user_data['expirationTime'] >= $currentDateTime) {

        	      header('Location: http://localhost/test/common/create_password.php');
	
              }elseif ($_POST['otp'] == "") {

      	      	  $warning_msg = "Please enter OTP.";

      	      }elseif ($_POST['otp'] !== $_SESSION['otp']) {

      	      	   $warning_msg = "Entered OTP does not match";

      	      }elseif ($user_data['expirationTime'] < $currentDateTime) {
      	      	
      	      	   $warning_msg = "OTP expired.";

      	      }else{

                   $warning_msg = "Request failed";

      	      }

         	  echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
              ".$warning_msg."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button> 
              </div>";

    }

    if (@$_SESSION['msg']) {

         echo "<div class='mt-3 alert alert-danger alert-dismissible fade show' role='alert'>
              ".$_SESSION['msg']."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button> 
              </div>";	

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
    <div class="mx-auto w-50 mt-5 p-4 bg-white rounded border border-primary">        
    <form  action="enter_otp.php" method="post">
           <h3 class="text-center">Forgot Password</h3>
           <h5 class="mt-4 text-danger">An OTP is sent to your Email Id : <?php echo $_SESSION['email']; ?> </h5>
                  
           <div class="mb-3 form-group">
                 <label class="form-label mt-3" for="otp">Enter OTP</label>
                 <input type="text" inputmode="numeric" name="otp" class="form-control mt-3" maxlength="4" placeholder="Please enter four digit otp">
                 <div class="text-danger mt-2" id="countdown">
                               
                 </div>
                 <button type="submit" class="mt-3 btn btn-primary w-100 rounded-pill">Verify OTP</button>
           </div>
	        
    </form>
    <form action="forgot_password.php" method="post">
		    	 <input type="hidden" name="email" value="<?php echo $_SESSION['email'];  ?>">
		    	 <input type="hidden" name="role" value="<?php echo $_SESSION['role'];  ?>">
		    	 <input type="hidden" name="msg" value="xyz">
		    	 <p>Did not recieve OTP?<button type="submit" class="border-0 text-danger text-decoration-underline">Resend</button></p>
	</form>
	</div>
	<script>
				
				var targetDate = <?php echo strtotime($user_data['expirationTime']); ?> * 1000

				// Update the countdown every 1 second
			
			    var countdownInterval = setInterval(function() {
			    var currentDate = new Date().getTime();
			    var timeLeft = targetDate - currentDate;

			    if (timeLeft <= 0) {
			        clearInterval(countdownInterval);
			        document.getElementById("countdown").innerHTML = " Countdown expired!";
			    } else {
			        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
			        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

			        document.getElementById("countdown").innerHTML = "OTP expires in " + minutes + "m " + seconds + "s";
			    }
			}, 1000);
    </script>

           
           

<?php

include('C:\xampp\htdocs\test\common\footer.php');

?>
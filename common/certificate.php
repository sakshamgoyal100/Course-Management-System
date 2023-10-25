<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="http://localhost/test/common/bootstrap.css">
    <style>
        /* Custom CSS for certificate design */
        .certificate-container {
            background-image: url('certificate.jpg'); /* Replace with your image URL */
            background-size: 100% 100%; /* Adjust to fit your image appropriately */
            background-repeat: no-repeat;
            background-color: #fff;
            border: 5px solid #007bff;
            padding: 30px;
            text-align: center;
            max-width: 800px;
            height: 600px;
            margin: 0 auto;
            position: relative;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .certificate-title {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
        }

        .certificate-content {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .certificate-logo {
            position: absolute;
            top: 80px;
            right: 40px;
            width: 80px;
        } 
    </style>
</head>
<body> 
<?php
        session_start();

        $certificate_sql = "SELECT * FROM certificate WHERE studentName=".$_SESSION['name'];
        $certificate_result = mysqli_query($conn, $certificate_sql);
        $certificate = mysqli_fetch_assoc($certificate_result);

        if(!empty($certificate)){

?>  

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="certificate-container d-flex  align-items-center">
                    <p class="certificate-content">This is to certify that
                    <strong><?= $certificate['studentName']; ?></strong>
                    has successfully completed the course
                    <strong><?= $certificate['courseName']; ?></strong>
                    with a grade of
                    <strong><?= $certificate['grade']; ?></strong>
                    and a course duration of
                    <strong><?= $certificate['courseDuration']; ?></strong>
                    Under guidance of <strong><?= $certificate['teacherName']; ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
       }
       else {
?>           
    <h1>You have not completed the course yet.</h1>

<?php

    }
?>
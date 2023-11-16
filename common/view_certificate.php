<?php

$html =  '<!DOCTYPE html>
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
            background-image: url("https://image.similarpng.com/very-thumbnail/2021/01/Modern-gold-certificate-achievement-template-with-badge-on-transparent-background-PNG.png"); /* Replace with your image URL */
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
            padding: 20px;
            line-height: 2;
        }

        .certificate-logo {
            position: absolute;
            top: 80px;
            right: 40px;
            width: 80px;
        } 
    </style>
</head>
<body>';

include 'C:\xampp\htdocs\test\common\config.php';
session_start();

$certificate_sql = "SELECT * FROM certificate WHERE certificate_id=".$_GET['certificate_id'];
$certificate_result = mysqli_query($conn, $certificate_sql);
$certificate = mysqli_fetch_assoc($certificate_result);

if(!empty($certificate)){ 

    $html .=   '<div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="certificate-container d-flex  align-items-center">
                            <img src="certificate_logo.jpg" class="certificate-logo">
                            <p class="certificate-content">This is to certify that
                            <strong class="text-capitalize">' . $certificate['studentName'] . '</strong>
                            has successfully completed the course
                            <strong>' . $certificate['courseName'] . '</strong>
                            with a grade of
                            <strong>' . $certificate['grade'] . '</strong>
                            and a course duration of
                            <strong>' . $certificate['courseDuration'] . ' Months</strong>
                            Under guidance of <strong>Mr. ' . $certificate['teacherName'] . '</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>';
}

else {
?>           
    <h1>You have not completed the course yet.</h1>
<?php
}

if(@$_GET['sendemail']){
    // The URL you want to send the POST request to
    $url = 'http://localhost/test/common/mail.php';

    // Data to be sent in the POST request (as an associative array)
    $data = [
        'html' => $html,
        'subject' => 'Your Certificate',
        'email' => @$certificate['studentEmail']
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
        header('Location: http://localhost/'.$_GET['redirect_url']);
    }
    else{
        $_SESSION['showMsg'] = array('message' => "Certificate Generated Successfully.", 'type' => 'generated');
        header('Location: http://localhost/test/common/generate_certificate.php');
    }
} else {
    echo $html;
}
?>

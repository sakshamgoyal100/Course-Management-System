<?php

include('C:\xampp\htdocs\test\common\config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_type = $_POST['request'];
    $url = $_POST['url'];

    if (isset($_POST['method']) && isset($_POST['method_name'])) {
        $methods = $_POST['method'];
        $method_names = $_POST['method_name'];

        // Create an associative array to store key-value pairs
        $functionData = array();

        // Loop through the arrays and create key-value pairs
        for ($i = 0; $i < count($methods); $i++) {
            $method = $methods[$i];
            $method_name = $method_names[$i];
            // Add each key-value pair to the $functionData array
            $functionData[$method] = $method_name;
        }

        // Convert the entire $functionData array to a JSON string
        $function = json_encode($functionData);

        if (@$_POST['id']) {

             $sql = "UPDATE test_api SET request_type='$request_type', url='$url', function='$function' WHERE id=".$_POST['id'];
            
        }else{

           $sql = "INSERT INTO test_api (request_type, url, function) VALUES ('$request_type', '$url', '$function')";    
        }


        

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Query executed successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Method data is missing.";
    }


if ($_POST['request'] == "Post") {
    
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options for a POST request
    curl_setopt($ch, CURLOPT_URL, $_POST['url']); // Specify the URL you want to send the POST request to
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it
    curl_setopt($ch, CURLOPT_POST, true); // Set the request method to POST
    
    // Define the POST data (replace with your own data
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    curl_setopt($ch, CURLOPT_POSTFIELDS, $functionData); // Set the POST data

    // Execute the POST request
    $response = curl_exec($ch);

    // Check for cURL errors
    if(curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Output the response
    if ($response !== false) {
        echo $response;
    } else {
        echo 'Error in making the request.';
    }

}
else{
    // Initialize cURL session
    $ch = curl_init();

    // Build the URL with query parameters
    $url =  $_POST['url']. '?' . http_build_query($functionData);

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url); // Specify the URL with query parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it

    // Execute the GET request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Output the response
    if ($response !== false) {
        echo $response;
    } else {
        echo 'Error in making the request.';
    }

}















}


?>

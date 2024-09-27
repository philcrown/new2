<?php
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'];*/
    $userMessage = 'Hi';
    // cURL request setup
    $data = array("sender" => "user", "message" => $userMessage);
    $json_data = json_encode($data);

    $ch = curl_init('http://localhost:5005/webhooks/rest/webhook');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);
    
    if(curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Output the cURL response
        echo $response;
    }

    curl_close($ch);

// Close the database connection
?>

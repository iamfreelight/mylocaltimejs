<?php

// API endpoint
$ipAddress = $_SERVER['REMOTE_ADDR'];
$apiUrl = "https://ipapi.co/".$ipAddress."/json";

// Fetch the data from the API
$response = file_get_contents($apiUrl);

// Check if the request was successful
if ($response !== false) {
    // Decode the JSON data
    $data = json_decode($response, true);

    // Check if the 'timezone' key exists in the decoded data
    if (isset($data['timezone'])) {
        $visitorTimezone = $data['timezone'];

        // Output the timezone
        echo "Visitor's Timezone: $visitorTimezone<br>";

        // Calculate and output the local time of the visitor
        $dateTime = new DateTime('now', new DateTimeZone($visitorTimezone));
        echo "Visitor's Local Time: " . $dateTime->format('Y-m-d H:i:s');
    } else {
        echo $response;
    }
} else {
    echo "Error accessing the API.";
}
?>

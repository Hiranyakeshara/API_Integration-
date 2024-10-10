<?php
// API URL for Domain Search
$url = 'https://api.domains.lk/searchdomain';

// API Key (Replace 'Your_API_Key' with the actual API key)
$apiKey = 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS';

// Data for the API call (replace 'exampledomain.lk' with the domain you want to search)
$data = json_encode([
    'domainname' => 'exampledomain.lk'
]);

// Set the headers including the API key
$headers = [
    'x-api-key: ' . $apiKey,
    'Content-Type: application/json'
];

// Initialize the cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);  // Use POST method
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  // Set the request body with domain search data
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  // Set headers (including API key)
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string

// Execute the cURL request and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;  // Display the response from the API
}

// Close the cURL session
curl_close($ch);
?>

<?php
// API URL for Document Upload
$url = 'https://api.domains.lk/api/';

// API Key (Replace 'Your_API_Key' with the actual API key)
$apiKey = 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS';

// Data required for the API call
$action = 'DocumentUpload';
$domainName = 'exampledomain.lk';  // Replace with your actual domain name
$documentType = 'Banking related domains - copy of the license from the Central Bank of Sri Lanka';  // Replace with your actual document type
$filePath = '/path/to/your/file.png';  // Replace with the actual file path

// Set the headers including the API key
$headers = [
    'x-api-key: ' . $apiKey
];

// Prepare the form data
$fields = [
    'Action' => $action,
    'DomainName' => $domainName,
    'DocumentType' => $documentType,
    'File' => new CurlFile($filePath)
];

// Initialize the cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;  // Display the API response
}

// Close the cURL session
curl_close($ch);
?>

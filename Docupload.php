<?php
// API URL for Document Upload
$url = 'https://api.domains.lk/api/';

// API Key
$apiKey = 'YOUR_API_KEY';

// File to upload
$filePath = '/path/to/your/file.png';

// Request data
$fields = [
    'Action' => 'DocumentUpload',
    'DomainName' => 'test.lk', // Replace with the actual domain
    'DocumentType' => 'Others',
    'File' => new CURLFile($filePath)
];

// Setting headers
$headers = [
    'x-api-key: ' . $apiKey
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);

// Error handling
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Close cURL session
curl_close($ch);
?>

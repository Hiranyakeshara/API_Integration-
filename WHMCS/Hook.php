<?php
add_hook('AfterRegistrarRegistration', 1, function($vars) {
    // API Key
    $apiKey = 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS';

    // Domain and Document Details
    $domainName = $vars['domain'];
    $documentType = 'Domain Registration Document';
    $filePath = '/path/to/document.pdf';

    // Prepare API call for document upload
    $url = 'https://api.domains.lk/api/';
    $fields = [
        'Action' => 'DocumentUpload',
        'DomainName' => $domainName,
        'DocumentType' => $documentType,
        'File' => new CurlFile($filePath)
    ];

    $headers = [
        'x-api-key: ' . $apiKey
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    logActivity('Document uploaded for domain: ' . $domainName . ' - Response: ' . $response);
});

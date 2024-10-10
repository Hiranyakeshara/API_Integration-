<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

use WHMCS\Database\Capsule;

/**
 * Module configuration.
 *
 * @return array
 */
function documentUpload_config()
{
    return [
        'name' => 'Document Upload',
        'description' => 'This module allows for document uploads to the external API.',
        'version' => '1.0',
        'author' => 'Your Company',
        'fields' => [
            'apiKey' => [
                'FriendlyName' => 'API Key',
                'Type' => 'text',
                'Size' => '50',
                'Description' => 'Enter your API Key for the document upload API',
                'Default' => 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS',
            ],
        ]
    ];
}

/**
 * Document Upload action.
 *
 * @param array $params
 * @return string
 */
function documentUpload_output($params)
{
    // API Key
    $apiKey = $params['apiKey'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $filePath = $_FILES['file']['tmp_name'];
        $documentType = $_POST['documentType'];
        $domainName = $_POST['domainName'];
        
        // API URL for Document Upload
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

        return '<p>Upload Response: ' . $response . '</p>';
    }

    return '
        <form method="POST" enctype="multipart/form-data">
            <label>Domain Name: </label>
            <input type="text" name="domainName" required><br>
            <label>Document Type: </label>
            <input type="text" name="documentType" required><br>
            <label>Upload File: </label>
            <input type="file" name="file" required><br>
            <button type="submit">Upload Document</button>
        </form>
    ';
}

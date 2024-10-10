<?php
// API URL for Provisional Domain Submission
$url = 'https://api.domains.lk/submitprovisionalorder/';

// API Key (Replace 'YOUR_API_KEY' with the actual API key provided to you)
$apiKey = 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS';

// Prepare the data for submission
$data = array(
    'SubmissionInformation' => json_encode(array(
        'DomainNameDetails' => array(
            'DomainName' => 'test.lk',  // Replace with the actual domain name
            'CategoryID' => 1,  // Replace with the actual category ID (e.g., 1 for Full Domain Package)
            'Reason' => 'test reason'  // You can change the reason as needed
        ),
        'ForMyOrganization' => 'true',  // Set to 'false' if not for your organization
        'ClientOrganizationDetails' => array(
            'Name' => 'testname',  // Replace with actual client organization name
            'RegistrationNumber' => '7678',  // Replace with actual registration number
            'Telephone' => '0899',  // Replace with actual telephone number
            'Address' => 'address 343',  // Replace with actual address
            'TAXNumber' => 'testVAT',  // Replace with actual TAX number
            'Description' => 'test',  // Replace with actual description
            'Country' => 'Sri Lanka'  // Replace with the actual country name
        ),
        'RegistrantDetails' => array(  // Optional if ForMyOrganization is true
            'FirstName' => 'fname',  // Replace with actual first name
            'LastName' => 'lasname',  // Replace with actual last name
            'NICPassport' => '3232',  // Replace with actual NIC/Passport number
            'Email' => 'testemail@gmail.com',  // Replace with actual email
            'Mobile' => '9898',  // Replace with actual mobile number
            'Address' => 'address',  // Replace with actual address
            'Country' => 'Sri Lanka',  // Replace with actual country
            'TAXNumber' => 'dsdsd'  // Replace with actual tax number (optional)
        ),
        'TechnicalContactDetails' => array(
            'FirstName' => 'fname',  // Replace with actual technical contact first name
            'LastName' => 'lasname',  // Replace with actual technical contact last name
            'NICPassport' => '3232',  // Replace with actual NIC/Passport number
            'Email' => 'testemail@gmail.com',  // Replace with actual email
            'Mobile' => '9898',  // Replace with actual mobile number
            'Address' => 'address',  // Replace with actual address
            'Country' => 'Sri Lanka',  // Replace with actual country
            'TAXNumber' => 'dsdsd'  // Replace with actual tax number (optional)
        )
    ))
);

// Set the headers including the API key
$headers = array(
    'x-api-key: ' . $apiKey,
);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  // Set the headers
curl_setopt($ch, CURLOPT_POST, true);  // Use POST method
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  // Attach the data

// Execute the cURL request and capture the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;  // Display the response from the API
}

// Close the cURL session
curl_close($ch);
?>

<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

/**
 * Define module configuration.
 *
 * @return array
 */
function customRegistrar_MetaData()
{
    return array(
        'DisplayName' => 'Custom Registrar',
        'APIVersion' => '1.0',
    );
}

/**
 * Check Domain Availability (Domain Search).
 *
 * @param array $params
 * @return array
 */
function customRegistrar_CheckAvailability($params)
{
    // API URL for Domain Search
    $url = 'https://api.domains.lk/searchdomain';
    $apiKey = 'JWfXbQF4kyrTTLKgso0xToNNfq9VAS';  // Replace with your actual API key

    $domainName = $params['domainname'];  // Passed from WHMCS
    $data = json_encode([
        'domainname' => $domainName
    ]);

    // Setup cURL request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'x-api-key: ' . $apiKey,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Parse and return response
    $available = false;  // Assuming response contains availability

    return [
        'result' => $available ? 'available' : 'unavailable'
    ];
}

/**
 * Register Domain (Provisional Domain Submission).
 *
 * @param array $params
 * @return array
 */
function customRegistrar_RegisterDomain($params)
{
    $url = 'https://api.domains.lk/submitprovisionalorder/';
    $apiKey = 'WfXbQF4kyrTTLKgso0xToNNfq9VAS';  // Replace with your actual API key

    $domainName = $params['domainname'];
    $data = [
        'SubmissionInformation' => json_encode([
            'DomainNameDetails' => [
                'DomainName' => $domainName,
                'CategoryID' => 1,  // Full Domain Package
                'Reason' => 'WHMCS Domain Registration'
            ],
            'ForMyOrganization' => 'true',
            'ClientOrganizationDetails' => [
                'Name' => $params['Registrant']['FirstName'],
                'RegistrationNumber' => $params['Registrant']['CompanyNumber'],
                'Telephone' => $params['Registrant']['Phone'],
                'Address' => $params['Registrant']['Address1'],
                'TAXNumber' => $params['Registrant']['TaxID'],
                'Description' => 'Domain registration for ' . $domainName,
                'Country' => $params['Registrant']['Country']
            ],
            'RegistrantDetails' => [
                'FirstName' => $params['Registrant']['FirstName'],
                'LastName' => $params['Registrant']['LastName'],
                'NICPassport' => $params['Registrant']['IDNumber'],
                'Email' => $params['Registrant']['Email'],
                'Mobile' => $params['Registrant']['Phone'],
                'Address' => $params['Registrant']['Address1'],
                'Country' => $params['Registrant']['Country'],
                'TAXNumber' => $params['Registrant']['TaxID']
            ]
        ])
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'x-api-key: ' . $apiKey,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the response and return the result
    return [
        'success' => true
    ];
}

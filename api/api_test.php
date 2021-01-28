<?php

// API URL
$url = 'http://ip-api.com/json/92.249.148.254';
$url = 'https://api.fbi.gov/wanted/v1/list';

// Create a new cURL resource
$ch = curl_init($url);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

// Close cURL resource
curl_close($ch);

var_dump(json_decode($result));

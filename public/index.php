<?php

// URL of the API endpoint to retrieve all products
$url = 'http://127.0.0.1/cURL_3/api/get_all_products/';

// Initialize a cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, [
    // Set the URL
    CURLOPT_URL => $url,
    // Specify the HTTP request method as GET
    CURLOPT_CUSTOMREQUEST => 'GET',
    // Return the transfer as a string instead of outputting it directly
    CURLOPT_RETURNTRANSFER => true,
]);

// Execute the cURL session and store the response data
$data = curl_exec($ch);

// Close the cURL session
curl_close($ch);

// Decode the JSON response data
$products = json_decode($data);

// Check if the request was successful
if ($products->status === 200) {
    // Iterate through each product and output its id and name
    foreach ($products->data as $product) {
        // Output product ID
        echo 'id: ' . $product->id . '<br>';
        // Output product name
        echo 'Name: ' . $product->name . '<br>';
        // Output a horizontal line separator
        echo '<hr>';
    }
} else {
    // If the request was not successful, output the error message
    echo $products->message;
}

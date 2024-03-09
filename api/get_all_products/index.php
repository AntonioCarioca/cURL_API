<?php

// Include the file containing the database connection
require_once __DIR__ . '/../conection.php';

// Set the content type header to JSON
header('Content-Type: application/json; charset=utf-8');

// SQL query to select specific fields from the products table where the id is 22
$query = 'SELECT id, name FROM products where id=22';

// Prepare the SQL query
$result = $conn->prepare($query);

// Execute the prepared query
$result->execute();

// Check if the query was successful and if any rows were returned
if ($result && $result->rowCount() !== 0) {
    // Fetch all rows from the result set as an associative array
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
    
    // Encode the result set as JSON and output it
    echo json_encode(['status' => 200, 'data' => $products], JSON_PRETTY_PRINT);
} else {
    // If no rows were returned, output a JSON error message
    echo json_encode(['status' => 404, 'message' => 'Error: no product found'], JSON_PRETTY_PRINT);
}

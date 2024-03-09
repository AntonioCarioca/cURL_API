<?php

// Define the path to the database configuration file
$dir = __DIR__ . "/../config/database.ini";

// Parse the ini file containing database connection details
$db = parse_ini_file($dir);

// Extract database connection parameters from the parsed ini file
$host = isset($db['host']) ? $db['host'] : null; // Database host address
$name = isset($db['name']) ? $db['name'] : null; // Database name
$user = isset($db['user']) ? $db['user'] : null; // Database username
$pass = isset($db['pass']) ? $db['pass'] : null; // Database password
$type = isset($db['type']) ? $db['type'] : null; // Database type (not used in the connection string)
$port = isset($db['port']) ? $db['port'] : '5432'; // Database port number (default to PostgreSQL port)

try {
// Create a new PDO instance for connecting to the PostgreSQL database
$conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host={$host}; port={$port}");
    
// Set the error mode to throw exceptions in case of errors
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
// If there is an error connecting to the database, catch the exception and display an error message
echo 'Error: Conexão com banco de dados não realizada com sucesso ' . $err->getMessage();
}

<?php

require_once __DIR__ . '/../conection.php';

header('Content-Type: application/json; charset=utf-8');

$query = 'SELECT id, name FROM products where id=22';

$result = $conn->prepare($query);

$result->execute();

if ($result && $result->rowCount() !== 0) {
	$products = $result->fetchALL(PDO::FETCH_ASSOC);
	echo json_encode(['status' => 200, 'data' => $products], JSON_PRETTY_PRINT);
} else {
	echo json_encode(['status' => 404, 'message' => 'Error: no product found'], JSON_PRETTY_PRINT);
}

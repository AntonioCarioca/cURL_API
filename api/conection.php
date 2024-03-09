<?php

$dir = __DIR__ . "/../config/database.ini";

$db = parse_ini_file($dir);

$host = isset($db['host']) ? $db['host'] : null;
$name = isset($db['name']) ? $db['name'] : null;
$user = isset($db['user']) ? $db['user'] : null;
$pass = isset($db['pass']) ? $db['pass'] : null;
$type = isset($db['type']) ? $db['type'] : null;
$port = isset($db['port']) ? $db['port'] : '5432';

try {
$conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host={$host}; port={$port}");
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
	echo 'Error: Conexão com banco de dados não realizada com sucesso ' . $err->getMessage();
}

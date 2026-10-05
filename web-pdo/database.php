<?php

$host = "127.0.0.1";
$port = 3306;
$database = "php_web_pdo";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";

try {
    $pdo = new PDO(
        $dsn,
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $error) {
    exit("Không thể kết nối database. Hãy kiểm tra MySQL và thông tin kết nối.");
}
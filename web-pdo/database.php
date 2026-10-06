<?php

$config = require __DIR__ . "/config.local.php";

$dsn = "mysql:host=" . $config["host"]
    . ";port=" . $config["port"]
    . ";dbname=" . $config["database"]
    . ";charset=utf8mb4";

try {
    $pdo = new PDO(
        $dsn,
        $config["username"],
        $config["password"],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $error) {
    exit("Không thể kết nối database. Hãy kiểm tra MySQL và thông tin kết nối.");
}
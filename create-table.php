<?php
$dsn = 'mysql:dbname=php_db_app;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password);

    $sql = 'CREATE TABLE IF NOT EXISTS vendors (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        vendor_code INT(11) NOT NULL UNIQUE,
        vendor_name VARCHAR(50) NOT NULL,
    )';
    
    $pdo->query($sql);
    echo '接続成功です！';
} catch (PDOException $e) {
    exit('接続に失敗しました！' . $e->getMessage());
}

?>
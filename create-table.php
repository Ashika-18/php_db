<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password);

    $sql = 'CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(60) NOT NULL,
        furigana VARCHAR(60) NOT NULL,
        email VARCHAR(255) NOT NULL,
        age INT(11),
        address VARCHAR(255)
    )';
    
    $pdo->query($sql);
    echo '接続成功です！';
} catch (PDOException $e) {
    exit('接続に失敗しました！' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPとDATABASE</title>
</head>
<body>
    
</body>
</html>
<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

try {

$pdo = new PDO($dsn, $user, $password);

$sql = 'SELECT id, name FROM users';
$pdo->query($sql);

$stmt = $pdo->query($sql);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '接続成功です！';
} catch (PDOException $e) {

    echo '接続失敗です！<br>';

    exit($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>–PHPとDATABASE–</title>
</head>
<body>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = 'root';

        try {
            $pdo = new PDO($dsn, $user, $password);

            $sql = 'SELECT id, name FROM users';

            $pdo->query($sql);
            echo '接続成功です！';
        } catch (PDOException $e) {
            exit($e->getMessage());
            echo '接続失敗です！';
        }
        ?>
    </p>
</body>
</html>
<!-- select.php -->
<?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = 'root';

        try {
            $pdo = new PDO($dsn, $user, $password);

            $sql = 'SELECT id, name, age FROM users';

            $stmt = $pdo->query($sql);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '接続成功です！';
        } catch (PDOException $e) {
            exit($e->getMessage());
            echo '接続失敗です！';
        }

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
   <div class="sort">
       <a href="order.php?order=asc" class="sort-btn">年齢順(昇順)</a>
       <a href="order.php?order=desc" class="sort-btn">年齢順(降順)</a>
   </div>
    <table>
        <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>年齢</th>
        </tr>
        <?php

        foreach ($results as $result) {
            $table_row = "
                <tr>
                <td>{$result['id']}</td>
                <td>{$result['name']}</td>
                <td>{$result['age']}</td>
                </tr>
            ";
            echo $table_row;
        }
        ?>
    </table>
</body>
</html>
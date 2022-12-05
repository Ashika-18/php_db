<!-- where-like.php -->
<?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = 'root';

        try {
            $pdo = new PDO($dsn, $user, $password);

            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            } else {
                $keyword = NULL;
            }

            $sql = 'SELECT name, furigana FROM users WHERE furigana LIKE :keyword';
            $stmt = $pdo->prepare($sql);

            $partial_match = "%{$keyword}%";

            $stmt->bindValue(':keyword', $partial_match, PDO::PARAM_STR);

            $stmt->execute();

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
    <form action="where-like.php" method="get" class="search-form">
        <input type="text" placeholder="ふりがなで検索" name="keyword">
        <input type="submit" value="検索">
    </form>
    <table>
        <tr>
            <th>氏名</th>
            <th>ふりがな</th>
        </tr>
        <?php

        foreach ($results as $result) {
            echo "<tr><td>{$result['name']}</td><td>{$result['furigana']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<!-- insert.php -->
<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';

if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO($dsn, $user, $password);

        $sql = '
            INSERT INTO users (name, furigana, email, age, address)
            VALUES (:name, :furigana, :email, :age, :address)
        ';
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $_POST['user_name'], PDO::PARAM_STR);
        $stmt->bindValue(':furigana', $_POST['user_furigana'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['user_email'], PDO::PARAM_STR);
        $stmt->bindValue(':age', $_POST['user_age'], PDO::PARAM_INT);
        $stmt->bindValue(':address', $_POST['user_address'], PDO::PARAM_STR);

        echo '接続成功です！';
        $stmt->execute();

        header('Location: select.php');
    } catch (PDOException $e) {
        echo '接続失敗です！';
        exit($e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>–PHPとDATABASE–</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>ユーザー登録</h1>
    <p>ユーザー情報を入力して下さい。</p>
    <form action="insert.php" method="post">
        <div>
            <label for="user_name">お名前<span>【必須】</span></label>
            <input type="text" name="user_name" maxlength="60" required>

            <label for="user_furigana">ふりがな<span>【必須】</span></label>
            <input type="text" name="user_furigana" maxlength="60" required>

            <label for="user_email">メールアドレス<span>【必須】</span></label>
            <input type="email" name="user_email" maxlength="255" required>

            <label for="user_age">年齢</label>
            <input type="number" name="user_age" min="13" max="130">

            <label for="user_address">住所</label>
            <input type="text" name="user_address" maxlength="255">
        </div>
        <button type="submit" name="submit" value="insert">登録</button>
    </form>
</body>
</html>
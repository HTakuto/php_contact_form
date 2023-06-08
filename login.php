<?php
session_start();
require('function.php');
require('db.php');

if (!empty($_POST)) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    $loginDb = new Db;
    $loginDb->connectionDb();
    $loginDb->loginAdmin();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">メールアドレス</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="password">パスワード</label><br>
        <input type="password" name="password" id="password"><br>
        <br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>

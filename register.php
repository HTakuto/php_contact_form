<?php
  session_start();
  require('function.php');
  require('db.php');
  if(!empty($_POST)){
    $insertDb = new Db;
    $insertDb->connectionDb();
    $insertDb->insertAdmin();
    header('Location: user_list.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録画面</title>
</head>
<body>
<form action="register.php" method="post">
  <label for="name">名前</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">メールアドレス</label><br>
  <input type="email" id="email" name="email"><br>
  <label for="password">パスワード</label><br>
  <input type="password" id="password" name="password"><br>
  <br>
  <div class="flex" style="display: flex;">
  <input type="submit" value="登録">
</form>
<form action="login.php">
  <input type="submit" value="ログイン画面" style="margin-left: 16px;">
</form>
</div>
</body>
</html>

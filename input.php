<?php
session_start();
require('validation.php');
$validation = new Validation;
$validation->validationContact();
if ($_POST && empty($err_messages)) {
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['content'] = $_POST['content'];

  header('Location: confirm.php');
  exit;
} elseif ($_POST && !empty($err_messages)) {
  foreach ($err_messages as $err_message) {
    echo $err_message . "\n";
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入力画面</title>
</head>
<body>
<h1>入力画面</h1>
<form action="input.php" method="post">
  <label for="name">名前</label><br>
  <input type="text" name="name" id="name" placeholder="名前" required><br>
  <label for="email">メールアドレス</label><br>
  <input type="email" name="email" id="email" placeholder="メールアドレス" required><br>
  <label for="content">お問い合わせ内容</label><br>
  <textarea name="content" id="content" placeholder="お問い合わせ内容" cols="50" rows="10" required></textarea><br>
  <input type="submit" value="送信">
</form>
</body>
</html>

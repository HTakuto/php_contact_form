<?php
session_start();
require('function.php');
require('db.php');
if($_POST){
  $insertDb = new DB;
  $insertDb->insertContact();
  header('Location: complate.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>確認画面</title>
</head>
<body>
<h1>確認画面</h1>
<form action="confirm.php" method="post">
  <label for="name">名前</label><br>
  <?php echo h($_SESSION['name']); ?><br>
  <label for="email">メールアドレス</label><br>
  <?php echo h($_SESSION['email']); ?><br>
  <label for="content">お問い合わせ内容</label><br>
  <?php echo h($_SESSION['content']); ?><br>
  <input type="hidden" name="confirm">
  <input type="submit" value="送信">
  <input type="button" onclick="history.back()" value="戻る">
</form>
</body>
</html>

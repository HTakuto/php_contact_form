<?php
require('db.php');
$db = new Db;
$db->connectionDb();
if (!empty($_POST['edit'])) {
  $userId = $_POST['edit'];
  $user = $db->getUser($userId);
}
if ($user && !empty($_POST['name']) && !empty($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $db->updateUser($userId, $name, $email);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>
<body>
  <?php if ($user): ?>
    <form action="edit.php" method="post">
      <input type="hidden" name="edit" value="<?php echo $user['id']; ?>">
      <label for="name">名前：</label>
      <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
      <label for="email">メールアドレス：</label>
      <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
      <input type="submit" value="更新">
    </form>
  <?php else: ?>
    <p>ユーザーが見つかりません。</p>
  <?php endif; ?>
</body>
</html>

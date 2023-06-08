<?php
require('db.php');
$db = new Db;
$db->connectionDb();
// var_dump($_POST['delete']);exit;
if (!empty($_POST['delete'])) {
  $userId = $_POST['delete'];
  $db->deleteUser($userId);
}
$users = $db->getUsers();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー一覧表示画面</title>
</head>
<body>
  <table>
    <thead>
    <tr>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td>
            <form action="user_list.php" method="post">
              <input type="hidden" name="delete" value="<?php echo $user['id']; ?>">
              <button type="submit">削除</button>
            </form>
          </td>
          <td><button>修正</button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>

<?php
require('db.php');
$db = new Db;
$db->connectionDb();
if (!empty($_POST['delete'])) {
  $userId = $_POST['delete'];
  $db->deleteUser($userId);
  echo "<script>alert('ユーザーを削除しました');</script>";
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
  <script>
    function confirmDelete(userId) {
      if (confirm('本当に削除しますか？')) {
        document.getElementById('delete' + userId).submit();
      }
    }
  </script>
</head>
<body>
  <table>
    <thead>
    <tr>
        <th>ID</th>
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
            <form id="delete<?php echo $user['id']; ?>" action="user_list.php" method="post">
              <input type="hidden" name="delete" value="<?php echo $user['id']; ?>">
              <button type="button" onclick="confirmDelete(<?php echo $user['id']; ?>)">削除</button>
            </form>
          </td>
          <td>
          <form action="edit.php" method="post">
            <input type="hidden" name="edit" value="<?php echo $user['id']; ?>">
            <button type="submit">修正</button>
          </form>
        </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>

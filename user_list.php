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
    <tr>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $data = [
        ['name' => 'ユーザー1', 'email' => 'user1@example.com'],
        ['name' => 'ユーザー2', 'email' => 'user2@example.com'],
        ['name' => 'ユーザー3', 'email' => 'user3@example.com'],
    ];

    foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td><button>削除</button></td>';
        echo '<td><button>修正</button></td>';
        echo '</tr>';
    }
    ?>
  </table>
</body>
</html>

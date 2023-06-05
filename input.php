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
<form action="confirm.php" method="post">
  <label for="name">名前</label><br>
  <input type="text" name="name" id="name" placeholder="名前"><br>
  <label for="email">メールアドレス</label><br>
  <input type="email" name="email" id="email" placeholder="メールアドレス"><br>
  <label for="content">お問い合わせ内容</label><br>
  <textarea name="content" id="content" placeholder="お問い合わせ内容" cols="50" rows="10">
  </textarea><br>
  <input type="submit" value="送信">
</form>
</body>
</html>

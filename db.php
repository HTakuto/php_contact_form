<?php
$dsn = "mysql:dbname=php_scratch;host=localhost;charaset=utf-8";
$user = "root";
$password = "password1234";

try {
  $db= new PDO($dsn, $user, $password);
  echo "接続成功";
} catch(PDOException $e) {
  echo "接続失敗：" . $e->getMessage(). "\n";
  exit();
}

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO contact_form(id, name, email, content)VALUES(NULL, 'a', 'aaa', 'aaa')";
$stmt = $db->prepare($sql);
$stmt->execute();

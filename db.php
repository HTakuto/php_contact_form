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

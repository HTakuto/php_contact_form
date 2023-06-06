<?php
class Db
{
  private $db; // DB接続オブジェクトを保持するプロパティ

  public function connectionDb() {
    require('.magic.php');
    $dsn = DSN;
    $user = USER;
    $password = PASSWORD;
    
    try {
      $this->db = new PDO($dsn, $user, $password);
      // echo "接続成功";
    } catch(PDOException $e) {
      echo "接続失敗：" . $e->getMessage(). "\n";
      exit();
    }

    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function insertContact(){
    $userName = $_SESSION["name"];
    $userEmail = $_SESSION["email"];
    $userContent = $_SESSION["content"];

    $sql = "INSERT INTO contact_form(id, name, email, content) VALUES(NULL, :userName, :userEmail, :userContent)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
    $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
    $stmt->bindParam(':userContent', $userContent, PDO::PARAM_STR);
    $stmt->execute();
  }
}

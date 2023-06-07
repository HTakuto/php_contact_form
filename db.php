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

  public function insertAdmin(){
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $options = [
      'cost' => 12,
    ];
    $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    $sql = "INSERT INTO admin(id, name, email, password) VALUES(NULL, :userName, :userEmail, :userPassword)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
    $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
    $stmt->bindParam(':userPassword', $userPassword, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function loginAdmin()
  {
      $userEmail = $_SESSION["email"];
      $userPassword = $_SESSION["password"];

      $sql = "SELECT * FROM admin WHERE email = :userEmail";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
      $stmt->execute();

      $admin = $stmt->fetch(PDO::FETCH_ASSOC);

      $userPasswordHash = $admin['password'];
      if ($admin && password_verify($userPassword, $userPasswordHash)) {
          header('Location: user_list.php');
          exit;
      } else {
        var_dump('ログインに失敗しました。');exit;
      }
  }
}

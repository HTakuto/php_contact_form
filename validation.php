<?php 
class Validation
{
  public $err_messages = array();

  public function validationContact(){
    if(empty($_POST['name'])){
      $err_messages[] = '名前は必須です。';
    }
    if(empty($_POST['email'])){
      $err_messages[] = 'メールアドレスは必須です。';
    }
    if(empty($_POST['content'])){
      $err_messages[] = 'お問い合わせ内容は必須です。';
    }

    return $err_messages;
  }
}
?>

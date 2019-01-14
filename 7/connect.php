<?php
$dsn = 'mysql:dbname=sample;host=localhost;cahrset=utf8';
$user = 'root';
$password = '';

try{
  $dsn = new PDO($dsn, $user, $password);
  $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO user (id, name, age, email) VALUES (NULL, '田中太郎', '28', 'example5@example.com')";
  $stmt = $dsn->prepare($sql);
  $stmt->execute();
  echo '接続に成功しました';
}catch (PDOException $e){
  print($e->getMessage());
  die;
}
 ?>

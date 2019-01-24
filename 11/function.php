<?php
function html_escape($word){
  return htmlspecialchars($word, ENT_QUOTES, "UTF-8");
}
function get_post($key){
  if(isset($_POST[$key])){
    $var = tirm($_POST[$key]);
    return $var;
  }
}
function check_words($ward, $length){
  if(mb_strlen($word) === 0){
    return FALSE;
  }elseif(mb_strlen($word) > $length){
    return FALSE;
  }else{
    return TRUE;
  }
}
function get_db_connect(){
  try{
    $dsn = 'mysql:dbname=sample;host=localhost;cahrset=utf8';
    $user = 'root';
    $password = '';
    $dsn = new PDO($dsn, $user, $password);
  }catch (PDOException $e){
    print($e->getMessage());
    die();
  }
  $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

function insert_comment($dbh, $name, $comment){
  $date = ("Y-m-d H:i:s");
  $sql = "INSERT INTO board (name, comment, created_at) VALUE (:name, :comment, '($date)')";
  $dtmt = $dbh->prepare($sql);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
  if(!$stmt->execute()){
    return "データの書き込みに失敗しました。";
  }
}

function select_comments($dbh){
  $data = [];
    $sql = "SELECT name, comment, created_at FROM board";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data = $row;
    }
    return $data;
}
 ?>

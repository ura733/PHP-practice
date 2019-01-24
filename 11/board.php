<?php
require_once("./function.php");

$errs = [];
$data = [];
$dbh = get_db_connect();

if($_SERVER["REQUEST_METHOD"] === "POST"){

  $name = get_post("name");
  $comment = get_post("comment");

  if(!check_words($name, 50)){
    $errs[] = "名前を修正してください";
  }
  if(!check_words($comment, 200)){
    $errs[] = "コメントを修正してください";
  }
  if(count($errs) === 0){
    $result = insert_comment($dbh, $name, $comment);
  }
}

$data = select_comments($dbh);
include_once("view.php");
?>

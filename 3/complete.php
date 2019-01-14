<?php
$user_name = $_POST['user_name'];
$hobby = $_POST['hobby'];
?>

<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>登録ページ</h1>
  <p>こんにちは<?php echo $user_name; ?></p>
  <p>趣味は<?php echo $hobby; ?></p>
</body>
</html>

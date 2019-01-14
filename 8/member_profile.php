<?php
$id = '';

if(isset($_GET['id'])){
  $id = (int)$_GET['id'];
}

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$passward = '';
$data = [];

try{
  $dbh = new PDO($dsn, $user, $passward);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// ヒアドキュメントを使って文字列を挿入
$sql = <<<SQL
  SELECT
    user.id,
    user.name,
    user.age,
    club.club_name,
    club.count,
    club.overview
  FROM user
  JOIN club ON user.club_id = club.club_id
  WHERE user.id = :id
  LIMIT 1
SQL;
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
}catch (PDOException $e){
  echo ('接続エラー:'.$e->getMessage());
  die();
}
?>
<html>
<head>
  <meta charset="utf-8">
  <style type="text/css">
  .search{float:right;}
  </style>
</head>
<body>
  <div class="search">
    <p>会員IDを入力してください</p>
    <form action="" method="get">
      <input type="text" name="id">
      <input type="submit" value="確認">
    </form>
  </div>
  <h1>会員データ</h1>
  <?php if($row === FALSE): ?>
  <p>存在しないIDです</p>
<?php else: ?>
  <table border="1">
    <tr>
      <th>名前</th>
      <th>年齢</th>
      <th>クラブ</th>
      <th>活動回数</th>
      <th>概要</th>
    </tr>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['age'] ?></td>
      <td><?php echo $row['club_name'] ?></td>
      <td><?php echo $row['count'] ?>回</td>
      <td><?php echo nl2br($row['overview']) ?></td>
    </tr>
  </table>
<?php endif; ?>
</body>
</html>

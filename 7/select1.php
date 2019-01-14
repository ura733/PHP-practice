<?php
$dsn = 'mysql:dbname=sample;host=localhost;cahrset=utf8';
$user = 'root';
$password = '';

try{
  $dsn = new PDO($dsn, $user, $password);
  $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM user";
  $stmt = $dsn->prepare($sql);
  $stmt->execute();
  $data = array();
  $count = $stmt->rowCount();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
  }
  echo '接続に成功しました';
}catch (PDOException $e){
  print($e->getMessage());
  die;
}
var_dump($count);
var_dump($data);
 ?>
 <html>
<table border="1">
  <tr><th>id</th><th>名前</th><th>メール</th></tr>
  <?php foreach ($data as $row) : ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
  <?php endforeach ?>

</table>
 </html>

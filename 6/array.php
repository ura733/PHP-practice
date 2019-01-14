<?php
$arrays = array(
  0 => array(
  'name' => 'Suzuki',
  'hobby' => 'tennis',
  'email' => 'suzuki@example.com'
),
  1 => array(
  'name' => 'Tanaka',
  'hobby' => 'movie',
  'email' => 'tanaka@example.com'
),
  2 => array(
  'name' => 'Kato',
  'hobby' => 'play',
  'email' => 'kato@example.com'
)
);
echo $arrays[1]['name'];
 ?>
<html>
<body>
  <table border="1">
    <tr><th>名前</th><th>趣味</th><th>メール</th></tr>
    <?php foreach ($arrays as $row) { ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['hobby']; ?></td>
        <td><?php echo $row['email']; ?></td>
      </tr>
     <?php } ?>
  </table>
</body>
</html>

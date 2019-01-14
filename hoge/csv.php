<?php
$csv = [];

if (($handle = fopen("hoge.txt", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
      $csv[] = $data;
}
}
var_dump($csv);
echo '<br>';

// var_dump($csv[0][0]);
echo '<br>';
foreach($csv as $key1 => $value1){
  var_dump($value1);
  foreach ($value1 as $key2 => $value2) {
    var_dump($value2);
    echo '<br>';
  }
}



?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <br>
    <br>
    <form action="" method="get">
      <p>
        <select name="number">
      <?php
      for($day = 1; $day <= 31; $day++): ?>
          <option value="<?php echo $day ?>"><?php echo $day ?></option>
      <?php endfor; ?>
      </select>
      <input type="submit" value="送信">
    </form>

    <table border="1">
      <tr>
        <th>年</th>
        <th>月</th>
        <th>日</th>
        <th>内容</th>
      <?php
      for($y = 2017; $y <= 2025; $y++){?>
      </tr>
      <tr>
        <th><?php echo $y; ?></th>
        <td>if($csv){<?php var_dump($csv[0][1]) ?>
        }</td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>

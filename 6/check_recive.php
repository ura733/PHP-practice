<?php
$colors = $_POST['colors'];
var_dump($colors);
 ?>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>受信ページ</h1>
  <h3>色</h3>
  <ul>
  <?php
  foreach ($colors as $value) { ?>
    <li><?php echo $value; ?></li>
  <?php } ?>
  </ul>
  <p>好きな色は<?php echo implode('と', $colors); ?> です</p>

</body>
</html>

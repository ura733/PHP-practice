<?php
$movie = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $movie = $_POST['movie'];
  if(mb_strlen($movie) === 0) {
    $err = '文字を入力してください';
  }elseif (mb_strlen($movie) > 20) {
    $err = '20字以内で入力してください';
  }
}

?>

<html>
  <head>
    <style type="text/css">
    .conter{text-align:center;)
      input{margin: 5px;}
    </style>
  </head>
  <body>
    <body>
      <div class="conter">
        <h1>入力フォームの確認</h1>
        <p>
          <?php
          if(isset($err)){
            echo $err;
          }else{
            echo 'あなたの好きな映画は'.$movie.'です';
          }
          ?>
        </p>
        <form action="" method="post">
          <label>好きな映画</label>
          <input type="text" name="movie" value=""><br>
          <input type="submit" name="" value="登録">
        </form>
      </div>
    </body>

  </body>
</html>

<?php
  // Sessionを開始
  session_start();

  // ユーザー名を設定
  $user_name = '侍太郎';

  // Sessionにデータを保存
  if (isset($_SESSION[$user_name])) {
    // Session変数があれば、訪問回数を1加算
    $_SESSION[$user_name]++;
  } else {
    // Session変数がなければ、１（初回訪問）をセット
    $_SESSION[$user_name] = 1;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP基礎編</title>
</head>
<body>
  <?php
  echo 'ようこそ'.$user_name.'さん、'.$_SESSION[$user_name].'回目の訪問です。';

  // 訪問回数が3回を超えたらSessionを終了
  if ($_SESSION[$user_name] > 3) {
    echo 'セッションを終了します。';
    $_SESSION = array();
    session_destroy();
  }
  ?>
</body>
</html>
<?php
  // Sessionを開始
  session_start();

  // クッキーがあれば氏名を取得
  if (isset($_COOKIE['name'])) {
    $user_name = $_COOKIE['name'];
  } else {
    // ユーザー名はまだ不明のため「名無し」とする
    $user_name = '名無し';

    // クッキーがなければ登録（今回は固定）
    setcookie('name', '侍太郎', time() + 3600);
    echo 'クッキーを追加します。有効期限は1時間です。';
  }

  // // ユーザー名を設定
  // $user_name = '侍太郎';

  // Sessionにデータを保存
  if (isset($_SESSION[$user_name])) {
    // Session変数があれば、訪問回数を1加算
    $_SESSION[$user_name]++;

    // 訪問回数が３回を超えたらクッキーを削除
    if ( $_SESSION[$user_name] > 3) {
      setcookie('name', '', time() - 100);
    }
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
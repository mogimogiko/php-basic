<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP基礎編</title>
</head>
<body>
  <!-- ;の抜け -->
  <p>
    <?php
    $test = 0; // [NG]「；」が抜けている
    echo $test;
    ?>
  </p>
  <!-- クォーテーションの不一致 -->
  <p>
    <?php
    $my_name = '侍一郎';
    echo '私の名前は' . $my_name . 'です。'; // [NG] 「'」が一つ足りない
    ?>
  </p>
  <!-- 括弧の不一致 -->
  <p>
    <?php
    $test = 1;
    if( isset($test)) { // 終わりガッコが一つない
      echo $test;
    }
    ?>
  </p>
  <!-- 変数の未定義 -->
  <p>
    <?php
    $test1 = 10;
    $test2 = 20;
    $test3 = 30;

    echo $test1 + $test2 + $test3;  // [ng]$test3が未定義
    ?>
  </p>
  <!-- 変数名のタイプミス -->
  <p>
    <?php
    $my_name = '侍一郎';
    echo "私の名前は{$my_name}です。"; // [ng]$my_nameのタイプミス
    ?>
  </p>
  <!-- 関数やメソッドの呼び出しエラー -->
  <?php
  // 関数を定義する
  function say_good_morning() {
    echo 'おはようございます！';
    echo '昨日はよく眠れましたか？';
    echo '今日も一日頑張りましょう！';
  }

  // 関数を呼び出す
  say_good_morning(); // [ng] morningがeveningになっている
  ?>
  <!-- 変数のスコープの誤解 -->
  <?php
  // 関数を定義する
  function print_name() {
    $user_name = '侍太郎'; // $user_nameはローカル変数
    echo $user_name;
  }

  // 関数を呼び出す
  echo print_name(); // [ng] $user_nameは関数外では使えない
  ?>

  <!-- クラスの読みこみ失敗 -->
  <p>
    <?php
    // ファイルをロード（読み込み）
    require_once 'load_test.php'; // [ng] ファイル名が違う（loadがroad）
    
    // load_test.phpからロードしたLoadTestクラスを使用
    $object = new LoadTest();
    $object->test();
    ?>
  </p>

  <!-- インデックスが存在しない -->
  <p>
    <?php
    // ユーザー名を配列で宣言
    $user_names = ['侍太郎', '侍一郎', '侍二郎', '侍三郎', '侍四郎'];

    // ５番目のデータを表示
    echo $user_names[4]; // [ng] インデックスは［４］までしかない
    ?>
  </p>

  <!-- 配列関数の誤用 -->
  <p>
    <?php
    // ユーザー名を配列で宣言
    $user_names = ['侍太郎', '侍一郎', '侍二郎', '侍三郎', '侍四郎'];

    // ５番目のデータを表示
    echo count($user_names); // [ng] count()関数の使用にインデックスは不要
    ?>
  </p>
</body>
</html>
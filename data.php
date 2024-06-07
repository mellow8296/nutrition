<?php

// データベース設定ファイルを読み込み
try {
    $ini = parse_ini_file('db.ini', FALSE); // db.iniから設定を読み込む
    // PDOオブジェクトを作成し、データベースに接続
    $db = new PDO('mysql:host=' . $ini['host'] . ';dbname=' . $ini['dbname'] . ';charset=utf8', $ini['dbusr'], $ini['dbpass']);

    // SQL文を準備し、nutritionテーブルから全データを選択
    $sql = $db->prepare('SELECT * FROM nutrition');
    $sql->execute(); // SQL文を実行
} catch (PDOException $e) {
    // エラー発生時はエラーメッセージを表示して処理を終了
    die('エラーメッセージ：' . $e->getMessage());
}
// 取得したデータをオブジェクト形式で配列に格納
$nutrition_array = $sql->fetchAll(PDO::FETCH_OBJ);
$condition_array = ['name' => '準備中'];
?>




<!-- require_once('list.php'); // list.phpファイルを読み込み

$juice = new Nutrition('JUICE');
$coffee = new Nutrition('COFFEE');
$curry = new Nutrition('CURRY');
$pasta = new Nutrition('PASTA');

$nutritions = array($juice, $coffee, $curry, $pasta); // 作成したインスタンスを配列に格納 -->
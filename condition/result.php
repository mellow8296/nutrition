<?php
// data.phpを読み込み、データベース接続とデータ取得の準備を行います
require_once('../data.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>症状情報</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <!-- Google Fontsからフォントを読み込み -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- フォームから送信されたかどうかをチェック -->
    <?php if (isset($_POST['submit'])) { ?>

        <!-- フォームから送信された栄養素名でデータベースから情報を検索し表示 -->
        <?php foreach ($nutrition_array as $nutrition) : ?>
            <?php if ($nutrition->name === $_POST['select']) : ?>
                <br>
                <!-- 栄養素名の表示 -->
                <h1><?php echo $nutrition->name; ?></h1>
                <h3>特徴</h3>
                <!-- 栄養素の特徴を表示 -->
                <p><?php echo $nutrition->body; ?></p>
                <br>
                <h3>推奨量</h3>
                <!-- 栄養素の推奨摂取量を表示 -->
                <p><?php echo $nutrition->parday ?></p>
                <br>
                <h3>多く含む食品</h3>
                <!-- 栄養素を多く含む食品を表示 -->
                <p><?php echo $nutrition->foods ?></p>
                <br>
                <!-- 該当する栄養素が見つかった場合、ループを抜ける -->
                <?php break; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- 栄養素が選択されなかった場合のメッセージ表示 -->
    <?php } else { ?>
        <h2>なにか選択してください。</h2>
    <?php } ?>

    <!-- 症状検索ページへのリンク -->
    <a href="select.php">症状検索</a>
    <br><br>
</body>

</html>
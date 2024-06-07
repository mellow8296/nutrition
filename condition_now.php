<?php
// data.phpを読み込み、データベース接続とデータ取得の準備を行います
require_once('data.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>症状情報</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fontsからフォントを読み込み -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<header>
    <h1>🍵健康ハック🍵</h1>
</header>

<body>
    <!-- フォームから送信されたかどうかをチェック -->
    <?php if (isset($_POST['submit'])) { ?>

        <h2>準備中</h2>
    <?php } else { ?>
        <h2>なにか選択してください。</h2>
    <?php } ?>

    <!-- 症状検索ページへのリンク -->
    <form action="select.php" method="post">
        <button class="button" type="submit" name="menu" value="症状">症状検索</button>
    </form>
    <footer>
        <p>引用：Supplement A to C: Yoshinori Yamamoto gyouseki-syuu (Japanese Edition)</p>
    </footer>
</body>

</html>
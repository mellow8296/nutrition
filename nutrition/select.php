<?php
// data.phpを読み込み、データベース接続とデータ取得を行います
require_once('../data.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>栄養素検索</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <!-- Google Fontsからフォントを読み込み -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
    <!-- jQueryの読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2のスタイルシートを読み込み -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <!-- Select2のJavaScriptライブラリを読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <!-- Select2の日本語化スクリプトを読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/ja.js"></script>
</head>

<body>

    <h1>栄養素検索</h1>
    <p>栄養素を選択してください</p>

    <form action="result.php" method="post">
        <!-- 栄養素選択のためのドロップダウンメニュー -->
        <select class="select_search" name="select" id="select" style="width: 200px;">
            <!-- 栄養素データベースから取得したデータをオプションとして表示 -->
            <?php foreach ($nutrition_array as $nutrition) : ?>
                <option value="<?php echo $nutrition->name; ?>"><?php echo $nutrition->name; ?></option>
            <?php endforeach ?>
        </select>
        <!-- Select2を適用するためのスクリプト -->
        <script>
            $(document).ready(function() {
                $('.select_search').select2();
            });
        </script>

        <!-- 送信ボタン -->
        <input type="submit" value="送信" name="submit">
    </form>
    <br>
    <!-- ホームページへのリンク -->
    <a href="../index.php">ホーム</a>
</body>

</html>
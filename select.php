<?php
// data.phpを読み込み、データベース接続とデータ取得を行います
require_once('data.php');
$menu = $_POST['menu'];
// メニュー選択に応じてアクションとオプション配列を設定
if ($menu == '栄養素') {
    $action = 'nutrition.php';
    $option_array = $nutrition_array;
} elseif ($menu == '症状') {
    header('Location:condition.php');
    $action = 'condition.php';
    $option_array = $condition_array;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>栄養素検索</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" href="styles.css">
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
    <header>
        <h1>🍵健康ハック🍵</h1>
    </header>

    <main>

        <h1><?php echo $menu; ?>検索</h1>
        <p><?php echo $menu; ?>を選択してください</p>

        <!-- 選択のためのドロップダウンメニュー -->
        <form action="<?php echo $action; ?>" method="post">

            <!-- 選択のためのドロップダウンメニュー -->
            <select class="select_search" name="select" id="select" style="width: 200px;">
                <!-- データベースで取得した内容をセレクトメニューに表示 -->
                <?php foreach ($option_array as $option) : ?>
                    <option value="<?php echo $option->name; ?>"><?php echo $option->name; ?></option>
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
        <div class="button-container">
            <!-- ホームページへのリンク -->
            <a href="index.php">ホーム</a>
        </div>
    </main>
    <footer>
        <p>引用：Supplement A to C: Yoshinori Yamamoto gyouseki-syuu (Japanese Edition)</p>
    </footer>
</body>

</html>
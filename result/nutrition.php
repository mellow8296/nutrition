<?php
require_once('../data.php');

$check = false;

if (isset($_POST['submit'])) {
    $nutrition_name = $_POST['select'];
}
if (isset($_GET['select'])) {
    $nutrition_name = $_GET['select'];
    $check = true;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>栄養素情報</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Google Fontsからフォントを読み込み -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php include(dirname(__FILE__) . "/../parts/header.php"); ?>

    <!-- フォームから送信されたかどうかをチェック -->
    <?php if (isset($nutrition_name)) { ?>

        <!-- フォームから送信された栄養素名でデータベースから情報を検索し表示 -->
        <?php foreach ($nutrition_array as $nutrition) : ?>
            <?php if ($nutrition->name === $nutrition_name) : ?>

                <!-- 栄養素名の表示 -->
                <h1 class="nutrition-name"><?php echo $nutrition->name; ?></h1>

                <!-- 栄養素の特徴を表示 -->
                <h3>特徴</h3>
                <p class="nutrition-result"><?php echo $nutrition->body; ?></p>

                <!-- 栄養素の推奨摂取量を表示 -->
                <h3>推奨量</h3>
                <p class="nutrition-result"><?php echo $nutrition->parday ?></p>

                <!-- 栄養素を多く含む食品を表示 -->
                <h3>多く含む食品</h3>
                <p class="nutrition-result"><?php echo $nutrition->foods ?></p>

                <!-- 該当する栄養素が見つかった場合、ループを抜ける -->
                <?php break; ?>

            <?php endif; ?>
        <?php endforeach; ?>

        <!-- 栄養素が選択されなかった場合のメッセージ表示 -->
    <?php } else { ?>
        <h2>なにか選択してください。</h2>
    <?php } ?>

    <!-- 症状ページから遷移してきた場合は戻るボタンを設置 -->
    <?php if ($check) { ?>
        <form class="button-container" action="condition.php" method="post">
            <button class="button" type="submit" name="select" value="<?php echo $_GET['condition']; ?>">戻る</button>
        </form>
    <?php } ?>

    <!-- 栄養素検索ページへのリンク -->
    <form class="button-container" action="../select/select.php" method="post">
        <button class="button" type="submit" name="menu" value="栄養素">栄養素検索</button>
    </form>

    <?php include(dirname(__FILE__) . "/../parts/footer.php"); ?>
</body>

</html>
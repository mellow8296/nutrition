<?php
require_once('../data.php');
$condition_name = $_POST['select'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>症状情報</title>
    <!-- スタイルシートのリンク -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Google Fontsからフォントを読み込み -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php include(dirname(__FILE__) . "/../parts/header.php"); ?>

    <!-- フォームから送信されたかどうかをチェック -->
    <?php if (isset($condition_name)) { ?>

        <!-- フォームから送信された栄養素名でデータベースから情報を検索し表示 -->
        <?php foreach ($condition_array as $condition) : ?>
            <?php if ($condition->name === $condition_name) : ?>

                <!-- 栄養素名の表示 -->
                <h1 class="nutrition-name"><?php echo $condition->name; ?></h1>

                <!-- 栄養素の特徴を表示 -->
                <h3>症状</h3>
                <p class="nutrition-result"><?php echo $condition->body; ?></p>

                <!-- 栄養素の推奨摂取量を表示 -->
                <h3>原因</h3>
                <p class="nutrition-result"><?php echo $condition->cause ?></p>

                <!-- 栄養素を多く含む食品を表示 -->
                <h3>効果のある栄養素</h3>
                <p class="nutrition-result">

                    <!-- 栄養素がDBに存在する場合はリンクにする -->
                    <?php
                    // 取得した栄養素を変数に文字列として格納
                    $condition_nutrition = $condition->nutrition;
                    // 栄養素変数の文字列を「、」で区切って配列に格納
                    $nutritionsLists = preg_split("/、/", $condition_nutrition);
                    // 栄養素DBの「name」カラムを配列に格納
                    $nutrition_array_name = array_column($nutrition_array, 'name');

                    // 出力する栄養素がそれぞれDBに存在するかチェック
                    foreach ($nutritionsLists as $nutritionList) {

                        // 栄養素がDBに存在する場合はリンクにする
                        if (in_array($nutritionList, $nutrition_array_name)) {
                            echo "<a class='nutrition-link' href='nutrition.php?select=$nutritionList&condition=$condition_name'>$nutritionList</a>";
                        } else {
                            echo $nutritionList;
                        }

                        // 「など」がきたらループを抜ける
                        if ($nutritionList === "など") {
                            break;
                        }

                        echo "、";
                    }
                    ?>
                </p>

                <!-- 該当する栄養素が見つかった場合、ループを抜ける -->
                <?php break; ?>

            <?php endif; ?>
        <?php endforeach; ?>
    <?php } else { ?>
        <h2>なにか選択してください。</h2>
    <?php } ?>

    <!-- 症状検索ページへのリンク -->
    <form class="button-container" action="../select/select.php" method="post">
        <button class="button" type="submit" name="menu" value="症状">症状検索</button>
    </form>

    <?php include(dirname(__FILE__) . "/../parts/footer.php"); ?>
</body>

</html>
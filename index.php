<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>健康ハック</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include(dirname(__FILE__) . "/parts/header.php"); ?>
    <div class="hero">
        <div class="hero-text">
            素敵なライフスタイルを
        </div>
    </div>

    <main>
        <h3>メニューを選択してください</h3>
        <form class="button-container" action="select/select.php" method="post">
            <button class="button" type="submit" name="menu" value="栄養素">栄養素検索</button>
            <button class="button" type="submit" name="menu" value="症状">症状検索</button>
        </form>

        <h3>こころの栄養も...</h3>
        <form class="button-container" action="result/_aphorism.php" method="post">
            <button class="button" type="submit" name="menu" value="格言">今日の格言</button>
        </form>
    </main>

    <?php include(dirname(__FILE__) . "/parts/footer.php"); ?>
</body>

</html>
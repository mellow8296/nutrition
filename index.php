<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>健康ハック</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1 class="title">🍵 健康ハック 🍵</h1>
    </header>

    <div class="hero">
        <div class="hero-text">
            素敵なライフスタイルを
        </div>
    </div>

    <main>
        <h3>メニューを選択してください</h3>
        <form class="button-container" action="select/select.php" method="post">
            <button class="button" type="submit" name="menu" value="栄養素">栄養素検索</button>
            <br>
            <button class="button" type="submit" name="menu" value="症状">症状検索</button>
        </form>
    </main>

    <footer>
        <p>引用：Supplement A to C: Yoshinori Yamamoto gyouseki-syuu (Japanese Edition)</p>
    </footer>
</body>

</html>
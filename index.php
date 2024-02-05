<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';
use Helpers\RandomGenerator;

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$restaurantChains = RandomGenerator::restaurantchains($min, $max);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chain </title>
    <link rel="stylesheet" href="css\styles.css"> 
</head>
<body>
    <form action="download.php" method="post">
        <label for="count">Number of Users:</label>
        <input type="number" id="count" name="count" min="1" max="100" value="5">
        
        <label for="format">Download Format:</label>
        <select id="format" name="format">
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>

        <button type="submit">Generate</button>
    </form>
    <h1>Restaurant Chain</h1>

    <?php foreach ($restaurantChains as $restaurantChain): ?>
    <div class="restaurant-card">
        <!-- ユーザー情報の表示 -->
        <?php echo $restaurantChain->toHTML(); ?>
    </div>
    <?php endforeach; ?>
    <script src="js/script.js"></script>

</body>
</html>
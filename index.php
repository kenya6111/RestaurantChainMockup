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
    <h1>Restaurant Chain</h1>

    <?php foreach ($restaurantChains as $restaurantChain): ?>
    <div class="restaurant-card">
        <!-- ユーザー情報の表示 -->
        <?php echo $restaurantChain->toHTML(); ?>
    </div>
    <?php endforeach; ?>

</body>
</html>
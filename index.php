<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';
use Helpers\RandomGenerator;
$restaurantChains = RandomGenerator::restaurantchains(5, 5, 5, 5, 5);
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
        <ul>
            <li>    
                <label for="restaurant">Number of Restaurant:</label>
                <input type="number" id="restaurant" name="restaurant" min="1" max="100" value="5">
            </li>
            <li>
                <label for="employees">Number of Employees:</label>    
                <input type="number" id="employees" name="employees" min="1" max="100" value="5">
            </li>
            <li>
                <label for="fee">Number of fee:</label>
                <input type="number" id="fee" name="fee" min="1" max="100" value="2">
            </li>
            <li>
                <label for="locations">Number of Locations:</label>
                <input type="number" id="locations" name="locations" min="1" max="100" value="3">
            </li>
            <li>
                <label for="zipcode">Number of zipcode:</label>
                <input type="number" id="zipcode" name="zipcode" min="1" max="100" value="4">
            </li>
            <li>
                <label for="format">Download Format:</label>
                <select id="format" name="format">
                    <option value="markdown">Markdown</option>
                    <option value="json">JSON</option>
                    <option value="txt">Text</option>
                </select>
            </li>
            <button type="submit">Generate</button>
        </ul>
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

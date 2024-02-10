<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';
use Helpers\RandomGenerator;

$NumberOfrestaurant = $_POST['restaurant'] ?? 5;
$NumberOfemployees = $_POST['employees'] ?? 5;
$NumberOffee = $_POST['fee'] ?? 5;
$NumberOflocations = $_POST['locations'] ?? 5;
$NumberOfzipcode = $_POST['zipcode'] ?? 5;
$format = $_POST['format'] ?? 'markdown';

// ユーザーの生成
$restaurantChains = RandomGenerator::restaurantchains($NumberOfrestaurant, $NumberOfemployees, $NumberOffee, $NumberOflocations, $NumberOfzipcode);

if ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($restaurantChains as $restaurantChain) {
        echo $restaurantChain->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $usersArray = array_map(fn($user) => $user->toArray(), $users);
    echo json_encode($usersArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
} else {
    // HTMLをデフォルトに
    header('Content-Type: text/html');
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}
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
    <form action="index.php" method="post">
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

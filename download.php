<?php
use Models\User;
use Helpers\RandomGenerator;
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';


    // POSTリクエストがある場合にのみ処理を実行
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
        header('Content-Disposition: attachment; filename="restaurantChains.md"');
        foreach ($restaurantChains as $restaurantChain) {
            echo $restaurantChain->toMarkdown();
        }
    } elseif ($format === 'json') {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="restaurantChains.json"');
        $restaurantChains = array_map(fn($restaurantChains) => $restaurantChains->toArray(), $restaurantChains);
        echo json_encode($restaurantChains);
    } elseif ($format === 'txt') {
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="restaurantChains.txt"');
        foreach ($restaurantChains as $restaurantChain) {
            echo $restaurantChain->toString();
        }
        exit;
    }

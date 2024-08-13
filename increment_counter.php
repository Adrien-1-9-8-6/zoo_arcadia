<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

file_put_contents('log.txt', "Request received\n", FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    file_put_contents('log.txt', "Input: " . print_r($input, true) . "\n", FILE_APPEND);

    $animal = $input['animal'] ?? null;
    if ($animal === null) {
        file_put_contents('log.txt', "Animal is null\n", FILE_APPEND);
        exit;
    }

    file_put_contents('log.txt', "Animal: $animal\n", FILE_APPEND);

    $file = 'counters.json';
    if (!file_exists($file)) {
        file_put_contents($file, json_encode(['animal_clicks' => []]));
    }

    $data = json_decode(file_get_contents($file), true);
    if (!isset($data['animal_clicks'][$animal])) {
        $data['animal_clicks'][$animal] = 0;
    }
    $data['animal_clicks'][$animal]++;

    file_put_contents($file, json_encode($data));
    echo json_encode($data);

    file_put_contents('log.txt', "Counter updated\n", FILE_APPEND);
}
?>




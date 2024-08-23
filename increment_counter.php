<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lire les données JSON envoyées dans le corps de la requête POST
    $input = json_decode(file_get_contents('php://input'), true);
    $animal = $input['animal'] ?? null;

    // Si l'animal est null, arrêter l'exécution du script
    if ($animal === null) {
        exit;
    }

    // Chemin vers le fichier counters.json
    $file = 'counters.json';
    
    // Si le fichier counters.json n'existe pas, le créer avec une structure initiale
    if (!file_exists($file)) {
        file_put_contents($file, json_encode(['animal_clicks' => []]));
    }

    // Lire les données du fichier counters.json
    $data = json_decode(file_get_contents($file), true);
    
    // Si le compteur pour l'animal n'existe pas, l'initialiser à 0
    if (!isset($data['animal_clicks'][$animal])) {
        $data['animal_clicks'][$animal] = 0;
    }
    
    // Incrémenter le compteur pour l'animal
    $data['animal_clicks'][$animal]++;

    // Écrire les données mises à jour dans le fichier counters.json
    file_put_contents($file, json_encode($data));
    
    // Renvoyer les données mises à jour en tant que réponse JSON
    echo json_encode($data);
}
?>





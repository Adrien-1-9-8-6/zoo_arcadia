<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CounterController extends AbstractController
{
    // Route pour incrémenter le compteur, accessible via une requête POST
    #[Route('/increment_counter', name: 'increment_counter', methods: ['POST'])]
    public function incrementCounter(Request $request): JsonResponse
    {
        // Récupère les données JSON envoyées dans la requête POST
        $data = json_decode($request->getContent(), true);
        $animal = $data['animal'] ?? null;

        // Si l'animal est null, retourne une réponse JSON avec une erreur
        if ($animal === null) {
            return new JsonResponse(['error' => 'Animal is null'], 400);
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
        return new JsonResponse($data);
    }

    // Route pour récupérer les compteurs, accessible via une requête GET
    #[Route('/get_counters', name: 'get_counters', methods: ['GET'])]
    public function getCounters(): JsonResponse
    {
        // Chemin vers le fichier counters.json
        $file = 'counters.json';
        // Si le fichier counters.json n'existe pas, retourner une réponse JSON avec une structure vide
        if (!file_exists($file)) {
            return new JsonResponse(['animal_clicks' => []]);
        }

        // Lire les données du fichier counters.json
        $data = json_decode(file_get_contents($file), true);
        // Renvoyer les données en tant que réponse JSON
        return new JsonResponse($data);
    }
}
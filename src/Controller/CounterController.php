<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CounterController extends AbstractController
{
    #[Route('/increment_counter', name: 'increment_counter', methods: ['POST'])]
    public function incrementCounter(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $animal = $data['animal'] ?? null;

        if ($animal === null) {
            return new JsonResponse(['error' => 'Animal is null'], 400);
        }

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
        return new JsonResponse($data);
    }
}

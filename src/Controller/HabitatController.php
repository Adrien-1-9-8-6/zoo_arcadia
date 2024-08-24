<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Habitat;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class HabitatController extends AbstractController
{
    #[Route('/habitat', name: 'app_habitat')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $habitats = $entityManager->getRepository(Habitat::class)->findAll();
        $animals = $entityManager->getRepository(Animal::class)->findAll();

        return $this->render('habitat/index.html.twig', [
            'habitats' => $habitats,
            'animals' => $animals,
        ]);
    }
}

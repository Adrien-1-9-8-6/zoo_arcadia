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
        $habitat1 = $entityManager->getRepository(Habitat::class)->find($id = 3);
        $habitat2 = $entityManager->getRepository(Habitat::class)->find($id = 4);
        $habitat3 = $entityManager->getRepository(Habitat::class)->find($id = 5);

        return $this->render('habitat/index.html.twig', [
            'habitat1' => $habitat1,
            'habitat2' => $habitat2,
            'habitat3' => $habitat3,

        ]);
    }

}
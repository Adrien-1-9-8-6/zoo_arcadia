<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Race;
use App\Entity\Utilisateur;
use App\Entity\Role;
use App\Entity\RapportVeterinaire;
use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitat', name: 'app_habitat')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $product = $entityManager->getRepository(Habitat::class)->find(1);

        return $this->render('habitat/index.html.twig', [
            'controller_name' => 'HabitatController',
            'nom' => $product->getDescription()
        ]);
    }



    /*#[Route('/config-habitat', name: 'create_habitat')]
    public function createHabitat(EntityManagerInterface $entityManager): Response
    {
        $product = new Habitat();
        $product->setNom('La savane');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }*/
}
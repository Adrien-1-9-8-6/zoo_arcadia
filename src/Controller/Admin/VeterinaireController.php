<?php

namespace App\Controller\Admin;

use App\Controller\Admin\ServiceCrudController;
use App\Controller\Admin\ImageCrudController;
use App\Controller\Admin\RaceCrudController;
use App\Controller\Admin\AnimalCrudController;
use App\Controller\Admin\RapportVeterinaireCrudController;
use App\Controller\Admin\UtilisateurCrudController;
use App\Controller\Admin\HabitatCrudController;
use App\Entity\Service;
use App\Entity\Image;
use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\RapportVeterinaire;
use App\Entity\Utilisateur;
use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class VeterinaireController extends AbstractDashboardController
{
    #[Route('/veterinaire', name: 'veterinaire')]
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(HabitatCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UtilisateurCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(RapportVeterinaireCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(AnimalCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(RaceCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ImageCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ServiceCrudController::class)->generateUrl();
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Habitat', 'fas fa-list', Habitat::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('Rapport Vétérinaire', 'fas fa-list', RapportVeterinaire::class);
        yield MenuItem::linkToCrud('Animal', 'fas fa-list', Animal::class);
        yield MenuItem::linkToCrud('Race', 'fas fa-list', Race::class);
        yield MenuItem::linkToCrud('Image', 'fas fa-list', Image::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
    }

    
}
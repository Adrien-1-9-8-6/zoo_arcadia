<?php

namespace App\Controller\Admin;

use App\Controller\Admin\ServiceCrudController;
use App\Controller\Admin\ImageCrudController;
use App\Controller\Admin\RaceCrudController;
use App\Controller\Admin\AnimalCrudController;
use App\Controller\Admin\RapportVeterinaireCrudController;
use App\Controller\Admin\UtilisateurCrudController;
use App\Controller\Admin\RoleCrudController;
use App\Controller\Admin\HabitatCrudController;
use App\Entity\Service;
use App\Entity\Image;
use App\Entity\Race;
use App\Entity\Animal;
use App\Entity\RapportVeterinaire;
use App\Entity\Utilisateur;
use App\Entity\Role;
use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(HabitatCrudController::class)->generateUrl();
        return $this->redirect($url);

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(RoleCrudController::class)->generateUrl();
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

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
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
        yield MenuItem::linkToCrud('Role', 'fas fa-list', Role::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('Rapport Vétérinaire', 'fas fa-list', RapportVeterinaire::class);
        yield MenuItem::linkToCrud('Animal', 'fas fa-list', Animal::class);
        yield MenuItem::linkToCrud('Race', 'fas fa-list', Race::class);
        yield MenuItem::linkToCrud('Image', 'fas fa-list', Image::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
    }
}

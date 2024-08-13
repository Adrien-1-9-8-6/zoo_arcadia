<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Entity\Service;
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

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $counters = $this->getCounters();

        return $this->render('admin/dashboard.html.twig', [
            'counters' => $counters,
        ]);
    }

    private function getCounters(): array
    {
        $file = 'counters.json';
        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
            return $data['animal_clicks'] ?? [];
        }

        return [];
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Habitat', 'fas fa-list', Habitat::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('Rapport Vétérinaire', 'fas fa-list', RapportVeterinaire::class);
        yield MenuItem::linkToCrud('Animal', 'fas fa-list', Animal::class);
        yield MenuItem::linkToCrud('Race', 'fas fa-list', Race::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-list', Avis::class);
    }
}


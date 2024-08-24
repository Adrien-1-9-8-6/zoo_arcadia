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
        // Appelle la méthode getCounters pour obtenir les compteurs de clics des animaux
        $counters = $this->getCounters();

        // Rend la vue 'admin/dashboard.html.twig' en passant les compteurs de clics comme variable
        return $this->render('admin/dashboard.html.twig', [
            'counters' => $counters,
        ]);
    }

    private function getCounters(): array
    {
        // Chemin vers le fichier counters.json
        $file = 'counters.json';
        
        // Vérifie si le fichier counters.json existe
        if (file_exists($file)) {
            // Lit le contenu du fichier counters.json et le décode en tableau associatif PHP
            $data = json_decode(file_get_contents($file), true);
            
            // Retourne les compteurs de clics des animaux, ou un tableau vide si la clé 'animal_clicks' n'existe pas
            return $data['animal_clicks'] ?? [];
        }

        // Si le fichier counters.json n'existe pas, retourne un tableau vide
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


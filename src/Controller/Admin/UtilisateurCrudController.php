<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use App\Entity\Utilisateur;
use App\Repository\RoleRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;

class UtilisateurCrudController extends AbstractCrudController
{
    //Astuce pour hacher le mdp
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;      
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Utilisateur) {
            $plainPassword = $entityInstance->getPassword(); // Obtenir le mot de passe brut
            $encodedPassword = $this->passwordEncoder->hashPassword($entityInstance, $plainPassword); // Hacher le mot de passe
            $entityInstance->setPassword($encodedPassword); // Définir le mot de passe haché
        }

        // Astuce pour attribuer le rôle en fonction du label
        $roleLabel = $entityInstance->getRole()->getLabel();
        if ($roleLabel == 'administrateur') {
            $entityInstance->setRoles(['ROLE_ADMIN']);
        } elseif ($roleLabel == 'Vétérinaire') {
            $entityInstance->setRoles(['ROLE_VETERINAIRE']);
        } else {
            $entityInstance->setRoles(['ROLE_EMPLOYE']);
        }
        //

        $entityManager->persist($entityInstance);
        $entityManager->flush();
        $entityInstance->eraseCredentials(); //Suppression du mdp en clair une fois haché
    }
    //Fin de l'astuce pour hacher le mdp

    //Astuce pour hacher le mdp quand on change le mdp
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
{
    if ($entityInstance instanceof Utilisateur) {
        $plainPassword = $entityInstance->getPassword(); // Obtenir le mot de passe brut
        $encodedPassword = $this->passwordEncoder->hashPassword($entityInstance, $plainPassword); // Hacher le mot de passe
        $entityInstance->setPassword($encodedPassword); // Définir le mot de passe haché
    }

    $entityManager->persist($entityInstance);
    $entityManager->flush();
    $entityInstance->eraseCredentials(); //Suppression du mdp en clair une fois haché
}
    //Fin de l'astuce pour hacher le mdp quand on change le mdp

    //Astuce pour ajouter le role à la création d'un utilisateur.
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('password'),
            AssociationField::new('role') //Ligne pour le champ de sélection de rôle
            ->setFormTypeOptions([ //suppression de la création du compte admin depuis la dashboard
                'query_builder' => function (RoleRepository $er) {
                    return $er->createQueryBuilder('r')
                        ->where('r.label != :admin')
                        ->setParameter('admin', 'Administrateur');
                },
            ]),

        ];
    }
}

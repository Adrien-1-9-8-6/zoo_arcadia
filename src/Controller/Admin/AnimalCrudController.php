<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('imageAnimal', 'Image Animal')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true),
            TextField::new('prenom', 'Prénom')
                ->setFormTypeOptions([
                    'attr' => [
                        'maxlength' => 50
                    ]
                ]),
            TextField::new('etat', 'Etat')
                ->setFormTypeOptions([
                    'attr' => [
                        'maxlength' => 50
                    ]
                ]),
            TextField::new('nourriture', 'Nourriture')
                ->setFormTypeOptions([
                    'attr' => [
                        'maxlength' => 50
                    ]
                ]),
            TextField::new('grammage', 'Grammage')
                ->setFormTypeOptions([
                    'attr' => [
                        'maxlength' => 50
                    ]
                ]),
            AssociationField::new('race'),
            AssociationField::new('habitat')
        ];
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;



class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('imageAnimal', 'Image Animal')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true)

        ];

        $prenom = TextField::new('prenom', 'Prénom')
            ->setFormTypeOptions([
                'attr' => [
                    'maxlength' => 50
                ]
            ]);

        $etat = TextField::new('etat', 'Etat')
        ->setFormTypeOptions([
            'attr' => [
                'maxlength' => 50
            ]
        ]);

        $nourriture = TextField::new('nourriture', 'Nourriture')
        ->setFormTypeOptions([
            'attr' => [
                'maxlength' => 50
            ]
        ]);

        $grammage = TextField::new('grammage', 'Grammage')
        ->setFormTypeOptions([
            'attr' => [
                'maxlength' => 50
            ]
        ]);

        $fields[] = $prenom;
        $fields[] = $etat;
        $fields[] = $nourriture;
        $fields[] = $grammage;

        return $fields;
    }
}

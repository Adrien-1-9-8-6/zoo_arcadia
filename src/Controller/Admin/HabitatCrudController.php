<?php

namespace App\Controller\Admin;

use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;


class HabitatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Habitat::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            ImageField::new('imageData', 'Image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(true)

        ];

        $nom = TextField::new('nom', 'Nom')
            ->setFormTypeOptions([
                'attr' => [
                    'maxlength' => 255
                ]
            ]);

        $description = TextEditorField::new('description', 'Description');
        $commentaire_habitat = TextEditorField::new('commentaire_habitat', 'Commentaire Habitat');

        $fields[] = $nom;
        $fields[] = $description;
        $fields[] = $commentaire_habitat;


        return $fields;
    }
}

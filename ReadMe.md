# Zoo Arcadia

## Description

**Zoo Arcadia** est un projet étudiant développé pour l'entreprise (fictive) **DevSoft**. Il s'agit d'une application web pour un zoo nommé Arcadia, qui est prospère et écologique. L'objectif de ce site web est de permettre aux visiteurs de visualiser les animaux, leurs états, les services ainsi que les horaires du zoo.

## Technologies utilisées

Le projet a été développé en utilisant **Symfony 7** comme principal framework, avec l'aide de nombreux autres outils et technologies: 

- Vscode
- Twig
- Easyadmin
- Bootstrap
- Sass
- Figma
- Phpmyadmin
- Github
- Platform.sh
- Doctrine
- Composer
- Wampserver
- mySQL
- Html
- Javascript
- SQL
- noSQL
- php8.3.6
- CSS

## Installation et configuration

Pour installer et configurer ce projet, suivez les étapes ci-dessous :

1. Clonez le dépôt GitHub sur votre machine locale à partir du terminal VScode `git clone https://github.com/Adrien-1-9-8-6/zoo_arcadia`.
2. Allez dans le dossier créé `cd zoo_arcadia`
3. Installez Composer et Wampserver.
4. Exécutez `composer install` pour installer les dépendances du projet.
5. Configurez votre environnement local en modifiant les fichiers `.env` et `.env.local`.
6. Lancez Wampserver et créez une nouvelle base de données MySQL avec la commande `php bin/console doctrine:database:create`.
7. Importez dans votre base de données le fichier BDDarcadia.sql qui se situe à la racine du projet.
8. Lancez le serveur Symfony avec `symfony server:start`.

## Utilisation

Une fois l'installation et la configuration terminées, vous pouvez explorer le monde d'Arcadia en ouvrant votre navigateur web à l'URL `http://127.0.0.1:8000`.

# Transfert du projet Permis de construire facile

Le projet [permis de construire facile](http://permis-de-construire-facile.beta.gouv.fr/) consiste en plusieurs écrans:

 - des écrans statique d'information (page d'accueil, foire aux questions, informations légales…)
 - un entonnoir de sélections de villes puis de projets, qui redirige ensuite vers le site "démarches-simplifiées"
 - une interface d'administration, qui permet d'ajouter/supprimer des villes et de gérer les types de projets

## Processus de migration

Trois stratégies de migration sont envisageables:

 - le transfert du serveur contenant le projet déja disponible en ligne à une nouvelle entité qui devra par la suite assurer sa gestion
 - la réinstallation du projet, ainsi que de sa base de données, sur des serveurs déja existants chez une nouvelle entité
 - l'abandon de la plateforme permis de construire facile en l'état actuel

Le transfert de serveur est une démarche essentiellement administrative qui n'est pas détaillée ici. Le reste de ce document indique comment réaliser l'installation du projet, que ce soit pour continuer son développement ou pour le déployer en production.

## Transfert du serveur

C'est une démarche essentiellement administrative. Le serveur (OVH kimsufi sous Debian, qui héberge l'application PHP) peut-être transféré sur demande.

## Installation du projet sur un nouveau serveur

Après avoir décrit la structure du projet et les différents outils nécessaires à son fonctionnement, deux types de procédures seront décrites:

 - l'installation sur un serveur local pour le développement
 - l'installation sur un serveur de production

### Code source

L'ensemble du code source du projet, sous license MIT, peut être téléchargé à l'adresse suivante:
https://github.com/MTES-MCT/permis-construire

### Description du projet

Le projet est une application PHP qui utilise le framework Symfony 4.2. L'ensemble des dépendances PHP sont décrites dans le fichier de configuration `composer.json`. [yarn](https://yarnpkg.com/en/) a été utilisé pour gérer les dépendances JavaScript.

### Installation du projet sur une machine locale

Afin de procéder à l'installation du projet, il est nécessaire d'avoir préalablement installé

 - [docker](https://docs.docker.com/install/)
 - [composer](https://getcomposer.org/)
 - [yarn](https://yarnpkg.com/en/)
 - [git](https://git-scm.com/)

Une fois que ces outils sont installés, voici l'ensemble des commandes à lancer pour installer tout le projet:

```bash
# Télécharger le code
git clone git@github.com:MTES-MCT/permis-construire.git
# Récupérer les dépendances PHP et JS
cd app
composer install
yarn install
# Compiler et installer les fichiers CSS/JS
yarn run encore dev
# Lancer les applications dans des containers
cd ..
docker-compose up
# Import du schema de base de données (les tables PostgreSQL)
docker exec -it $(docker ps -aqf "name=pc_php") /bin/sh
/var/www/symfony # bin/console doctrine:migrations:migrate --no-interaction
```

Vous pouvez alors accéder à l'application en vous rendant sur `http://127.0.0.1`.

### Structure du projet

Avant de rentrer dans le code source du projet, l'arborescence de répertoires suit la structure suivante:

    .
    ├── app
    ├── containers
    ├── docker-compose.yml
    ├── documentation
    ├── fabfile.py
    └── Makefile

 - le code source de l'application est dans `app/`
 - le code de l'infrastructure est dans `containers/`, coordonné par le fichier `docker-compose.yml` utilisé par docker. C'est là que l'on trouve la configuration des différents services, les fichiers présents peuvent aider à la configuration du service.
 - `fabfile.py` sert pour le déploiement avec `fabric`
 - un `Makefile` fournit quelques commandes utiles que l'on peut lancer avec `make`

### Structure du code source de l'application

Le projet suit la structure d'un projet Symfony 4.2 dont l'arborescence est la suivante.

    ├── assets
    │   ├── css
    │   ├── js
    │   └── static
    ├── bin
    │   ├── console
    │   └── phpunit
    ├── composer.json
    ├── composer.lock
    ├── config
    │   ├── bootstrap.php
    │   ├── bundles.php
    │   ├── packages
    │   ├── routes
    │   ├── routes.yaml
    │   └── services.yaml
    ├── node_modules
    ├── public
    │   ├── build
    │   ├── bundles
    │   └── index.php
    ├── src
    │   ├── Controller
    │   ├── Domain
    │   ├── Entity
    │   ├── Form
    │   ├── Infrastructure
    │   ├── Kernel.php
    │   ├── Migrations
    │   ├── Repository
    │   └── Security
    ├── symfony.lock
    ├── templates
    ├── var
    │   ├── cache
    │   ├── log
    │   └── logs
    └── vendor


Les répertoire et fichiers les plus intéressants si jamais le projet est amené à évoluer sont:

 - src/Controller: il contient les controlleurs de vue
 - assets: tous les fichiers (statiques et dynamiques) JS, CSS et images. Ils sont publiés au moment du déploiement dans le répertoire `public`.
 - bin/console: la console qui permet d'exécuter de nombreuses commandes
 - composer.{json,lock}: les dépendances PHP
 - app/routes.yaml: la définition des routes
 - app/config: les configurations des différents bundles utilisés
 - templates: les vues utilisées, notamment pour les pages statiques

### Routes

Les routes sont décrites dans le fichier `app/config/routes.yaml`. Il est possible d'en faire le listing avec la commande `bin/console debug:router`. Voici les principales:

    $ bin/console debug:router
     ------------------------------------------- ---------- -------- ------ --------------------------------------- 
      Name                                        Method     Scheme   Host   Path                                   
     ------------------------------------------- ---------- -------- ------ --------------------------------------- 
        
      route_index                                 ANY        ANY      ANY    /                                      
      route_static_comment_ca_marche              ANY        ANY      ANY    /comment-ca-marche                     
      route_static_cgu                            ANY        ANY      ANY    /cgu                                   
      route_static_faq                            ANY        ANY      ANY    /faq                                   
      route_static_contact                        ANY        ANY      ANY    /contact                               
      route_static_infosTravaux                   ANY        ANY      ANY    /travaux/{typeTravaux}                 
      route_qualify1                              ANY        ANY      ANY    /qualification/etape-1/                
      route_qualify2                              ANY        ANY      ANY    /qualification/etape-2/                
      route_resultats                             ANY        ANY      ANY    /qualification/resultats/              
      route_gotods                                ANY        ANY      ANY    /qualification/redirection-ds/         
      route_pas_de_demarche                       ANY        ANY      ANY    /qualification/pas-de-resultats/
      easyadmin                                   ANY        ANY      ANY    /admin/

### Interface d'administration

Une interface d'administration est disponible à l'adresse http://permis-de-construire-facile.beta.gouv.fr/admin. Elle permet de gérer la liste des villes, et les URLs des différentes démarches.

Cette interface utilise la brique open source [EasyAdmin](https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html) de Symfony. D'autres entités Symfony peuvent être ajoutés et personnalisés. Il suffit pour cela de modifier le fichier `app/config/packages/easy_admin.yaml`:

```yaml
# app/config/packages/easy_admin.yaml
easy_admin:
    site_name: 'Permis de construire facile'
    entities:
        Ville:
            class: App\Entity\Ville
```

Il est nécessaire de disposer d'un compte administrateur pour accéder à cette interface. Il est possible d'en créer un avec les commandes suivantes:

```bash
# Création d'un utilisateur
bin/console fos:user:create jeanmichel jeanmichel@gmail.com mot_de_passe
Created user jeanmichel
# Affectation du role administrateur à cet utilisateur
bin/console fos:user:promote jeanmichel ROLE_ADMIN
```

### Installation de zéro sur un serveur de production

#### Configuration du serveur

L'installation sur un serveur de production nécessite a minima la présence de:

 - nginx et php-fpm (ou un serveur équivalent)
 - php 7.1

Les fichiers de configuration docker, présents dans le répertoire `containers` et dans `docker-compose.yml` peuvent vous aider à configurer les services.

Afin de pouvoir servir le site via HTTPS, [Let’s Encrypt](https://letsencrypt.org/) a été utilisé.

#### Déploiement de l'application

Le déploiement est réalisé avec l'outil Python [fabric](http://www.fabfile.org/):

_Fabric is a Python (2.5-2.7) library and command-line tool for streamlining the use of SSH for application deployment or systems administration tasks._

La tache de déploiement disponible prend un paramètre, l'environnement où l'on veut déployer.

```bash
$ fab deploy:staging
$ fab deploy:prod
```

L'environnement de staging est protégé par mot de passe, et les outils de debug sont activés.
L'environnement de production correspond à l'application de production.

Le coeur du déploiement est décrit dans la fonction enable_project. Si jamais le choix était fait de s'en passer, il faudrait en reproduire la logique pour déployer à nouveau l'application:

 - copier le fichier d'environnement à partir du répertoire partagé
 - installer les dépendances `composer`
 - vider le cache
 - rendre le répertoire de cache et logs `var/` accessible en écriture
 - jouer les migrations de base de données
 - copier les ressources compilées dans un répertoir publiquement accessible.

```python
def enable_project(env_name, deployment_directory):
    # Copy of the environment file
    run('cp /home/deploy/%s/shared/env %s/.env' % (env_name, deployment_directory)) 
    # warmup cache
    with cd(deployment_directory):
        run('time composer install --optimize-autoloader')
        run('chmod a+w var/ -R')
        if env_name == "staging":
            run('bin/console cache:clear --env=dev --no-debug')
            run('bin/console cache:warmup --env=dev --no-debug')
        else:
            run('bin/console cache:clear --env=prod --no-debug')
            run('bin/console cache:warmup --env=prod --no-debug')
        run('chmod a+w var/ -R')
        run('time bin/console doctrine:migrations:migrate --no-interaction')
        run('cp assets/static public/build/static -R')
    # Create symlink
    run('ln -sfn %s /var/www/pc-%s' % (deployment_directory, env_name))
    # Restart the necessary services
    run('service php7.3-fpm restart')
    run('service nginx restart')
```

#### Structure des répertoires

Les deux environnements `staging` et `prod` sont hébergés sur la même machine. La structure de répertoire du serveur est la suivante:

    /var/www
    ├── pc-prod -> /home/deploy/prod/releases/release-2019-Mar-21-at-10:16:00
    └── pc-staging -> /home/deploy/staging/releases/release-2019-Mar-20-at-09:11:00
    /home/deploy
    ├── staging
    │   └── même structure que la production
    └── prod
        ├── releases 
        │   ├── release-2019-Mar-21-at-10:16:00
        │   └── release-2019-Mar-21-at-10:16:49
        │       ├── bin
        │       ├── composer.json
        │       ├── composer.lock
        │       ├── config
        │       ├── public
        │       ├── src
        │       ├── symfony.lock
        │       ├── templates
        │       ├── var
        │       └── vendor
        └── shared
            └── env

L'idée de cette structure est de mettre en oeuvre les principes qui suivent:

 - /var/www/pc-[env-name] est un lien symbolique vers une release, stockée dans /var/www/[env-name]/releases
 - chaque release a un timestamp (une date de publication), et contient le projet complet
 - Les informations partagées, tel que les variables d'environnement, sont stockées dans un fichier .env dans le répertoire /var/www/[env]/shared. Lors du déploiement, ils sont copiés dans un répertoire de release. Le fichier de production .env n'est pas inclus dans ce répertoire, car il contient des informations critiques tel que le mot de passe de base de données. A la place, un fichier d'exemple .env.dist est présent. Il montre les informations attendues que vous devrez fournir.

#### Import de la base de données

Un export de la base de données au moment de la passation à la fabrique mi avrir 2019 est joint à ce document, dans le fichier `dump.sql`. Il peut être importé dans une nouvelle base de données via la commande psql:

    psql -U username dbname < dump.sql

#### Migration DNS

Le serveur utilisé est un serveur OVH Kimsufi dont les DNS sont gérés par beta.gouv. Pour faire pointer l'URL https://permis-de-construire-facile.beta.gouv.fr/ vers un autre serveur, il faudra donc se mettre en relation avec beta.gouv
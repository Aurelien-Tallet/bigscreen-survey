## Dépendances
Composer `v2`

Node `v16`

Git  `v2.36`

PHP `v8.1.10`

## Installation
Veuillez suivre ces instructions afin de procéder à l’installation du projet:

### Cloner le repo github

`git clone https://github.com/Aurelien-Tallet/bigscreen-survey`


### Installer les dépendances nécessaires
`cd bigscreen-survey/api;composer install;cd ../front;npm i`






### Création des fichiers .env et les configurer
- Copier coller le fichier .env.exemple qui se trouve dans api/ en le renommant .env et configurer la partie DB_

(s’assurer que la base de données DB_DATABASE existe)

- Copier coller le fichier .env.exemple qui se trouve dans front/ en le renommant .env et ajouter l’URL du serveur php artisan dans la variable d'environnement VITE_API_URL

### Lancer les Seeders de Laravel afin d’hydrater la base de données

À lancer dans le dossier api/

`php artisan migrate:refresh --seed`







## Lancement
Veuillez suivre ces instructions afin de procéder au lancement du projet:

### Lancer l’API

À lancer dans le dossier api/

`php artisan serve`


### Lancer le serveur front
À lancer dans le dossier front/

`npm run dev`


### Authentification Back-Office
Se rendre sur le path /login et se connecter via ces identifiants :

email : `admin@bigscreen.com`

Mot de passe : `admin`

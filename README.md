<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center"><a href="http://siges-ci.com" target="_blank"><img src="https://siges-ci.com/assets/images/logo-siges.png" width="170" alt="Siges Logo"></a></p>

## Installation des dépendances

```bash
composer install
```

## Configuration de l'environnement

Copiez le fichier **_.env.example_** et renommez-le en _.env_. Vous devrez ensuite configurer les valeurs spécifiques de votre environnement dans le fichier **_.env_**.

```bash
cp .env.example .env
```

## Génération de la clé d'application

Laravel nécessite une clé d'application pour sécuriser les sessions et les données cryptées. Vous pouvez générer cette clé en utilisant la commande artisan :

```bash
php artisan key:generate
```

## Migration de la base de données

Configurer les informations de connexion appropriées dans le fichier **_.env_**.
Exécuter les migrations pour créer les tables dans la base de données.

```bash
php artisan migrate
```

## Lancement du serveur de développement

Vous pouvez lancer le serveur de développement Laravel à l'aide de la commande artisan suivante :

```bash
php artisan serve
```

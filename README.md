# Application de Gestion de Réservations Immobilières

## Description
Application web Laravel permettant de gérer des réservations de biens immobiliers. Les utilisateurs peuvent consulter les propriétés disponibles et effectuer des réservations.

## Technologies utilisées
- **Laravel 10** — Framework PHP
- **Laravel Breeze** — Authentification (inscription, connexion, déconnexion)
- **Livewire 3** — Composants dynamiques (BookingManager)
- **Filament 3** — Panneau d'administration
- **TailwindCSS** — Framework CSS
- **MySQL** — Base de données

## Prérequis
- PHP 8.1 minimum
- Composer
- MySQL
- Node.js & NPM
- Git

## Installation

1. Cloner le projet :
```bash
git clone https://github.com/adamaba4/laravel-test.git
cd laravel-test
```

2. Installer les dépendances PHP :
```bash
composer install
```

3. Installer les dépendances JavaScript :
```bash
npm install && npm run build
```

4. Configurer l'environnement :
```bash
cp .env.example .env
php artisan key:generate
```

5. Configurer la base de données dans le fichier `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_reservations
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

6. Créer la base de données :
```sql
CREATE DATABASE laravel_reservations;
```

7. Exécuter les migrations :
```bash
php artisan migrate
```

8. Créer un utilisateur admin pour Filament :
```bash
php artisan make:filament-user
```

9. Lancer le serveur :
```bash
php artisan serve
```

## Structure du projet

### Modèles et Base de Données
- **users** — Utilisateurs (gérée par Breeze)
- **properties** — Biens immobiliers (name, description, price_per_night)
- **bookings** — Réservations (user_id, property_id, start_date, end_date)

### Relations
- Un utilisateur peut avoir plusieurs réservations
- Une propriété peut avoir plusieurs réservations
- Une réservation appartient à un utilisateur et à une propriété

### Pages
- `/login` — Connexion
- `/register` — Inscription
- `/dashboard` — Tableau de bord
- `/dashboard/properties` — Liste des propriétés
- `/bookings` — Gestion des réservations (composant Livewire)
- `/admin` — Panneau d'administration Filament

### Composant Livewire : BookingManager
- Formulaire de réservation avec `wire:model` (sélection propriété, dates)
- Création de réservation avec `wire:click`
- Suppression de réservation
- Communication via `dispatch('booking-created')`

### TailwindCSS
Couleurs personnalisées définies dans `tailwind.config.js` :
- `primary: #1E40AF` (bleu)
- `secondary: #9333EA` (violet)

## Auteur
Adama BA

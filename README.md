# KaraCompete

KaraCompete est une application de gestion de compétitions de karaté. Elle permet d'organiser et de suivre les tournois en offrant diverses fonctionnalités comme l'inscription des participants, la gestion des catégories, l'organisation des combats et l'affichage des résultats.

## 📌 Liens importants

- [Trello](https://trello.com/invite/b/6710215231a0e53cc34e3d67/ATTI5df66cd304c9b803a8e6862ca8f7465a6B4EB45B/karacompete)
- [Dépôt GitHub](#) 
- [Documentation API](#) 

## 🚀 Fonctionnalités principales

- 📋 **Gestion des inscriptions** : Ajout des participants avec leurs catégories.
- ⚔️ **Organisation des combats** : Planification et gestion des combats.
- 🏆 **Classements & Résultats** : Affichage en temps réel des classements.
- 📅 **Planification des horaires** : Création d'un calendrier des compétitions.
- 🔔 **Notifications** : Alertes pour les arbitres et participants.
- 📊 **Statistiques & Rapports** : Génération de rapports détaillés.

## 🛠️ Technologies utilisées

- **Backend** : Laravel 12 (API RESTful)
- **Frontend** : Alpine.js
- **Base de données** : PostgreSQL
- **Authentification** : Laravel Sanctum
- **Notifications** : Twilio / Pusher 

## 📦 Dépendances

### 📌 Dépendances PHP (Composer)
- `laravel/framework`
- `laravel/sanctum`

### 📌 Dépendances JavaScript (NPM)
- `alpinejs`
- `tailwindcss`
- `vite`

## 🏗️ Installation

1. **Cloner le projet**
   ```bash
   git clone <https://github.com/amdymstfa/KaraCompete.git>
   cd KaraCompete
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *(Modifier `.env` avec les informations de la base de données)*

4. **Exécuter les migrations**
   ```bash
   php artisan migrate 
   ```

5. **Lancer le serveur**
   ```bash
   php artisan serve
   ```

6. **Lancer le frontend**
   ```bash
   npm run dev
   ```

